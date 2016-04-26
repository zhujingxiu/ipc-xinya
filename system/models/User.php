<?php
namespace system\models;

use system\modules\auth\models\Role;
use Yii;
use yii\helpers\ArrayHelper;
use system\modules\auth\models\Menu;
use yii\helpers\Html;

/**
 * User model
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends \common\models\User
{
    public $password;
    public $repassword;
    private $_statusLabel;
    private $_roleLabel;

    private $menu_nodes = null;

    public function init(){
        parent::init();

        $this->menu_nodes = (new Menu())->nodes;
    }
    /**
     * @inheritdoc
     */
    public function getStatusLabel()
    {
        if ($this->_statusLabel === null) {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }

    /**
     * @inheritdoc
     */
    public static function getArrayStatus()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_INACTIVE => Yii::t('app', 'STATUS_INACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }

    public static function getArrayRole()
    {
        $roles = Role::find()->andWhere(['mode'=>'role','active'=>1])->addOrderBy('lvl','parent_id, lft')->asArray()->all();
        return ArrayHelper::map($roles, 'node_id', 'name');
    }

    public function getRoleLabel()
    {

        if ($this->_roleLabel === null) {
            $roles = self::getArrayRole();
            $label = [];
            $_roles = is_string($this->role)? explode(",",$this->role):$this->role;
            foreach($_roles as $item){
                $label[] = $roles[$item];
            }
            $this->_roleLabel = implode(" ",$label);
        }
        return $this->_roleLabel;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email','realname'], 'required'],
            [['password', 'repassword'], 'required', 'on' => ['admin-create']],
            [['username', 'realname','email', 'password', 'repassword'], 'trim'],
            [['password', 'repassword'], 'string', 'min' => 6, 'max' => 30],
            // Unique
            [['username', 'email'], 'unique'],
            // Username
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/'],
            ['username', 'string', 'min' => 3, 'max' => 30],
            // E-mail
            ['email', 'string', 'max' => 100],
            ['email', 'email'],
            // Repassword
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            //['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            //['role', 'in', 'range' => array_keys(self::getArrayRole())],
            //['role', 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'admin-create' => ['username', 'realname','email', 'password', 'repassword', 'status','role'],
            'admin-update' => ['username', 'realname','email', 'password', 'repassword', 'status','role']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        return array_merge(
            $labels,
            [
                'password' => Yii::t('app', 'Password'),
                'repassword' => Yii::t('app', 'Repassword')
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || (!$this->isNewRecord && $this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }
            if(isset($this->role) && is_array($this->role)){
                $this->role = implode(',',$this->role);
            }
            return true;
        }
        return false;
    }

    public function renderTree()
    {
        $items = [];
        foreach ($this->menu_nodes as $node) {

            if (!$node['active']) {
                continue;
            }
            $nodeDepth = $node['lvl'];
            $nodeLeft = $node['lft'];
            $nodeRight = $node['rgt'];
            $nodeKey = $node['node_id'];
            $nodeName = $node['name'];
            $nodeIcon = $node['icon'];
            $nodePath = $node['path'];

            $isChild = ($nodeRight == $nodeLeft + 1);

            $tmp = [
                'label' => $nodeName,
                'url' => ['/'.trim($nodePath,'/')],
                'icon' => $nodeIcon,

            ];
            if (!$isChild) {
                $tmp['options'] = [
                    'class' => 'treeview '
                ];
            }else{
                $tmp['active'] = Yii::$app->request->pathInfo === trim($nodePath,'/');
            }
            if($nodeDepth){

                $parents = $this->getParents($node);
                $_p = [];
                for($i =0 ;$i<count($parents) ;$i++){
                    $_p[] = '['.$parents[$i].']';
                    $_p[] = '["items"]';
                }
                $p_str = "\$items".implode('',$_p).'['.$nodeKey.']'." = \$tmp ;";
                @eval($p_str);

            }else{
                $items[$nodeKey] = $tmp;
            }

        }

        return  $items;
    }

    function getParents($node){
        $parent = [];
        $nodes = ArrayHelper::index($this->menu_nodes,'node_id');

        foreach($nodes as $item){
            if($item['parent_id'] == $node['parent_id'] && $item['lft'] < $node['lft'] && $item['rgt'] > $node['rgt']){
                $parent[$item['lvl']] = $item['node_id'];
            }
        }
        ksort($parent);
        return $parent;
    }
}

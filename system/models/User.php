<?php
namespace system\models;

use system\modules\auth\models\Permission;
use system\modules\auth\models\Role;
use Yii;
use yii\helpers\ArrayHelper;
use system\modules\auth\models\Menu;
use yii\helpers\Html;
use yii\helpers\StringHelper;
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


    private $menus = null;

    public function init(){
        parent::init();

        $this->menus = (new Menu())->nodes;
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

            $tmp = is_string($this->role) ? explode(",",$this->role) : $this->role;
            foreach($tmp as $item){
                if(isset($roles[$item]))
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
        $curr = Permission::find()->andWhere(['mode'=>'permission','path'=>trim(Yii::$app->request->pathInfo)])->asArray()->one();

        foreach ($this->menus as $node) {

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
            $nodeSets = $node['sets'];

            $isChild = ($nodeRight == $nodeLeft + 1);

            $tmp = [
                'label' => $nodeName,
                'url' => ['/'.trim($nodePath,'/')],
                'icon' => $nodeIcon,
            ];
            $_sets = $nodeSets ? explode(",",trim($nodeSets)) : [];

            $_sets[] = $nodePath;

            $tmp['active'] = in_array( $curr['node_id'],$_sets);

            if (!$isChild) {
                $tmp['options'] = [
                    'class' => 'treeview '
                ];
            }else{
                $tmp['visible'] = $this->isAllowed( $nodePath);
            }
            if($nodeDepth){

                $parents = $this->getParents($node);
                $_p = [];
                for($i =0 ;$i<count($parents) ;$i++){
                    $_p[] = '['.$parents[$i].']';
                    $_p[] = '["items"]';
                }

                @eval("\$items".implode('',$_p).'['.$nodeKey.']'." = \$tmp ;");

            }else{
                $items[$nodeKey] = $tmp;
            }

        }

        return  $items;
    }

    function getParents($node)
    {
        $parent = [];
        $nodes = ArrayHelper::index($this->menus,'node_id');

        foreach($nodes as $item){
            if($item['parent_id'] == $node['parent_id'] && $item['lft'] < $node['lft'] && $item['rgt'] > $node['rgt']){
                $parent[$item['lvl']] = $item['node_id'];
            }
        }
        ksort($parent);
        return $parent;
    }


    public function isRoot(){

        $user = User::find()->andWhere(['user_id' => (string) Yii::$app->user->getId()])->asArray()->one();
        if(empty($user['role'])){
            return false;
        }
        if(!empty($user['is_root'])){
            return true;
        }
        return false;
    }

    public function userRoles(){

        $return = [];
        if ($this->role) {
            $return = array_filter(StringHelper::explode($this->role, ',', true, true), function ($roleId) {
                return is_numeric($roleId) && Role::find()->where(['mode'=>'role','node_id'=>$roleId])->exists();
            });
        }

        return $return;
    }

    function isAllowed($path)
    {
        $permissions=[];
        $userId = Yii::$app->user->getId();

        if (empty($userId)) {
            return false;
        }

        if($this->isRoot()){
            return true;
        }

        foreach ($this->userRoles() as $role_id) {

            if($role_id){
                $_role = Role::find()->andWhere(['node_id'=>$role_id])->asArray()->one();
                if(!empty($_role['is_root'])){
                    return true;
                }
                if(!empty($_role['sets'])){
                    $tmp = explode(",",$_role['sets']);
                    if(is_array($tmp) && count($tmp)){
                        $permissions = array_merge($permissions,$tmp);
                    }
                }
            }
        }

        $curr = Permission::find()->andWhere(['mode'=>'permission','path'=>trim($path)])->asArray()->one();

        return empty($curr['node_id']) ? false : in_array($curr['node_id'],$permissions) ;
    }

    public function getRealnameLabel($userId){
        $user = User::findOne($userId);
        return empty($user['realname']) ? '' : $user['realname'];
    }

    public function getRoleUsers($value){
        $role_id = is_numeric($value) ? $value : Role::getRoleId($value);
        $sql = "SELECT user_id,username,realname,email,is_root,role FROM ".User::tableName()." WHERE FIND_IN_SET(".$role_id.",`role`) AND status = 1 ORDER BY user_id ASC , created_at ASC";
        return User::findBySql($sql)->asArray()->all();
    }

    public function getUsersByRole($code = '')
    {
        if(empty($code)){
            return [];
        }
        $node = Role::findOne(['path'=>strtolower(trim($code))]);
        $node_id = empty($node['node_id']) ? false : $node['node_id'];
        if($node_id === false)
        {
            return [];
        }
        return self::getRoleUsers($node_id);
    }
}

<?php

namespace system\modules\auth\models;

use Yii;
use system\modules\auth\Module;
/**
 * This is the model class for table "{{%auth_node}}".
 *
 * @property integer $node_id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property string $mode
 * @property string $path
 * @property string $rule
 * @property string $rule_param
 * @property string $sets
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class Node extends \kartik\tree\models\Tree
{

    const MODE_MENU = 'menu';
    const MODE_ROLE = 'role';
    const MODE_PERMISSION = 'permission';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_node}}';
    }


    public function isDisabled()
    {
//        if (Yii::$app->user->identity->username !== 'admin') {
//            return true;
//        }
        return parent::isDisabled();
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['mode','path','rule','rule_param','sets','remark','is_root'], 'safe'];
        $rules[] = [['rule'], 'string', 'max' => 64];
        $rules[] = [['mode'], 'string'];
        $rules[] = [['sets'], 'string'];
        $rules[] = [['remark'], 'string'];
        $rules[] = [['is_root'], 'integer'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => Module::t('auth', 'Node ID'),
            'parent_id' => Module::t('auth', 'Parent_id'),
            'lft' => Module::t('auth', 'Lft'),
            'rgt' => Module::t('auth', 'Rgt'),
            'lvl' => Module::t('auth', 'Lvl'),
            'name' => Module::t('auth', 'Name'),
            'icon' => Module::t('auth', 'Icon'),
            'icon_type' => Module::t('auth', 'Icon Type'),
            'mode' => Module::t('auth', 'Mode'),
            'path' => Module::t('auth', 'Path'),
            'rule' => Module::t('auth', 'Rule'),
            'rule_param' => Module::t('auth', 'Rule Param'),
            'sets' => Module::t('auth', 'Sets'),
            'remark' => Module::t('auth', 'Remark'),
            'active' => Module::t('auth', 'Active'),
            'selected' => Module::t('auth', 'Selected'),
            'disabled' => Module::t('auth', 'Disabled'),
            'readonly' => Module::t('auth', 'Readonly'),
            'visible' => Module::t('auth', 'Visible'),
            'collapsed' => Module::t('auth', 'Collapsed'),
            'movable_u' => Module::t('auth', 'Movable U'),
            'movable_d' => Module::t('auth', 'Movable D'),
            'movable_l' => Module::t('auth', 'Movable L'),
            'movable_r' => Module::t('auth', 'Movable R'),
            'removable' => Module::t('auth', 'Removable'),
            'removable_all' => Module::t('auth', 'Removable All'),
        ];
    }


    public function beforeSave($insert){

        if(parent::beforeSave($insert) ){
            $this->rule_param =  $this->rule_param === null ? null :serialize($this->rule_param);
            if($this->is_root){
                $this->removable = 0;
            }else{
                $this->removable = 1;
            }
            return true;
        }

        return false;
    }


    public function getFirstNode(){
        $result = parent::find()->where(['mode' => $this->mode])->orderBy('node_id,lvl')->asArray()->one();

        return empty($result['node_id']) ? 0 :  $result['node_id'];
    }
}

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


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_node}}';
    }
    public function isDisabled()
    {
        if (Yii::$app->user->identity->username !== 'admin') {
            return true;
        }
        return parent::isDisabled();
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['path', 'safe'];
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
            'path' => Module::t('auth', 'Path'),
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
}

<?php

namespace ipc\modules\auth\models;

use Yii;

/**
 * This is the model class for table "{{%auth_node}}".
 *
 * @property integer $node_id
 * @property integer $pid
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
            'node_id' => Yii::t('auth', 'Node ID'),
            'pid' => Yii::t('auth', 'Pid'),
            'lft' => Yii::t('auth', 'Lft'),
            'rgt' => Yii::t('auth', 'Rgt'),
            'lvl' => Yii::t('auth', 'Lvl'),
            'name' => Yii::t('auth', 'Name'),
            'icon' => Yii::t('auth', 'Icon'),
            'icon_type' => Yii::t('auth', 'Icon Type'),
            'path' => Yii::t('auth', 'Path'),
            'active' => Yii::t('auth', 'Active'),
            'selected' => Yii::t('auth', 'Selected'),
            'disabled' => Yii::t('auth', 'Disabled'),
            'readonly' => Yii::t('auth', 'Readonly'),
            'visible' => Yii::t('auth', 'Visible'),
            'collapsed' => Yii::t('auth', 'Collapsed'),
            'movable_u' => Yii::t('auth', 'Movable U'),
            'movable_d' => Yii::t('auth', 'Movable D'),
            'movable_l' => Yii::t('auth', 'Movable L'),
            'movable_r' => Yii::t('auth', 'Movable R'),
            'removable' => Yii::t('auth', 'Removable'),
            'removable_all' => Yii::t('auth', 'Removable All'),
        ];
    }
}

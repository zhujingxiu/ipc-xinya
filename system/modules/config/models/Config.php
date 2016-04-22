<?php

namespace system\modules\config\models;

use Yii;
use system\modules\config\Module;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $code
 * @property string $type
 * @property string $store_range
 * @property string $store_dir
 * @property string $value
 * @property integer $sort_order
 */
class Config extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order'], 'integer'],
            [['code', 'type'], 'required'],
            [['value'], 'string'],
            [['code', 'type'], 'string', 'max' => 32],
            [['store_range', 'store_dir'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'config_id' => Module::t('config', 'ID'),
            'parent_id' => Module::t('config', 'Parent ID'),
            'code' => Module::t('config', 'Code'),
            'type' => Module::t('config', 'Type'),
            'store_range' => Module::t('config', 'Store Range'),
            'store_dir' => Module::t('config', 'Store Dir'),
            'value' => Module::t('config', 'Value'),
            'sort_order' => Module::t('config', 'Sort Order'),
        ];
    }
}

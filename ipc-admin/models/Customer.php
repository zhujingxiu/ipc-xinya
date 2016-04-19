<?php

namespace ipc\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $customer_id
 * @property string $realname
 * @property string $phone
 * @property string $ic_sernum
 * @property string $identition
 * @property integer $addtime
 * @property integer $status
 */
class Customer extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */

    public $original_thumbnail;
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realname', 'phone', 'ic_sernum', 'identition', 'addtime', 'status'], 'required'],
            [['addtime', 'status'], 'integer'],
            [['realname'], 'string', 'max' => 64],
            [['phone', 'ic_sernum', 'identition'], 'string', 'max' => 32],
            [['original_thumbnail'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('customer','Customer ID'),
            'realname' => Yii::t('customer', 'Realname'),
            'phone' => Yii::t('customer', 'Phone'),
            'ic_sernum' => Yii::t('customer', 'Ic Sernum'),
            'identition' => Yii::t('customer', 'Identition'),
            'addtime' => Yii::t('customer', 'Addtime'),
            'status' => Yii::t('customer', 'Status'),
        ];
    }
}

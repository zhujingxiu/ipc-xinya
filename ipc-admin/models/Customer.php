<?php

namespace ipc\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $customer_id
 * @property string $realname
 * @property string $phone
 * @property string $email
 * @property string $gender
 * @property string $birthday
 * @property string $identition
 * @property integer $approved
 * @property integer $vip
 * @property integer $addtime
 * @property integer $status
 */
class Customer extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['realname', 'phone'], 'required'],
            [['gender'], 'string'],
            [['birthday'], 'safe'],
            [['approved', 'vip', 'addtime', 'status'], 'integer'],
            [['realname'], 'string', 'max' => 64],
            [['phone', 'idnumber'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('customer', 'Customer ID'),
            'realname' => Yii::t('customer', 'Realname'),
            'phone' => Yii::t('customer', 'Phone'),
            'email' => Yii::t('customer', 'Email'),
            'gender' => Yii::t('customer', 'Gender'),
            'birthday' => Yii::t('customer', 'Birthday'),
            'idnumber' => Yii::t('customer', 'Identition'),
            'approved' => Yii::t('customer', 'Approved'),
            'vip' => Yii::t('customer', 'VIP'),
            'addtime' => Yii::t('customer', 'Addtime'),
            'status' => Yii::t('customer', 'Status'),
        ];
    }
}

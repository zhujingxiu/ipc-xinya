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

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_UNKNOWN = 'unkonwn';

    public $_genderLabel ;

    public function getArrayStatus()
    {
        return [
            self::STATUS_ENABLED => Yii::t('customer', 'Enabled'),
            self::STATUS_DISABLED => Yii::t('customer', 'Disabled'),
        ];
    }


    public function getArrayGender()
    {
        return [
            self::GENDER_MALE => Yii::t('customer', 'Male'),
            self::GENDER_FEMALE => Yii::t('customer', 'Female'),
            self::GENDER_UNKNOWN => Yii::t('customer', 'Unkonwn'),
        ];
    }

    public function getGenderLabel(){
        if ($this->_genderLabel === null) {
            $genders = self::getArrayGender();
            $this->_genderLabel = $genders[$this->gender];
        }
        return $this->_genderLabel;
    }
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
            [['phone','idnumber'], 'unique','message'=>'{attribute}已经被占用了'],
            ['phone','match','pattern'=>'/^1[0-9]{10}$/','message'=>'不是有效的{attribute}'],
            [['email'],'email'],
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

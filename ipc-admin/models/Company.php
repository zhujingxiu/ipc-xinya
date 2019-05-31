<?php

namespace ipc\models;

use Yii;

/**
 * This is the model class for table "{{%company}}".
 *
 * @property integer $company_id
 * @property integer $customer_id
 * @property string $coperate
 * @property string $phone
 * @property string $address
 * @property string $product
 * @property string $bussiness
 * @property string $description
 * @property integer $addtime
 * @property integer $user_id
 */
class Company extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    /**
     * 12321321321
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'addtime', 'user_id'], 'integer'],
            [['coperate', 'phone', 'address', 'product', 'bussiness', 'description', 'addtime'], 'required'],
            [['description'], 'string'],
            [['coperate'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 128],
            [['product', 'bussiness'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'customer_id' => 'Customer ID',
            'coperate' => 'Coperate',
            'phone' => 'Phone',
            'address' => 'Address',
            'product' => 'Product',
            'bussiness' => 'Bussiness',
            'description' => 'Description',
            'addtime' => 'Addtime',
            'user_id' => 'User ID',
        ];
    }
}

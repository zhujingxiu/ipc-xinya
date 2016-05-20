<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;
use Yii;

/**
 * This is the model class for table "{{%project_order}}".
 *
 * @property integer $order_id
 * @property integer $project_id
 * @property string $income
 * @property string $fee
 * @property string $prebid
 * @property integer $user_id
 * @property integer $status
 * @property integer $addtime
 */
class Order extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'income', 'fee', 'prebid'], 'required'],
            [['project_id', 'user_id', 'status', 'addtime'], 'integer'],
            [['income', 'fee'], 'number'],
            [['prebid'], 'safe'],
            ['status','default','value'=>1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Module::t('order', 'Order ID'),
            'project_id' => Module::t('order', 'Project ID'),
            'income' => Module::t('order', 'Income'),
            'fee' => Module::t('order', 'Fee'),
            'prebid' => Module::t('order', 'Prebid'),
            'user_id' => Module::t('order', 'User ID'),
            'status' => Module::t('order', 'Status'),
            'addtime' => Module::t('order', 'Addtime'),
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $this->user_id = Yii::$app->user->id;
            $this->addtime = time();

            return true;
        }
        return false;
    }
}

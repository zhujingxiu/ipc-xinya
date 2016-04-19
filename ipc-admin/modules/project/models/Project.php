<?php

namespace ipc\modules\project\models;

use Yii;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $project_id
 * @property integer $project_sn
 * @property string $borrower
 * @property string $phone
 * @property string $company
 * @property string $amount
 * @property integer $due
 * @property integer $tender
 * @property string $income
 * @property string $fee
 * @property integer $repayment
 * @property string $prebidding
 * @property integer $addtime
 */
class Project extends \system\libs\base\BaseActiveRecord
{

    const STATUS_QUEUING = 0;
    const STATUS_ACCEPT = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_sn', 'borrower', 'phone', 'company', 'amount', 'due', 'tender', 'income', 'fee', 'repayment', 'prebidding', 'addtime'], 'required'],
            [['project_sn', 'due', 'tender', 'repayment', 'addtime'], 'integer'],
            [['amount', 'income', 'fee'], 'number'],
            [['prebidding'], 'safe'],
            [['borrower'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 32],
            [['company'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Project ID'),
            'project_sn' => Yii::t('app', 'Project Sn'),
            'borrower' => Yii::t('app', 'Borrower'),
            'phone' => Yii::t('app', 'Phone'),
            'company' => Yii::t('app', 'Company'),
            'amount' => Yii::t('app', 'Amount'),
            'due' => Yii::t('app', 'Due'),
            'tender' => Yii::t('app', 'Tender'),
            'income' => Yii::t('app', 'Income'),
            'fee' => Yii::t('app', 'Fee'),
            'repayment' => Yii::t('app', 'Repayment'),
            'prebidding' => Yii::t('app', 'Prebidding'),
            'addtime' => Yii::t('app', 'Addtime'),
        ];
    }
}

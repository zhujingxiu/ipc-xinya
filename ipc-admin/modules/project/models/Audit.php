<?php

namespace ipc\modules\project\models;

use Yii;

/**
 * This is the model class for table "{{%project_audit}}".
 *
 * @property integer $audit_id
 * @property integer $project_id
 * @property string $audit_sn
 * @property string $borrower
 * @property string $contract_sn
 * @property string $amount
 * @property integer $tender
 * @property string $ensure
 * @property integer $due
 * @property string $prebid
 * @property string $operator
 * @property string $phone
 * @property integer $status
 * @property string $note
 * @property integer $user_id
 * @property integer $addtime
 */
class Audit extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_audit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'audit_sn', 'borrower',  'amount', 'tender', 'ensure',  'operator' ], 'required'],
            [['project_id', 'tender', 'due', 'status', 'user_id', 'addtime'], 'integer'],
            [['amount'], 'number'],
            [['prebid'], 'safe'],
            [['note'], 'string'],
            [['audit_sn', 'contract_sn', 'operator', 'phone'], 'string', 'max' => 32],
            [['borrower'], 'string', 'max' => 64],
            [['ensure'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'audit_id' => Yii::t('audit', 'Audit ID'),
            'project_id' => Yii::t('audit', 'Project ID'),
            'audit_sn' => Yii::t('audit', 'Audit Sn'),
            'borrower' => Yii::t('audit', 'Borrower'),
            'contract_sn' => Yii::t('audit', 'Contract Sn'),
            'amount' => Yii::t('audit', 'Amount'),
            'tender' => Yii::t('audit', 'Tender'),
            'ensure' => Yii::t('audit', 'Ensure'),
            'due' => Yii::t('audit', 'Due'),
            'prebid' => Yii::t('audit', 'Prebid'),
            'operator' => Yii::t('audit', 'Operator'),
            'phone' => Yii::t('audit', 'Phone'),
            'status' => Yii::t('audit', 'Status'),
            'note' => Yii::t('audit', 'Note'),
            'user_id' => Yii::t('audit', 'User ID'),
            'addtime' => Yii::t('audit', 'Addtime'),
        ];
    }
}

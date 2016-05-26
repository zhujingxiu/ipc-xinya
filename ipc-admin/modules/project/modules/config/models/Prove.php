<?php

namespace ipc\modules\project\modules\config\models;

use Yii;

/**
 * This is the model class for table "{{%config_prove}}".
 *
 * @property integer $prove_id
 * @property string $title
 * @property string $code
 * @property string $remark
 * @property integer $addtime
 * @property integer $user_id
 */
class Prove extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    const APPLY = 'apply';
    const APPROVE = 'approve';
    const SERVICE = 'service';
    const BORROWER = 'borrower';
    const ENTRUST = 'entrust';
    const ASSURE = 'assure';
    const REPORT = 'report';
    const SIGNATURE = 'signature';
    const APPLICANT = 'applicant';
    const GUARANTOR = 'guarantor';

    public function getArrayAudit()
    {
        return [
            self::APPLY => '申请受理意向表',
            self::APPROVE => '项目审批表',
            self::SERVICE => '服务协议书',
            self::BORROWER => '借款协议书',
            self::ENTRUST => '委托担保合同',
            self::ASSURE => '保证担保函',
            self::REPORT => '项目调查报告',
            self::SIGNATURE => '签名确认表',
            self::APPLICANT => '申请人身份证',
            self::GUARANTOR => '担保人身份证',
        ];
    }
    public static function tableName()
    {
        return '{{%config_prove}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'code',  'remark'], 'required'],
            [['order', 'credit', 'validity', 'addtime', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['code'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prove_id' => Yii::t('prove', 'Prove ID'),
            'title' => Yii::t('prove', 'Title'),
            'code' => Yii::t('prove', 'Code'),
            'remark' => Yii::t('prove', 'Remark'),
            'addtime' => Yii::t('prove', 'Addtime'),
            'user_id' => Yii::t('prove', 'User ID'),
        ];
    }

    public static function getValue($code)
    {
        $prove = Prove::findOne(['code'=>strtolower($code)]);
        return empty($prove['prove_id']) ? false : $prove['prove_id'];
    }
}

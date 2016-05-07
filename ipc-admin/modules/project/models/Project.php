<?php

namespace ipc\modules\project\models;

use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\modules\config\models\Tender;
use Yii;
use ipc\modules\project\Module;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $project_id
 * @property integer $project_sn
 * @property string $borrower
 * @property string $corporator
 * @property string $phone
 * @property string $company
 * @property string $address
 * @property string $product
 * @property string $bussiness
 * @property string $text
 * @property string $amount
 * @property integer $due
 * @property integer $tender
 * @property string $intent
 * @property string $source
 * @property integer $repayment
 * @property string $ensure
 * @property integer $addtime
 * @property integer $agent_a
 * @property integer $agent_b
 * @property integer $status
 * @property integer $level
 * @property integer $edittime
 */
class Project extends \system\libs\base\BaseActiveRecord
{

    const STATUS_QUEUING = 1;
    const STATUS_ACCEPT = 2;

    private $_tenderLabel;
    private $_repaymentLabel;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }
    public static function getArrayLevel(){
        return [
            1 => '<i class="fa fa-star"></i>',
            2 => '<i class="fa fa-star"></i><i class="fa fa-star"></i>',
            3 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
            4 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
            5 => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
        ];
    }

    public static function getArrayTender()
    {
        return ArrayHelper::map(Tender::find()->where(['status'=>1])->addOrderBy('tender_id')->asArray()->all(), 'tender_id', 'title');
    }

    public static function getArrayRepayment()
    {
        return ArrayHelper::map(Repayment::find()->where(['status'=>1])->addOrderBy('repayment_id')->asArray()->all(), 'repayment_id', 'title');
    }

    public function getTenderLabel()
    {
        if ($this->_tenderLabel === null) {
            $tenders = self::getArrayTender();

            $this->_tenderLabel = $tenders[$this->tender];
        }
        return $this->_tenderLabel;
    }
    public function getRepaymentLabel()
    {
        if ($this->_repaymentLabel === null) {
            $repayments = self::getArrayRepayment();

            $this->_repaymentLabel = $repayments[$this->repayment];
        }
        return $this->_repaymentLabel;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_sn', 'borrower', 'corporator', 'company','address','product','bussiness', 'amount', 'due', 'tender', 'repayment','agent_a'], 'required'],
            [[ 'due', 'tender', 'repayment', 'addtime','status','level','user_id','edittime','agent_a','agent_b'], 'integer'],
            [['amount'], 'number'],
            [['intent','source','ensure','text'], 'safe'],
            [['borrower','corporator'], 'string', 'max' => 64],
            [['project_sn','phone'], 'string', 'max' => 32],
            [['company','address','product','bussiness'], 'string', 'max' => 128],
            // Unique
            [['project_sn'], 'unique'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Module::t('project', 'Project ID'),
            'project_sn' => Module::t('project', 'Project SN'),
            'borrower' => Module::t('project', 'Borrower'),
            'corporator' => Module::t('project', 'Corporator'),
            'phone' => Module::t('project', 'Phone'),
            'company' => Module::t('project', 'Company'),
            'address' => Module::t('project', 'Address'),
            'product' => Module::t('project', 'Product'),
            'bussiness' => Module::t('project', 'Bussiness'),
            'text' => Module::t('project', 'Text'),
            'amount' => Module::t('project', 'Amount'),
            'due' => Module::t('project', 'Due'),
            'tender' => Module::t('project', 'Tender'),
            'intent' => Module::t('project', 'Intent'),
            'source' => Module::t('project', 'Source'),
            'repayment' => Module::t('project', 'Repayment'),
            'ensure' => Module::t('project', 'Ensure'),
            'addtime' => Module::t('project', 'Addtime'),
            'status' => Module::t('project', 'Status'),
            'level' => Module::t('project', 'Level'),
            'edittime' => Module::t('project', 'Edittime'),
            'agent_a' => Module::t('project', 'Agent A'),
            'agent_b' => Module::t('project', 'Agent B'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord ) {
                $this->addtime = $this->edittime = time();
            }else{
                $this->edittime = time();
            }
            $this->user_id = Yii::$app->user->id;
            return true;
        }
        return false;
    }

}

<?php

namespace ipc\modules\project\models;

use ipc\modules\project\modules\config\models\Status;
use Yii;
use ipc\modules\project\Module as msgModule;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $project_id
 * @property string $project_sn
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
 * @property integer $repayment
 * @property integer $agent_a
 * @property integer $agent_b
 * @property string $intent
 * @property string $source
 * @property string $ensure
 * @property integer $addtime
 * @property integer $status
 * @property integer $level
 * @property integer $user_id
 * @property integer $edittime
 */
class Approve extends Project
{
    use \kartik\tree\models\TreeTrait {
        isDisabled as parentIsDisabled; // note the alias
    }
    public $lvl = 0;
    public $lft = 1;
    public $rgt = 2;
    public $icon = '';

    public $movable_u = 0;
    public $movable_d = 0;
    public $movable_r = 0;
    public $movable_l = 0;

    public $readonly = 0;
    public $disabled = 0;
    public $collapsed = 0;
    public $removable_all = 0;

    public $removable = 1;
    public $active = 1;
    public $icon_type = 1;
    public $visible = 1;
    public $selected = 1;

    public $encodeNodeNames = true;

    public $purifyNodeIcons = true;

    public static function tableName()
    {
        return parent::tableName();
    }

    public function getNode_id()
    {
        return $this->project_id;
    }

    public function getParent_id(){
        return $this->project_id;
    }

    public function isDisabled()
    {
        return $this->parentIsDisabled();
    }

    public function init()
    {
        parent::init();
        $this->status = Status::getValue(Status::CHECKING);
    }

    public function rules(){

        return parent::rules();
    }

    public function getName()
    {
        return implode(" ",[
            $this->getRatingLabel(),
            $this->project_sn,
            $this->borrower,
            number_format($this->amount,2).msgModule::t('apply','Amount Unit'),
            $this->getTenderLabel()
        ]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->user_id = Yii::$app->user->id;
            $this->addtime = time();
            return true;
        }
        return false;
    }

    public function getHistories()
    {
        return parent::getHistories();
    }

    public function getHistory($code)
    {
        $histories = self::getHistories();
        foreach($histories as $log){
            if($log['status'] == Status::getValue(strtolower($code))){
                return $log;
            }
        }
    }

    public function getConfirmers()
    {
        return ArrayHelper::map($this->hasMany(Comment::className(),['project_id'=>'project_id'])->asArray()->all(),'comment_id','user_id','mode');
    }
}

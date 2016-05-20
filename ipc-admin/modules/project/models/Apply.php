<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module as msgModule;
use ipc\modules\project\modules\config\models\Status;
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
class Apply extends Project
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
        $this->status = Status::getValue(Status::QUEUING);
    }

    public function rules()
    {
        return parent::rules();
    }

    public function getName()
    {
        return implode(" ",[
            $this->project_sn,
            $this->borrower,
            number_format($this->amount,2).msgModule::t('apply','Amount Unit'),
            $this->getTenderLabel(),
            $this->statusTitle()
        ]);
    }

    private function statusTitle()
    {
        $status = Status::getStatus($this->status);

        return empty($status['title']) ? '' : $status['title'];
    }

}

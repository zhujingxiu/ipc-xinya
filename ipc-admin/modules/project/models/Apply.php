<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module as msgModule;
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
    public $lft = 0;
    public $rgt = 0;
    public $icon = '';
    public $icon_type = 1;
    public $visible = 1;
    public $collapsed = 1;
    public $readonly = 0;
    public $disabled = 0;
    public $movable_u = 0;
    public $movable_d = 0;
    public $movable_r = 0;
    public $movable_l = 0;

    public $encodeNodeNames = true;

    public $purifyNodeIcons = true;

    public static function tableName()
    {
        return parent::tableName();
    }
    public function init(){
        parent::init();
        $this->status = self::STATUS_QUEUING;
    }


    public function getNode_id(){
        return $this->project_id;
    }

    public function getName(){

        return

        implode(" ",[
            $this->project_sn,
            $this->borrower,
            number_format($this->amount,2).msgModule::t('apply','Amount Unit'),
            $this->getTenderLabel()
        ]);
    }

    public function isDisabled()
    {
        return $this->parentIsDisabled();
    }
}

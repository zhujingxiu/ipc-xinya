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
class Apply extends Project
{

    public function init(){
        parent::init();
        $this->status = self::STATUS_QUEUING;
    }
}

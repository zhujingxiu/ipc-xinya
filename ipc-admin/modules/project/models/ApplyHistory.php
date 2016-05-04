<?php

namespace ipc\modules\project\models;

use ipc\modules\project\modules\config\models\Status;
use Yii;
use ipc\modules\project\Module;
/**
 * This is the model class for table "{{%project_history}}".
 *
 * @property integer $history_id
 * @property integer $project_id
 * @property integer $status
 * @property integer $user_id
 * @property string $note
 * @property integer $addtime
 */
class ApplyHistory extends History
{

    public $status;
    public function init(){
        $_status = Status::getStatus(SELF::STATUS_QUEUING);
        if(!empty($_status['status_id']))
            $this->status = $_status['status_id'];
    }

}

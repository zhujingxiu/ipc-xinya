<?php

namespace ipc\modules\project\modules\config\models;

use Yii;

/**
 * This is the model class for table "{{%project_status}}".
 *
 * @property integer $status_id
 * @property string $title
 * @property string $code
 */
class Status extends \system\libs\base\BaseActiveRecord
{

    const QUEUING = 'queuing';
    const CONFIRMED = 'confirmed';
    const ASSESSED = 'assessed';
    const CHECKING = 'checking';
    const APPROVED= 'approved';
    const SIGNED= 'signed';
    const FINISHED= 'finished';
    const LACKING= 'lacking';
    const REJECTED= 'rejected';
    const TERMINATED= 'terminated';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'title', 'code'], 'required'],
            [['status_id'], 'integer'],
            [['title', 'code'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => Yii::t('app', 'Status ID'),
            'title' => Yii::t('app', 'Title'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    public static function getStatus($value){
        return is_numeric($value) ? Status::findOne(['status_id'=>(int)$value]) : Status::findOne(['code'=>strtolower($value)]);
    }

    public static function getValue($code){
        $status = self::getStatus($code);
        return empty($status['status_id']) ? false : $status['status_id'];
    }
}

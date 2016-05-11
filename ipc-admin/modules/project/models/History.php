<?php

namespace ipc\modules\project\models;

use Yii;
use ipc\modules\project\Module;
use yii\helpers\StringHelper;

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
class History extends \system\libs\base\BaseActiveRecord
{

    public static function tableName()
    {
        return '{{%project_history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'status'], 'required'],
            [['project_id', 'status', 'user_id', 'addtime'], 'integer'],
            [['note'], 'string'],
            [['note'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_id' => Module::t('history', 'History ID'),
            'project_id' => Module::t('history', 'Project ID'),
            'status' => Module::t('history', 'Status'),
            'user_id' => Module::t('history', 'User ID'),
            'note' => Module::t('history', 'Note'),
            'addtime' => Module::t('history', 'Addtime'),
        ];
    }

    public function beforeSave($insert){

        if(parent::beforeSave($insert)){
            $this->user_id = Yii::$app->user->id;
            $this->addtime = time();

            return true;
        }
        return false;
    }


}

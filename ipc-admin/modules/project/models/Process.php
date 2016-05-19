<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;
use Yii;

/**
 * This is the model class for table "{{%project_process}}".
 *
 * @property integer $comment_id
 * @property integer $project_id
 * @property integer $level
 * @property integer $officer
 * @property string $remark
 * @property integer $status
 * @property integer $user_id
 * @property integer $addtime
 */
class Process extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_process}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'level', 'officer', 'remark', ], 'required'],
            [['project_id', 'level', 'officer', 'status', 'user_id', 'addtime'], 'integer'],
            [['remark'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => Module::t('process', 'Comment ID'),
            'project_id' => Module::t('process', 'Project ID'),
            'level' => Module::t('process', 'Level'),
            'officer' => Module::t('process', 'Officer'),
            'remark' => Module::t('process', 'Remark'),
            'status' => Module::t('process', 'Status'),
            'user_id' => Module::t('process', 'User ID'),
            'addtime' => Module::t('process', 'Addtime'),
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

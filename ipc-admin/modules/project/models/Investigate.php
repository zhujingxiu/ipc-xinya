<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;
use Yii;

/**
 * This is the model class for table "{{%project_process}}".
 *
 * @property integer $investigate_id
 * @property integer $project_id
 * @property integer $level
 * @property integer $officer
 * @property string $remark
 * @property integer $status
 * @property integer $user_id
 * @property integer $addtime
 */
class Investigate extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_investigate}}';
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
            'investigate_id' => Module::t('investigate', 'Investigate ID'),
            'project_id' => Module::t('investigate', 'Project ID'),
            'level' => Module::t('investigate', 'Level'),
            'officer' => Module::t('investigate', 'Officer'),
            'remark' => Module::t('investigate', 'Remark'),
            'status' => Module::t('investigate', 'Status'),
            'user_id' => Module::t('investigate', 'User ID'),
            'addtime' => Module::t('investigate', 'Addtime'),
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

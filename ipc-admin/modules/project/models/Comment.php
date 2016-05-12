<?php

namespace ipc\modules\project\models;

use system\libs\base\BaseActiveRecord;
use Yii;
use ipc\modules\project\modules\config\Module;
/**
 * This is the model class for table "{{%project_comment}}".
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
class Comment extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'level', 'officer', 'remark' ], 'required'],
            [['project_id', 'level', 'officer', 'status', 'user_id', 'addtime'], 'integer'],
            [['remark'], 'string','min'=>2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => Module::t('comment', 'Comment ID'),
            'project_id' => Module::t('comment', 'Project ID'),
            'level' => Module::t('comment', 'Level'),
            'officer' => Module::t('comment', 'Officer'),
            'remark' => Module::t('comment', 'Remark'),
            'status' => Module::t('comment', 'Status'),
            'user_id' => Module::t('comment', 'User ID'),
            'addtime' => Module::t('comment', 'Addtime'),
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){

            $this->user_id = Yii::$app->user->id;
            $this->addtime = time();
            return true;
        }
        return false;
    }
}

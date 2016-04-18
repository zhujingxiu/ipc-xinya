<?php

namespace ipc\modules\project\models;

use Yii;

/**
 * This is the model class for table "{{%project_attach}}".
 *
 * @property integer $attach_id
 * @property integer $project_id
 * @property string $mode
 * @property string $title
 * @property string $content
 * @property integer $user_id
 * @property integer $addtime
 * @property integer $status
 */
class ProjectAttach extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_attach}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'mode', 'title', 'content', 'user_id', 'addtime', 'status'], 'required'],
            [['project_id', 'user_id', 'addtime', 'status'], 'integer'],
            [['mode', 'content'], 'string'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attach_id' => Yii::t('app', 'Attach ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'mode' => Yii::t('app', 'Mode'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'user_id' => Yii::t('app', 'User ID'),
            'addtime' => Yii::t('app', 'Addtime'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}

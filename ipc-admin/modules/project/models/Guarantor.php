<?php

namespace ipc\modules\project\models;

use Yii;

/**
 * This is the model class for table "{{%project_guarantor}}".
 *
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $status
 */
class Guarantor extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_guarantor}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Project ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}

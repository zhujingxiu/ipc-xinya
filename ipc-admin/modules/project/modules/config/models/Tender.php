<?php

namespace ipc\modules\project\modules\config\models;

use Yii;

/**
 * This is the model class for table "{{%project_tender}}".
 *
 * @property integer $tender_id
 * @property string $title
 * @property string $code
 * @property integer $status
 */
class Tender extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_tender}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tender_id', 'title', 'code', 'status'], 'required'],
            [['tender_id', 'status'], 'integer'],
            [['title', 'code'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tender_id' => Yii::t('app', 'Tender ID'),
            'title' => Yii::t('app', 'Title'),
            'code' => Yii::t('app', 'Code'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}

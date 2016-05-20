<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project_publish}}".
 *
 * @property integer $publish_id
 * @property integer $project_id
 * @property string $mode
 * @property string $content
 * @property integer $addtime
 * @property integer $user_id
 * @property integer $status
 */
class Publish extends \system\libs\base\BaseActiveRecord
{
    const MODE_UNDERTAKE = 'undertake' ;
    const MODE_RISK = 'risk' ;
    const MODE_CONTRACT = 'contract' ;
    const MODE_CHAIRMAN = 'chairman' ;

    public static function tableName()
    {
        return '{{%project_publish}}';
    }

    public static function getArrayMode()
    {
        return [
            MODE_UNDERTAKE => '承办人：',
            MODE_CONTRACT => '合同签署：',
            MODE_RISK => '项目审核结论：',
            MODE_CHAIRMAN => '信贷项目发布意见：',
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'mode' ], 'required'],
            [['project_id', 'addtime', 'user_id', 'status'], 'integer'],
            [['mode', 'content'], 'string'],
            ['status','default','value'=>1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => Module::t('publish', 'Comment ID'),
            'project_id' => Module::t('publish', 'Project ID'),
            'mode' => Module::t('publish', 'Mode'),
            'content' => Module::t('publish', 'Content'),
            'addtime' => Module::t('publish', 'Addtime'),
            'user_id' => Module::t('publish', 'User ID'),
            'status' => Module::t('publish', 'Status'),
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

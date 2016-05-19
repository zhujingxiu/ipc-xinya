<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;
use system\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project_comment}}".
 *
 * @property integer $approve_id
 * @property integer $project_id
 * @property string $mode
 * @property string $content
 * @property integer $addtime
 * @property integer $user_id
 * @property integer $status
 */
class Comment extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */

    const MODE_UNDERTAKE = 'undertake' ;
    const MODE_CREDIT = 'credit' ;
    const MODE_RISK = 'risk' ;
    const MODE_COMMITTEE = 'committee' ;

    public static function tableName()
    {
        return '{{%project_comment}}';
    }

    public static function getArrayMode()
    {
        return [
            MODE_UNDERTAKE => '承办人：',
            MODE_CREDIT => '信贷部意见：',
            MODE_RISK => '风控合规意见：',
            MODE_COMMITTEE => '评审委员会签批：',
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
            'approve_id' => Module::t('comment', 'Approve ID'),
            'project_id' => Module::t('comment', 'Project ID'),
            'mode' => Module::t('comment', 'Mode'),
            'content' => Module::t('comment', 'Content'),
            'addtime' => Module::t('comment', 'Addtime'),
            'user_id' => Module::t('comment', 'User ID'),
            'status' => Module::t('comment', 'Status'),
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

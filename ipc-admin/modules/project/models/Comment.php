<?php

namespace ipc\modules\project\models;

use ipc\modules\project\Module;

use ipc\modules\project\modules\config\models\Status;
use system\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project_comment}}".
 *
 * @property integer $comment_id
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
            'comment_id' => Module::t('comment', 'Comment ID'),
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
            if ($this->isNewRecord) {
                $this->user_id = Yii::$app->user->id;
                $this->addtime = time();

                return true;
            }
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($this->mode == self::MODE_COMMITTEE){
            $users = array_keys(ArrayHelper::map(User::getUsersByRole(self::MODE_COMMITTEE),'user_id','realname'));
            if($users){
                $totals = Comment::find()->where(['user_id'=>$users,'status'=>1,'project_id'=>$this->project_id,'mode' => $this->mode])->distinct()->count();
                if($totals == count($users))
                {
                    $model = Approve::findOne($this->project_id);
                    $model->status = Status::getValue(Status::APPROVED);
                    if($model->save())
                    {
                        $history = new History();
                        $history->project_id = $model->project_id;
                        $history->status = $model->status;
                        $history->save();
                    }
                }
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

}

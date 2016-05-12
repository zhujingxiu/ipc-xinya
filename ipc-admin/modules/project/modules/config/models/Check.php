<?php

namespace ipc\modules\project\modules\config\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project_check}}".
 *
 * @property integer $check_id
 * @property string $title
 * @property string $code
 * @property integer $status
 */
class Check extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config_check}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'title', 'code', 'status'], 'required'],
            [[ 'status'], 'integer'],
            [['title', 'code'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'check_id' => Yii::t('app', 'Check Level'),
            'title' => Yii::t('app', 'Title'),
            'code' => Yii::t('app', 'Code'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function getTitleLabel($checkId){
        $check = Check::findOne($checkId);
        return empty($check['title']) ? '' : $check['title'];
    }

    public static function getArrayLevel()
    {
        $levels = Check::find()->andWhere(['status'=>1])->addOrderBy('check_id')->asArray()->all();
        return ArrayHelper::map($levels, 'check_id', 'title');
    }
}

<?php

namespace ipc\modules\project\modules\config\models;

use Yii;

/**
 * This is the model class for table "{{%config_prove}}".
 *
 * @property integer $prove_id
 * @property string $title
 * @property string $code
 * @property integer $order
 * @property integer $credit
 * @property string $remark
 * @property integer $validity
 * @property integer $addtime
 * @property integer $user_id
 */
class Prove extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    const IDENTIRY = 'identity';
    const INCOME = 'income';
    const ADDRESS = 'address';
    const CREDIT = 'credit';
    const SOCIAL = 'social';
    const ASSET = 'asset';
    const HOUSEHOLDER = 'householder';
    const MARRY = 'marry';
    const PERMIT = 'permit';
    const EDU = 'edu';
    const CHECKING = 'check';
    public static function tableName()
    {
        return '{{%config_prove}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'code', 'order', 'credit', 'remark', 'validity'], 'required'],
            [['order', 'credit', 'validity', 'addtime', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['code'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prove_id' => Yii::t('prove', 'Prove ID'),
            'title' => Yii::t('prove', 'Title'),
            'code' => Yii::t('prove', 'Code'),
            'order' => Yii::t('prove', 'Order'),
            'credit' => Yii::t('prove', 'Credit'),
            'remark' => Yii::t('prove', 'Remark'),
            'validity' => Yii::t('prove', 'Validity'),
            'addtime' => Yii::t('prove', 'Addtime'),
            'user_id' => Yii::t('prove', 'User ID'),
        ];
    }

    public static function getValue($code)
    {
        $prove = Prove::findOne(['code'=>strtolower($code)]);
        return empty($prove['prove_id']) ? false : $prove['prove_id'];
    }
}

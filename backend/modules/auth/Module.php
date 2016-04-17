<?php

namespace backend\modules\auth;

/**
 * auth module definition class
 */
use Yii;
class Module extends \system\libs\base\BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\auth\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function t($category, $message, $params = [], $language = null)
    {

        return Yii::t('backend/modules/' . $category, $message, $params, $language);
    }
}

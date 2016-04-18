<?php

namespace ipc\modules\setting;

use Yii;
/**
 * setting module definition class
 */
class Module extends \system\libs\base\BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ipc\modules\setting\controllers';
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
        return Yii::t('backend/moudules/' . $category, $message, $params, $language);
    }
}

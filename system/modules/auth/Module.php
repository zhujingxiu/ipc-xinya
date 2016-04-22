<?php

namespace system\modules\auth;

/**
 * auth module definition class
 */
use Yii;
class Module extends \system\libs\base\BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'system\modules\auth\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->registerTranslations();
    }

    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/auth/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            //'sourceLanguage' => 'en-US',
            'basePath' => '@system/modules/auth/messages',
            'fileMap' => [
                'modules/auth/auth' => 'auth.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/auth/' . $category, $message, $params, $language);
    }
}

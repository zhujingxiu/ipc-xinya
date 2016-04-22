<?php

namespace system\modules\config;

use Yii;
/**
 * setting module definition class
 */
class Module extends \system\libs\base\BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'system\modules\config\controllers';
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
        Yii::$app->i18n->translations['modules/config/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            //'sourceLanguage' => 'en-US',
            'basePath' => '@system/modules/config/messages',
            'fileMap' => [
                'modules/config/config' => 'config.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/config/' . $category, $message, $params, $language);
    }
}

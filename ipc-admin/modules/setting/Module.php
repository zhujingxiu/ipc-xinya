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
        $this->registerTranslations();
    }
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/setting/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            //'sourceLanguage' => 'en-US',
            'basePath' => '@ipc/modules/setting/messages',
            'fileMap' => [
                'modules/setting/setting' => 'setting.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/setting/' . $category, $message, $params, $language);
    }
}

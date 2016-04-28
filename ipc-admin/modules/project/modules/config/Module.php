<?php

namespace ipc\modules\project\modules\config;

use Yii;
/**
 * project-config module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ipc\modules\project\modules\config\controllers';

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
        Yii::$app->i18n->translations['modules/project/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            //'sourceLanguage' => 'en-US',
            'basePath' => '@ipc/modules/project/messages',
            'fileMap' => [
                'modules/project/apply' => 'apply.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/project/' . $category, $message, $params, $language);
    }
}

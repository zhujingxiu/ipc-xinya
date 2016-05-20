<?php

namespace ipc\modules\project;

use Yii;
/**
 * project module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ipc\modules\project\controllers';

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
            //'sourceLanguage' => 'zh-CN',
            'basePath' => __DIR__.'/messages',
            'fileMap' => [
                'modules/project/apply'         => 'apply.php',
                'modules/project/approve'       => 'approve.php',
                'modules/project/assess'        => 'assess.php',
                'modules/project/attach'        => 'attach.php',
                'modules/project/check'         => 'check.php',
                'modules/project/comment'       => 'comment.php',
                'modules/project/history'       => 'history.php',
                'modules/project/investigate'   => 'investigate.php',
                'modules/project/sign'          => 'sign.php',
                'modules/project/publish'       => 'publish.php',
                'modules/project/project'       => 'project.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/project/' . $category, $message, $params, $language);
    }
}

<?php

namespace ipc\modules\setting;

use yii\base\BootstrapInterface;
use Yii;
/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.

        // Add module I18N category.
        if (!isset(Yii::$app->i18n->translations['backend/modules/setting']) && !isset(Yii::$app->i18n->translations['backend/modules/*'])) {
            Yii::$app->i18n->translations['backend/modules/setting'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@backend/modules/setting/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'backend/modules/setting' => 'setting.php',
                ]
            ];
        }
    }
}

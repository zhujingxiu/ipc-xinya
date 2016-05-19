<?php

namespace ipc\modules\project\modules\config\controllers;

use system\libs\base\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `project-config` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}

<?php

namespace ipc\modules\project\controllers;

use system\libs\base\BaseController;

/**
 * Default controller for the `project` module
 */
class DefaultController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}

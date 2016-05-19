<?php

namespace system\modules\auth\controllers;

use Yii;
use system\modules\auth\models\Permission;

use system\libs\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends BaseController
{
    /**
     * Lists all Permission models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new Permission(),
        ]);
    }

}

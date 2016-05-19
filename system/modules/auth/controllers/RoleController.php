<?php

namespace system\modules\auth\controllers;

use Yii;
use system\modules\auth\models\Role;

use system\libs\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends BaseController
{
    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new Role()
        ]);
    }

}

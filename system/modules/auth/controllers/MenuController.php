<?php

namespace system\modules\auth\controllers;

use Yii;
use system\modules\auth\models\Menu;

use system\libs\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends BaseController
{

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index', [
            'model' => new Menu(),
        ]);
    }
}

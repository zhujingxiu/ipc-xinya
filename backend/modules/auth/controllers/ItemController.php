<?php

namespace backend\modules\auth\controllers;

use Yii;
use backend\modules\auth\models\Item;
use backend\modules\auth\models\search\PermissionSearch;
use system\libs\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class ItemController extends BaseController
{

    public $authManager;

    public function init(){
        parent::init();

        $this->authManager = Yii::$app->authManager;
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Permission models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }




}

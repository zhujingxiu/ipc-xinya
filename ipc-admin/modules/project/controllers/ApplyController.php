<?php
namespace ipc\modules\project\controllers;

use Yii;
use ipc\modules\project\models\Apply;
use ipc\modules\project\models\ApplySearch;

class ApplyController extends ProjectController{

    public function actionIndex()
    {
        $searchModel = new ApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
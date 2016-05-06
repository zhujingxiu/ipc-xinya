<?php
namespace ipc\modules\project\controllers;

use ipc\modules\project\models\ApplyHistory;
use Yii;
use ipc\modules\project\models\Apply;
use ipc\modules\project\models\ApplySearch;
use yii\web\Response;

class ApplyController extends ProjectController{

    public function actionIndex()
    {
        $searchModel = new ApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'history' => new ApplyHistory(),
        ]);
    }

    public function actionCreate()
    {
        $model = new Apply();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->project_id){
                $log = new ApplyHistory();
                $log->project_id = $model->project_id;

                $log->status($log->status);
                $log->insert();
            }
            //return $this->redirect(['update', 'id' => $model->project_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->project_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionAccept(){

        Yii::$app->response->format = Response::FORMAT_JSON;
        $p = Yii::$app->request->post();
        if(empty($p['project_id'])){

        }

        $model = $this->findModel(Yii::$app->request->post());
    }
}
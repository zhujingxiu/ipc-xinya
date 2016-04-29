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

        $history = $this->renderPartial('history',[
            'model' =>new Apply()
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'historyForm' => $history,
        ]);
    }

    public function actionCreate()
    {
        $model = new Apply();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->project_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'mode' => 'create'
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
                'mode' => 'update'
            ]);
        }
    }
}
<?php
namespace ipc\modules\project\controllers;

use ipc\modules\project\models\ApplyHistory;
use ipc\modules\project\models\Project;
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
        $session = Yii::$app->session;

        if(empty(Yii::$app->request->post('project_id'))){
            $session->setFlash('error', '参数异常');
        }
        $model = $this->findModel(Yii::$app->request->post('project_id'));
        $model->level =  Yii::$app->request->post('level');
        $model->status = Apply::STATUS_ACCEPT;

        if($model->save()){
            $session->setFlash('success', '修改成功');
            $session->set('kvNodeId', $model->project_id);
        }

        return $this->redirect('/project/apply');
    }

    public function actionSave(){
        $session = Yii::$app->session;
        if(empty(Yii::$app->request->post('Apply'))){
            $session->setFlash('error', '参数异常');
            return $this->redirect('/project/apply');
        }
        $p = Yii::$app->request->post('Apply');
        $id = empty($p['project_id']) ? null : (int)$p['project_id'];

        if ($id) {
            $model = $this->findModel($id);
            $successMsg = Yii::t('kvtree', 'Saved the node details successfully.');
        } else {
            $model = new Project();
            $successMsg = Yii::t('kvtree', 'The node was successfully created.');
        }

        $model->attributes = $p;

        if ($model->validate() && $model->save()) {
            $session->setFlash('success', $successMsg);
            $session->set('kvNodeId', $model->project_id);
        } else {
            $errorMsg = '<ul style="margin:0"><li>' . implode('</li><li>', $model->getFirstErrors()) . '</li></ul>';
            $session->setFlash('error', $errorMsg);
        }

        return $this->redirect('/project/apply');
    }
}
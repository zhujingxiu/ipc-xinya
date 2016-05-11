<?php
namespace ipc\modules\project\controllers;


use ipc\modules\project\models\History;
use ipc\modules\project\models\Project;
use ipc\modules\project\modules\config\models\Status;
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
        ]);
    }

    public function actionAccept(){
        $session = Yii::$app->session;

        if(empty(Yii::$app->request->post('project_id'))){
            $session->setFlash('error', '参数异常');
        }
        $model = Apply::findOne(Yii::$app->request->post('project_id')) ;
        $model->level =  Yii::$app->request->post('level');
        $model->status = Apply::STATUS_CONFIRMED;

        if($model->save()){
            $history = new History();
            $history->project_id = $model->project_id;
            $history->status = Status::getValue(Status::CONFIRMED);
            $history->save();
            $session->setFlash('success', '修改成功');
            unset($session['currentProject']);
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

        if ($model->save()) {
            $session->set('currentProject', $model->project_id);
            if($model->isNewRecord){
                $history = new History();
                $history->project_id = $model->project_id;
                $history->status = $model->status;
                $history->save();
            }
            $session->setFlash('success', $successMsg);
        } else {
            $session->setFlash('error','<ul style="margin:0"><li>' . implode('</li><li>', $model->getFirstErrors()) . '</li></ul>');
        }
        return $this->redirect('/project/apply');
    }
}
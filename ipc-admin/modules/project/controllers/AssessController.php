<?php

namespace ipc\modules\project\controllers;

use ipc\modules\project\models\History;
use ipc\modules\project\modules\config\models\Status;
use Yii;
use ipc\modules\project\models\Assess;


/**
 * AssessController implements the CRUD actions for Assess model.
 */
class AssessController extends ProjectController
{


    public function actionReject()
    {
        $session = Yii::$app->session;

        if(empty(Yii::$app->request->post('project_id'))){
            $session->setFlash('error', '参数异常');
            return $this->redirect('/project/assess');
        }
        $model = Assess::findOne(Yii::$app->request->post('project_id')) ;

        $model->status = Status::getValue(Status::REJECTED);

        if($model->save()){
            $history = new History();
            $history->project_id = $model->project_id;
            $history->status = $model->status;
            $history->note = Yii::$app->request->post('note');
            $history->save();
            $session->setFlash('success', '修改成功');
            unset($session['currentProject']);
        }

        return $this->redirect('/project/assess');
    }

    public function actionConfirm()
    {
        $session = Yii::$app->session;
        $p = Yii::$app->request->post('History');
        if(empty($p['project_id'])){
            $session->setFlash('error', '参数异常');
            return $this->redirect('/project/assess');
        }
        $model = Assess::findOne($p['project_id']) ;

        $model->status = Status::getValue(Status::ASSESSED);

        if($model->save()){
            $history = new History();
            $history->project_id = $model->project_id;
            $history->status = $model->status;
            $history->note = $p['note'];
            $history->save();
            $session->setFlash('success', '修改成功');
            unset($session['currentProject']);
        }

        return $this->redirect('/project/assess');
    }
}

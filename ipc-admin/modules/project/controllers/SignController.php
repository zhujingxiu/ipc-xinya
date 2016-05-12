<?php

namespace ipc\modules\project\controllers;

use ipc\modules\project\models\Comment;
use ipc\modules\project\models\History;
use ipc\modules\project\modules\config\models\Status;
use Yii;
use ipc\modules\project\models\Check;


/**
 * CheckController implements the CRUD actions for Check model.
 */
class SignController extends ProjectController
{


    public function actionReject()
    {
        $session = Yii::$app->session;

        if(empty(Yii::$app->request->post('project_id'))){
            $session->setFlash('error', '参数异常');
            return $this->redirect('/project/sign');
        }
        $model = Check::findOne(Yii::$app->request->post('project_id')) ;

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

        return $this->redirect('/project/sign');
    }

    public function actionConfirm()
    {
        $session = Yii::$app->session;
        $p = Yii::$app->request->post('Comment');
        if(empty($p['project_id'])){
            $session->setFlash('error', '参数异常');
            return $this->redirect('/project/sign');
        }
        $model = Check::findOne($p['project_id']) ;

        if($model !== null){
            $comment = new Comment();
            if($comment->load(Yii::$app->request->post()) && $comment->save()){
                $model->status = Status::getValue(Status::CHECKING);
                if($model->save()){
                    $history = new History();
                    $history->project_id = $model->project_id;
                    $history->status = $model->status;
                    $history->note = $p['remark'];
                    $history->save();
                    $session->setFlash('success', '修改成功');
                    unset($session['currentProject']);
                    return $this->redirect('/project/sign');
                }else{
                    $msg = 'Model Exception';
                }
            }else{
                echo '<pre>';
                print_r($comment->errors);
                echo '</pre>';exit;
                $msg = 'Comment Exception:\n'.implode("|",$comment->errors);
            }

        }else{
            $msg = 'No Data';
        }
        $session->setFlash('error', $msg);
        return $this->redirect('/project/sign');
    }
}

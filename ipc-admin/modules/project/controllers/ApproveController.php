<?php

namespace ipc\modules\project\controllers;

use ipc\modules\project\models\Attach;

use ipc\modules\project\models\Comment;
use ipc\modules\project\models\History;
use ipc\modules\project\modules\config\models\Status;
use Yii;
use ipc\modules\project\models\Approve;
use yii\helpers\Json;
use yii\web\Response;


/**
 * ApproveController implements the CRUD actions for Approve model.
 */
class ApproveController extends ProjectController
{

    public $selfUrl = '/project/approve';
    public function actionReject()
    {
        $session = Yii::$app->session;
        if(empty(Yii::$app->request->post('project_id'))){
            $session->setFlash('error', '参数异常');
            return $this->redirect($this->selfUrl);
        }
        $model = Approve::findOne(Yii::$app->request->post('project_id')) ;

        $model->status = Status::getValue(Status::REJECTED);

        if($model->save())
        {
            $history = new History();
            $history->project_id = $model->project_id;
            $history->status = $model->status;
            $history->note = Yii::$app->request->post('note');
            $history->save();

            $session->setFlash('success', '修改成功');
            unset($session['currentProject']);
        }

        return $this->redirect($this->selfUrl);
    }

    public function actionSave()
    {
        $p = Yii::$app->request->post('Attach');
        $session = Yii::$app->session;

        if(empty($p['project_id'])){
            $session->setFlash('error', '参数异常');
            return $this->redirect($this->selfUrl);
        }
        $model = Approve::findOne($p['project_id']) ;

        $tmp = [];
        if(is_array($p['file']))
        {
            foreach($p['file'] as $item){
                $tmp[] = Json::decode($item);
            }
        }
        $attach = Attach::findOne(['project_id'=>$model->project_id]);
        if($attach == null)
        {
            $attach = new Attach();
            $attach->project_id = $model->project_id;
        }
        $attach->prove_id = $p['prove_id'];
        $attach->title = $p['title'];
        $attach->file = Json::encode($tmp);
        $attach->remark = $p['remark'];

        if($model !== null && $attach->save())
        {
            $model->status = Status::getValue(Status::CHECKING);
            if($model->save()){
                $history = new History();
                $history->project_id = $model->project_id;
                $history->status = $model->status;
                $history->note = $p['remark'];
                $history->save();

                $session->setFlash('success', '修改成功');
                unset($session['currentProject']);
            }
        }
        return $this->redirect($this->selfUrl);
    }

    public function actionCommit()
    {
        $session = Yii::$app->session;
        $p = Yii::$app->request->post();
        $model = new Comment();

        if($model->load($p) && $model->save()){
            $session->setFlash('success', '修改成功');
        }else{
            $session->setFlash('error', '参数异常');
        }
        $session['currentProject'] = $p['Comment']['project_id'];
        return $this->redirect($this->selfUrl);
    }

}

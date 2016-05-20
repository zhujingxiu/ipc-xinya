<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-19
 * Time: 11:50
 */

namespace ipc\modules\project\controllers;

use ipc\modules\project\models\Order;
use ipc\modules\project\models\Publish;
use Yii;
class PublishController extends ProjectController
{
    public $selfUrl = '/project/publish';

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $p = Yii::$app->request->post();
        if(empty($p['Order']['project_id'])){
            $session->setFlash('error', '参数异常');
            return $this->redirect($this->selfUrl);
        }
        $model = new Order();

        if($model->load($p) && $model->save()){
            $session->setFlash('success', '修改成功');
        }else{
            $session->setFlash('error', '参数异常');
        }
        $session['currentProject'] = $p['Order']['project_id'];
        return $this->redirect($this->selfUrl);
    }

    public function actionCommit()
    {
        $session = Yii::$app->session;
        $p = Yii::$app->request->post();
        $model = new Publish();

        if($model->load($p) && $model->save()){
            $session->setFlash('success', '修改成功');
        }else{
            $session->setFlash('error', '参数异常');
        }
        $session['currentProject'] = $p['Publish']['project_id'];
        return $this->redirect($this->selfUrl);
    }
}
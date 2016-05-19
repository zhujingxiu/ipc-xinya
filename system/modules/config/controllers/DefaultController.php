<?php

namespace system\modules\config\controllers;

use system\modules\config\models\Config;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use Yii;

class DefaultController extends \system\libs\base\BaseController
{

    public function actionIndex()
    {
        if(Yii::$app->request->isPost)
        {
            $config = Yii::$app->request->post('Config');
            foreach($config as $key => $value) {
                Config::updateAll(['value' => $value], ['code' => $key]);
            }
        }

        $configParent = Config::find()->where(['parent_id' => 0])->orderBy(['sort_order' => SORT_ASC])->all();
        return $this->render('index', [
            'configParent' => $configParent,
        ]);
    }
}

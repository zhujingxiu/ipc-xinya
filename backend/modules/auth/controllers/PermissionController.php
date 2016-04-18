<?php

namespace backend\modules\auth\controllers;

use Yii;
use backend\modules\auth\models\PermissionForm;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PermissionController implements the CRUD actions for Permission model.
 */
class PermissionController extends ItemController
{

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->authManager->getPermissions(),
        ]);
    }

    public function actionCreate()
    {
        $model = new PermissionForm();

        if ($model->load(Yii::$app->request->post()) ) {
            $permission = new \yii\rbac\Permission();
            $permission->name = $model->name;
            $permission->description = $model->description;
            $permission->type = $model->type;
            $permission->ruleName = empty($model->rule_name) ? null : $model->rule_name;
            $permission->data = $model->data;

            $this->authManager->add($permission);

            return $this->redirect(['update', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $permission = $this->authManager->getPermission($id);
        $model = new PermissionForm();
        $model->name = $permission->name;
        $model->description = $permission->description;
        $model->rule_name = $permission->ruleName;
        $model->data = $permission->data;
        if ($model->load(Yii::$app->request->post())) {
            $permission = new \yii\rbac\Permission();
            $permission->name = $model->name;
            $permission->description = $model->description;
            $permission->type = $model->type;
            $permission->ruleName = empty($model->rule_name) ? null : $model->rule_name;
            $permission->data = $model->data;
            
            $this->authManager->update($id,$permission);

            return $this->redirect(['update', 'id' => $model->name]);
        } else {

            return $this->render('update', [
                'model' => $model
            ]);
        }
    }
}

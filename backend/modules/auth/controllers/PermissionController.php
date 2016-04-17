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
            $role = new \yii\rbac\Permission();
            $role->name = $model->name;
            $role->type = $model->type;

            $this->authManager->add($role);
            foreach($model->child as $name){
                $this->authManager->addChild($role,$this->authManager->getPermission($name));
            }
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
        if ($model->load(Yii::$app->request->post())) {
            $permission = new \yii\rbac\Permission();
            $permission->name = $model->name;
            $permission->type = $model->type;
            $this->authManager->update($id,$permission);

            return $this->redirect(['update', 'id' => $model->name]);
        } else {

            return $this->render('update', [
                'model' => $model
            ]);
        }
    }
}

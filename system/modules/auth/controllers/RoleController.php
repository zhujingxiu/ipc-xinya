<?php

namespace ipc\modules\auth\controllers;

use ipc\modules\auth\models\RoleForm;
use Yii;
use ipc\modules\auth\models\Role;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends ItemController
{

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->authManager->getRoles(),
        ]);
    }



    /**
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RoleForm();

        if ($model->load(Yii::$app->request->post()) ) {
            $role = new \yii\rbac\Role();
            $role->description = $model->description;
            $role->type = $model->type;
            $role->ruleName = empty($model->rule_name) ? null : $model->rule_name;
            $role->data = $model->data;

            $this->authManager->add($role);
            if(is_array($model->child) && count($model->child)){
                foreach($model->child as $name){
                    $this->authManager->addChild($role,$this->authManager->getPermission($name));
                }
            }
            return $this->redirect(['update', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'permissions' => $this->authManager->getPermissions()
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $role = $this->authManager->getRole($id);
        $model = new RoleForm();
        $model->name = $role->name;
        $model->description = $role->description;
        $model->rule_name = $role->ruleName;
        $model->data = $role->data;
        if ($model->load(Yii::$app->request->post())) {
            $role = new \yii\rbac\Role();
            $role->name = $model->name;
            $role->description = $model->description;
            $role->type = $model->type;
            $role->ruleName = empty($model->rule_name) ? null : $model->rule_name;
            $role->data = $model->data;

            $this->authManager->update($id,$role);
            $this->authManager->removeChildren($role);
            if(is_array($model->child) && count($model->child)){
                foreach($model->child as $name){
                    $this->authManager->addChild($role,$this->authManager->getPermission($name));
                }
            }
            return $this->redirect(['update', 'id' => $model->name]);
        } else {

            $_selected = $this->authManager->getPermissionsByRole($id);
            if($_selected != null){
                foreach($_selected as $item){
                    $model->child[] = $item->name;
                }
            }

            return $this->render('update', [
                'model' => $model,
                'permissions' => $this->authManager->getPermissions()
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->remove($id);

        return $this->redirect(['index']);
    }


}

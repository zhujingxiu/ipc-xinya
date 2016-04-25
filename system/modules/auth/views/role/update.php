<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model system\modules\auth\models\Role */

$this->title = Yii::t('auth', 'Update {modelClass}: ', [
    'modelClass' => 'Role',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('auth', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->node_id]];
$this->params['breadcrumbs'][] = Yii::t('auth', 'Update');
?>
<div class="role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

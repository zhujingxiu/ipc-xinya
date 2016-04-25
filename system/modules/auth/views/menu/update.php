<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model system\modules\auth\models\Menu */

$this->title = Yii::t('auth', 'Update {modelClass}: ', [
    'modelClass' => 'Menu',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('auth', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->node_id]];
$this->params['breadcrumbs'][] = Yii::t('auth', 'Update');
?>
<div class="menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

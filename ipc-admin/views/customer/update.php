<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\models\Customer */

$this->title = Yii::t('Customer', 'Update {modelClass}: ', [
    'modelClass' => 'Customer',
]) . $model->realname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('Customer', 'Customer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->realname, 'url' => ['view', 'id' => $model->customer_id]];
$this->params['breadcrumbs'][] = Yii::t('Customer', 'Update');
?>
<div class="customer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

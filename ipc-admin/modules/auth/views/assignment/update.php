<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Assignment */

$this->title = 'Update Assignment: ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assignment-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

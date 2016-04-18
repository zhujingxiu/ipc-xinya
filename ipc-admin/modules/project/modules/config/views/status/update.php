<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Status */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Status',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->status_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

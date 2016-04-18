<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\ProjectAttach */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Project Attach',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Attaches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->attach_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-attach-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

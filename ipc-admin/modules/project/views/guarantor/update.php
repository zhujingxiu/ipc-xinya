<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\ProjectGuarantor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Project Guarantor',
]) . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Guarantors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-guarantor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

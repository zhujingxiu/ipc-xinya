<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Assess */

$this->title = Yii::t('assess', 'Update {modelClass}: ', [
    'modelClass' => 'Assess',
]) . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('assess', 'Assesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('assess', 'Update');
?>
<div class="assess-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

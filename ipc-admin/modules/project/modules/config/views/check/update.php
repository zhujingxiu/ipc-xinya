<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Check */

$this->title = Yii::t('check', 'Update {modelClass}: ', [
    'modelClass' => 'Check',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('check', 'Checks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->check_id]];
$this->params['breadcrumbs'][] = Yii::t('check', 'Update');
?>
<div class="check-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

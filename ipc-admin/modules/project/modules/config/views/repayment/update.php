<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Repayment */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Repayment',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repayments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->repayment_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="repayment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

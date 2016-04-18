<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Tender */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tender',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tenders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->tender_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tender-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

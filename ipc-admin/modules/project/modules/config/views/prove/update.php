<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Prove */

$this->title = Yii::t('prove', 'Update {modelClass}: ', [
    'modelClass' => 'Prove',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('prove', 'Proves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->prove_id]];
$this->params['breadcrumbs'][] = Yii::t('prove', 'Update');
?>
<div class="prove-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

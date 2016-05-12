<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Check */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('check', 'Checks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('check', 'Update'), ['update', 'id' => $model->check_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('check', 'Delete'), ['delete', 'id' => $model->check_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('check', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'check_id',
            'title',
            'code',
            'status',
            'remark:ntext',
        ],
    ]) ?>

</div>

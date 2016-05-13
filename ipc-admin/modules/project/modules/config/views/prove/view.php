<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Prove */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('prove', 'Proves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prove-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('prove', 'Update'), ['update', 'id' => $model->prove_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('prove', 'Delete'), ['delete', 'id' => $model->prove_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('prove', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prove_id',
            'title',
            'code',
            'order',
            'credit',
            'remark',
            'validity',
            'addtime:datetime',
            'user_id',
        ],
    ]) ?>

</div>

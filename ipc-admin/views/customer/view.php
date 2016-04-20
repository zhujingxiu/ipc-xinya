<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ipc\models\Customer */

$this->title = $model->customer_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('Cusotmer', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('Cusotmer', 'Update'), ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('Cusotmer', 'Delete'), ['delete', 'id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('Cusotmer', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'customer_id',
            'realname',
            'phone',
            'email:email',
            'gender',
            'birthday',
            'identition',
            'approved',
            'vip',
            'addtime:datetime',
            'status',
        ],
    ]) ?>

</div>

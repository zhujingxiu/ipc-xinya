<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Node */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('auth', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('auth', 'Update'), ['update', 'id' => $model->node_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('auth', 'Delete'), ['delete', 'id' => $model->node_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('auth', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'node_id',
            'pid',
            'lft',
            'rgt',
            'lvl',
            'name',
            'icon',
            'icon_type',
            'active',
            'selected',
            'disabled',
            'readonly',
            'visible',
            'collapsed',
            'movable_u',
            'movable_d',
            'movable_l',
            'movable_r',
            'removable',
            'removable_all',
        ],
    ]) ?>

</div>

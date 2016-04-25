<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model system\modules\auth\models\Permission */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('auth', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-view">

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
            'parent_id',
            'lft',
            'rgt',
            'lvl',
            'name',
            'icon',
            'icon_type',
            'mode',
            'path',
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

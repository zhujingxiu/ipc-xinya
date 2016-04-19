<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Status */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->status_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->status_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /* echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'status_id',
            'title',
            'code',
        ],
    ]) */?>
<?php
echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Status # ' . $model->title,
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        'code',
        'title',
       // ['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
    ]
]);
?>
</div>

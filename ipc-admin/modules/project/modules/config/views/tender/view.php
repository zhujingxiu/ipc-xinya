<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Tender */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tenders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tender-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tender_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tender_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tender_id',
            'title',
            'code',
            'status',
        ],
    ]) */ ?>
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
        [
            'attribute'=>'status', 
            'type'=>DetailView::INPUT_SWITCH ,
            'value'=>$model->status ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
            'widgetOptions' => [
                'pluginOptions' => [
                    'onText' => 'Yes',
                    'offText' => 'No',
                ]
            ],
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ]
]);
?>
</div>

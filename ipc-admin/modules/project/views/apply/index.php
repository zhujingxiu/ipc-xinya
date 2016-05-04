<?php

use yii\helpers\Html;

use ipc\modules\project\Module;
use kartik\grid\GridView;
use ipc\modules\project\models\Apply;
/* @var $this yii\web\View */
/* @var $searchModel ipc\modules\project\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('apply', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-md-5">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'showPageSummary' => true,
            'responsive'=>true,
            'hover'=>true,
            'panel'=>[
                'type'=>'primary',
                'heading'=>'<i class="fa fa-sort-numeric-asc"></i> 排队中',
            ],
            'toolbar' => [
                [
                    'content'=>
                        Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success'])
                ],
                //'{export}',
                '{toggleData}'
            ],
            'rowOptions' => [
                'class' => 'list-rows'
            ],
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
//                [
//                    'attribute' => 'addtime',
//                    'label' => '',// Module::t('apply','Addtime'),
//                    'format' => ['date', 'Y-MM-dd HH:i:s'],
//                    'options' => [
//                        'style' => 'width:180px',
//                    ]
//
//                ],
                [
                    'attribute' => 'project_sn',
                    'label' => '',
                    'options' => [
                        'style' => 'width:120px'
                    ]
                    ,'class' => '\kartik\grid\FormulaColumn',
                ],
                [
                    'attribute' =>'borrower',
                    'label' => '',
                    'options' => [
                        'style' => 'width:150px'
                    ]
                ],
                [
                    'attribute' => 'tender',
                    'label' => '',
                    'value' => function ($model) {
                        return $model->tenderLabel;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter' => Apply::getArrayTender(),
                    'options' => [
                        'style' => 'width:180px',

                    ],
                    'pageSummary'=>'Summary',
                    'pageSummaryOptions'=>['class'=>'text-right text-warning'],
                ],

//                [
//                    'attribute' => 'repayment',
//                    'value' => function ($model) {
//                        return $model->repaymentLabel;
//                    },
//                    'filter' => Html::activeDropDownList(
//                        $searchModel,
//                        'repayment',
//                        Apply::getArrayRepayment(),
//                        ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
//                    ),
//                    'options' => [
//                        'style' => 'width:200px'
//                    ]
//                ],
                [
                    'attribute' => 'amount',
                    'label' => '',//Module::t('apply','Column Amount'),
                    'value' => function ($model) {
                        return number_format($model->amount,2).Module::t('apply','Amount Unit');
                    },
                    'options' => [
                        'style' => 'width:150px'
                    ],
                    'pageSummary'=>true
                ],
                [
                    'attribute' => 'due',
                    'label' => '',//Module::t('apply','Column Due'),
                    'value' => function ($model) {
                        return $model->due.Module::t('apply','Due Unit');
                    },
                    'options' => [
                        'style' => 'width:150px'
                    ]
                    ,'pageSummary'=>true
                ],
/*
                [

                    'class' => 'system\components\ActionColumn',
                    'template' => ' {update:update} {delete:delete} ',
                    'buttons' => [

                        'update' => function ($url, $model, $key) {
                            $options = [
                                'title' => Yii::t('yii', 'View'),
                                'aria-label' => Yii::t('yii', 'View'),
                                'data-pjax' => '0',
                                'class' => 'btn btn-primary'
                            ];
                            return Html::a('<i class="fa fa-eye"></i>', $url, $options);
                        },
                        'delete' => function ($url, $model, $key) {
                            $options = [
                                'title' => Yii::t('yii', 'Delete'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data-pjax' => '0',
                                'class' => 'btn btn-warning',
                                'confirm' => '?'
                            ];
                            return Html::a('<i class="fa fa-trash"></i>', $url, $options);
                        },
                    ]
                ],

*/

            ],
        ]); ?>

    </div>
    <div class="col-md-7" id="detail-panel">

    </div>
<?php

?>
</div>

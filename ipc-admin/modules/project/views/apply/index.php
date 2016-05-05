<?php

use yii\helpers\Html;

use ipc\modules\project\Module;
use kartik\tree\Module as kvModule;
use kartik\tree\TreeView;
use yii\helpers\Url;
use ipc\modules\project\models\Apply;
/* @var $this yii\web\View */
/* @var $searchModel ipc\modules\project\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('apply', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo TreeView::widget([
        'query' => Apply::find()->addOrderBy('level,addtime'),
        'fontAwesome' => true,
        'isAdmin' => false,
        'displayValue' => 3,
        'cacheSettings' => [
            'enableCache' => false   // defaults to true
        ],
        'nodeView' => '@ipc/modules/project/views/apply/detail',
        'nodeActions' => [
            //Module::NODE_MANAGE => Url::to(['/treemanager/node/manage']),
            kvModule::NODE_SAVE => Url::to(['/project/apply/save']),
            kvModule::NODE_REMOVE => Url::to(['/project/apply/remove']),
            //Module::NODE_MOVE => Url::to(['/treemanager/node/move']),
        ],
        'rootOptions' => [
            'label'=>Module::t('apply', 'Projects'),  // custom root label
            'class'=>'text-success'
        ],
        'treeOptions' => [
            'style' => 'height:760px'
        ]
    ]);?>
        <?php /* GridView::widget([
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



            ],
        ]); */?>


<?php
$this->registerCss("
.kv-detail-container{padding:0px;border:none;}
");
?>
</div>

<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;
use ipc\modules\project\Module;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php echo
    DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        'labelColOptions' => ['style' => 'width: 10%;'],
        'panel'=>[
            'heading'=>  $model->project_sn .' - ' .($model->borrower ? $model->borrower .' - ' .intval($model->amount).'万元' : '' ).' ['.Yii::$app->formatter->asDatetime($model->addtime) .']' ,
            'type'=>DetailView::TYPE_PRIMARY,
        ],
        'vAlign'=>'top',

        'attributes' => [
            [
                'columns' => [
                    [
                        'attribute' => 'project_sn',
                        'displayOnly' => $mode == 'update',
                        'value' => $model->project_sn,
                        'labelColOptions' =>[
                            'style'=>'width:80%;text-align:right;'
                        ],
                        'valueColOptions'=>['style'=>'font-weight:bold;color:blue;width:20%;'],

                    ],

                ]
            ],
            [
                'group'=>true,
                'label'=>Module::t('project','Company Info'),
                'rowOptions'=>['class'=>'info']
            ],

            [
                'columns' => [
                    [
                        'attribute' => 'borrower',
                        'value' => $model->borrower,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'company',
                        'value' => $model->company,
                        'valueColOptions'=>['style'=>'width:50%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'corporator',
                        'value' => $model->corporator,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'address',
                        'value' => $model->address,
                        'valueColOptions'=>['style'=>'width:50%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'product',
                        'value' => $model->product,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'bussiness',
                        'value' => $model->bussiness,
                        'valueColOptions'=>['style'=>'width:50%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'text',
                        'value' => $model->text,
                        'type'=>DetailView::INPUT_TEXTAREA,
                        'valueColOptions'=>['style'=>'width:90%'],

                        'options'=>['rows'=>5]
                    ],

                ]
            ],
            [
                'group'=>true,
                'label'=>Module::t('project','Loan Info'),
                'rowOptions'=>['class'=>'info']
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'amount',
                        'value' => $model->amount,
                        'format'=>['decimal', 2],
                        'valueColOptions'=>['style'=>'width:20%']
                    ],
                    [
                        'attribute' => 'due',
                        'value' => $model->due,
                        'valueColOptions'=>['style'=>'width:20%']
                    ],
                    [
                        'attribute' => 'tender',
                        'value' => $model->tender,
                        'valueColOptions'=>['style'=>'width:30%'],
                        'type'=>DetailView::INPUT_SELECT2,
                        'widgetOptions'=>[
                            'data'=>ArrayHelper::map(Tender::find()->asArray()->all(), 'tender_id', 'title'),
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                        ],
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'agent_a',
                        'label' => Module::t('project', 'Agent A'),
                        'value' => $model->agent_a,
                        'valueColOptions'=>['style'=>'width:20%'],
                        'type'=>DetailView::INPUT_SELECT2,
                        'widgetOptions'=>[
                            'data'=>ArrayHelper::map(User::find()->where([])->asArray()->all(), 'user_id', 'realname'),
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                        ],
                    ],
                    [
                        'attribute' => 'agent_b',
                        'label' => Module::t('project', 'Agent B'),
                        'value' => $model->agent_b,
                        'valueColOptions'=>['style'=>'width:20%'],
                        'type'=>DetailView::INPUT_SELECT2,
                        'widgetOptions'=>[
                            'data'=>ArrayHelper::map(User::find()->where([])->asArray()->all(), 'user_id', 'realname'),
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                        ],
                    ],
                    [
                        'attribute' => 'repayment',
                        'value' => $model->repayment,
                        'valueColOptions'=>['style'=>'width:30%'],
                        'type'=>DetailView::INPUT_SELECT2,
                        'widgetOptions'=>[
                            'data'=>ArrayHelper::map(Repayment::find()->asArray()->all(), 'repayment_id', 'title'),
                            'options' => ['placeholder' => 'Select ...'],
                            'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                        ],
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'intent',
                        'value' => $model->intent,
                        'type'=>DetailView::INPUT_TEXTAREA,
                        'valueColOptions'=>['style'=>'width:90%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'source',
                        'value' => $model->source,
                        'type'=>DetailView::INPUT_TEXTAREA,
                        'valueColOptions'=>['style'=>'width:90%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'ensure',
                        'value' => $model->ensure,
                        'type'=>DetailView::INPUT_TEXTAREA,
                        'valueColOptions'=>['style'=>'width:90%']
                    ],

                ]
            ],
        ]
    ]);
    ?>
    <?php if($mode == 'update'): ?>

    <?php echo
        DetailView::widget([
            'model' => $model,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_EDIT,
            'labelColOptions' => ['style' => 'width: 10%;'],
            'panel'=>[
                'heading'=> '认定受理 '.  $model->project_sn .' - ' .($model->borrower ? $model->borrower .' - ' .intval($model->amount).'万元' : '' ) ,
                'type'=>DetailView::TYPE_SUCCESS,
            ],
            'vAlign'=>'top',
            'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => 'text',
                            'value' => $model->text,
                            'type'=>DetailView::INPUT_TEXTAREA,
                            'valueColOptions'=>['style'=>'width:90%;']
                        ],

                    ]
                ],
                ]
            ]);
        ?>
    <?php endif ?>



</div>

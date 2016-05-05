<?php
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
?>

<?php


extract($params);
$isAdmin = ($isAdmin == true || $isAdmin === "true"); // admin mode flag

$mode = $node->project_sn ? 'update' : 'create';

echo DetailView::widget([
    'model' => $node,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_EDIT,
    'labelColOptions' => ['style' => 'width: 12%;'],
    'panel'=>[
        'heading'=>  $node->$nameAttribute ,
        'type'=>DetailView::TYPE_DEFAULT,
        'class' => 'row'
    ],
    'vAlign'=>'top',
    'formOptions' => [
        'action' => $action,
    ],

    'attributes' => [
        [
            'columns' => [
                [
                    'attribute' => 'project_id',
                    'value' => $node->project_id,
                    'type'=>DetailView::INPUT_HIDDEN,
                    'labelColOptions' => [
                        'style' => 'display:none;'
                    ],
                    'valueColOptions' => [
                        'style' => 'display:none;'
                    ],
                ]
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'project_sn',
                    'label' => msgModule::t('project','Project SN'),
                    'displayOnly' => $mode == 'update',
                    'value' => $node->project_sn,
                    'labelColOptions' =>[
                        'style'=>'width:80%;text-align:right;'
                    ],
                    'valueColOptions'=>['style'=>'font-weight:bold;color:blue;width:20%;'],
                ],
            ]
        ],
        [
            'group'=>true,
            'label'=>msgModule::t('project','Company Info'),
            'rowOptions'=>['class'=>'default']
        ],
        [
            'columns' => [
                [
                    'attribute' => 'borrower',
                    'label' => msgModule::t('project','Borrower'),
                    'value' => $node->borrower,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
                [
                    'attribute' => 'company',
                    'label' => msgModule::t('project','Company'),
                    'value' => $node->company,
                    'valueColOptions'=>['style'=>'width:50%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'corporator',
                    'label' => msgModule::t('project','Corporator'),
                    'value' => $node->corporator,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
                [
                    'attribute' => 'address',
                    'label' => msgModule::t('project','Address'),
                    'value' => $node->address,
                    'valueColOptions'=>['style'=>'width:50%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'product',
                    'label' => msgModule::t('project','Product'),
                    'value' => $node->product,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
                [
                    'attribute' => 'bussiness',
                    'label' => msgModule::t('project','Bussiness'),
                    'value' => $node->bussiness,
                    'valueColOptions'=>['style'=>'width:50%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'text',
                    'label' => msgModule::t('project','Text'),
                    'value' => $node->text,
                    'type'=>DetailView::INPUT_TEXTAREA,
                    'valueColOptions'=>['style'=>'width:90%'],
                    'options'=>['rows'=>5]
                ],
            ]
        ],
        [
            'group'=>true,
            'label'=>msgModule::t('project','Loan Info'),
            'rowOptions'=>['class'=>'default']
        ],
        [
            'columns' => [
                [
                    'attribute' => 'amount',
                    'label' => msgModule::t('project','Amount'),
                    'value' => $node->amount,
                    'format'=>['decimal', 2],
                    'valueColOptions'=>['style'=>'width:20%']
                ],
                [
                    'attribute' => 'due',
                    'label' => msgModule::t('project','Due'),
                    'value' => $node->due,
                    'valueColOptions'=>['style'=>'width:20%']
                ],
                [
                    'attribute' => 'tender',
                    'label' => msgModule::t('project','Tender'),
                    'value' => $node->tender,
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
                    'label' => msgModule::t('project', 'Agent A'),
                    'value' => $node->agent_a,
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
                    'label' => msgModule::t('project', 'Agent B'),
                    'value' => $node->agent_b,
                    'valueColOptions'=>['style'=>'width:20%'],
                    'type'=>DetailView::INPUT_SELECT2,
                    'widgetOptions'=>[
                        'data'=>ArrayHelper::map(User::find()->where(['status'=>1])->asArray()->all(), 'user_id', 'realname'),
                        'options' => ['placeholder' => 'Select ...'],
                        'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                    ],
                ],
                [
                    'attribute' => 'repayment',
                    'label' => msgModule::t('project','Repayment'),
                    'value' => $node->repayment,
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type'=>DetailView::INPUT_SELECT2,
                    'widgetOptions'=>[
                        'data'=>ArrayHelper::map(Repayment::find()->where(['status'=>1])->asArray()->all(), 'repayment_id', 'title'),
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
                    'label' => msgModule::t('project','Intent'),
                    'value' => $node->intent,
                    'type'=>DetailView::INPUT_TEXTAREA,
                    'valueColOptions'=>['style'=>'width:90%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'source',
                    'label' => msgModule::t('project','Source'),
                    'value' => $node->source,
                    'type'=>DetailView::INPUT_TEXTAREA,
                    'valueColOptions'=>['style'=>'width:90%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'ensure',
                    'label' => msgModule::t('project','保证措施'),
                    'value' => $node->ensure,
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
        'model' => $node,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        'labelColOptions' => ['style' => 'width: 10%;'],
        'panel'=>[
            'heading'=> '认定受理 '.  $node->$nameAttribute ,
            'type'=>DetailView::TYPE_PRIMARY,
        ],
        'vAlign'=>'top',
        'options' => [
            'id' => 'accept-form-'.uniqid()
        ],
        'attributes' => [
            [
                'columns' => [
                    [
                        'attribute' => 'text',
                        'label' => msgModule::t('apply','Accept Text'),
                        'value' => $node->text,
                        'valueColOptions'=>['style'=>'width:90%;'],
                        'options' => [
                            'id' => 'tmce-'.uniqid()
                        ],
                        'type'=>DetailView::INPUT_WIDGET,
                        'widgetOptions' => [
                            'class' => '\pendalf89\tinymce\Tinymce',
                            'clientOptions' => [
                                'menubar' => false,
                                'language' => 'zh_CN',
                                'height' => 500,
                                'plugins' => [
                                    'advlist autolink lists charmap preview anchor searchreplace visualblocks contextmenu table',
                                ],
                                'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
                            ]
                        ]
                    ],
                ]
            ],
        ]
    ]);
    ?>
<?php endif ?>

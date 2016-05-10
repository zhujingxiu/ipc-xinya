<?php
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\models\Assess;


extract($params);


$attributes = [
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
            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'project_sn',
                'label' => msgModule::t('project','Project SN'),
                'displayOnly' => true,
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
        'rowOptions'=>['class'=>'info']
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
        'rowOptions'=>['class'=>'info']
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
                    'data'=>ArrayHelper::map(Tender::find()->where(['status'=>1])->asArray()->all(), 'tender_id', 'title'),
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
                    'data'=>ArrayHelper::map(User::find()->where(['status'=>1])->asArray()->all(), 'user_id', 'realname'),
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
                'label' => msgModule::t('project',"Intent"),
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
];
$settings = [
    'model' => $node,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'labelColOptions' => ['style' => 'width: 12%;'],
    'panel'=>[
        'heading'=> $node->$nameAttribute,
        'type'=>DetailView::TYPE_DEFAULT,
    ],
    'vAlign'=>'top',
    'formOptions' => [
        'action' => $action,
    ],
    'buttons1' => false,
    'buttons2' => false,
    'attributes' => $attributes
];

echo DetailView::widget($settings);

$history = new \ipc\modules\project\models\History();
echo DetailView::widget([
    'model' => $history,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_EDIT,
    'labelColOptions' => ['style' => 'width: 12%;'],
    'panel'=>[
        'heading'=> ' &nbsp; ',//$node->$nameAttribute,
        'type'=>DetailView::TYPE_PRIMARY,
    ],
    'vAlign'=>'top',
    'formOptions' => [
        'action' => 'project/assess/confirm',
    ],

    'buttons2' => "{update} {save}",
    'updateOptions' => [
        'label' => '<i class="fa fa-reply"></i>',
        'title' => '驳回',
        'class' => 'btn-reject kv-action-btn',
        'data-key' => $node->project_id,
        'data-title' => $node->$nameAttribute
    ],
    'saveOptions' => [
        'title' => '提交',
    ],
    'attributes' =>[
        [
            'columns' => [
                [
                    'attribute' => 'note',
                    'label' => '承办意见',
                    'value' => $history->note,
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
                            'height' => 360,
                            'plugins' => [
                                'advlist autolink lists charmap preview anchor searchreplace visualblocks contextmenu table',
                            ],
                            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
                        ]
                    ]
                ],

            ]
        ]
    ]
]);
?>
<?php


use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\models\Assess;
use kartik\dialog\Dialog;

extract($params);


$attributes = [
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
                'value' => number_format($node->amount,2).msgModule::t('project','Amount Unit'),

                'valueColOptions'=>['style'=>'width:20%']
            ],
            [
                'attribute' => 'due',
                'label' => msgModule::t('project','Due'),
                'value' => $node->due.msgModule::t('project','Due Unit'),
                'valueColOptions'=>['style'=>'width:20%']
            ],
            [
                'attribute' => 'tender',
                'label' => msgModule::t('project','Tender'),
                'value' => Tender::getTitleLabel($node->tender),
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
                'value' => User::getRealnameLabel($node->agent_a),
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
                'value' => User::getRealnameLabel($node->agent_b),
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
                'value' => Repayment::getTitleLabel($node->repayment),
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
        'type'=>DetailView::TYPE_SUCCESS,
    ],
    'vAlign'=>'top',
    'buttons1' => false,
    'buttons2' => false,
    'attributes' => $attributes
];

echo DetailView::widget($settings);

$history = new \ipc\modules\project\models\History();
$history->project_id = $node->project_id;
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
        'action' => '/project/assess/confirm',
    ],
    'buttons2' => "{update} {save}",
    'updateOptions' => [
        'label' => '<i class="fa fa-reply"></i>',
        'title' => Yii::t('app','Reject'),
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
                    'attribute' => 'project_id',
                    'value' => $history->project_id,
                    'type' => DetailView::INPUT_HIDDEN
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'note',
                    'label' => '调查评估',
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

echo Dialog::widget([
    'libName' => 'rejectDialog', // optional if not set will default to `krajeeDialog`
    'options' => [
        'type' => Dialog::TYPE_SUCCESS,
        'draggable' => true,
        'closable' => true,
        'title'=>'请填写驳回理由',
        'buttons' => [
            [
                'label' => '确定驳回',
                'action' => new \yii\web\JsExpression("function(dialog) {
                    var _note = $('#reject-form textarea[name=\"note\"]');
                    if($.trim(_note.val()) == ''){
                        _note.next('.help-block').css('display','block').parent('.form-group').addClass('has-error');
                        return;
                    }else{
                        _note.next('.help-block').css('display','none').parent('.form-group').removeClass('has-error');
                    }
                    $.ajax({
                        'url':'/project/assess/reject',
                        'type':'post',
                        'data':{project_id:$('#reject-form input[name=\"project_id\"]').val(),note:_note.val()},
                        'dataType':'json',
                        'success':function(json){

                        }
                    });
                }")
            ],
        ]
    ], // custom options
]);

$js = <<< JS
$('.btn-reject').on('click',function(){

    var _html = '<form id="reject-form"><input type="hidden" class="form-control" name="project_id" value="'+$(this).attr('data-key')+'">';
    _html +='<dl >';
    _html +='   <dt class="text-center"><h3> '+$(this).attr('data-title')+' </h3></dt>';
    _html +='   <dd class="form-group"><textarea name="note" rows="5" style="width:99%;"></textarea><div class="help-block" style="display:none">必须填写驳回理由</dd>';
    _html +='</dl></form>';
    rejectDialog.dialog(_html, function (result) {

    });
});
JS;
$this->registerJs($js);
?>
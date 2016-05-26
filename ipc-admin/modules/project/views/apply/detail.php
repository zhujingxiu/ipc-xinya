<?php
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\models\Apply;
use kartik\dialog\Dialog;

extract($params);
$mode = $node->project_sn ? 'update' : 'create';

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
$heading = empty($node->$nameAttribute) ? ArrayHelper::getValue($breadcrumbs, 'untitled') : $node->$nameAttribute ;
$settings = [
    'model' => $node,
    'condensed'=>true,
    'hover'=>true,
    'mode'=> $mode == 'update' ? DetailView::MODE_VIEW : DetailView::MODE_EDIT,
    'labelColOptions' => ['style' => 'width: 12%;'],
    'panel'=>[
        'heading'=> $heading,
        'type'=>DetailView::TYPE_PRIMARY,
    ],
    'vAlign'=>'top',
    'formOptions' => [
        'action' => $action,
    ],

    'buttons2' => '{view} {save} {delete}',
    'attributes' => $attributes
];
if( $mode == 'update'):
    $settings['buttons1'] = '{reset} {update}';
    $settings['resetOptions'] = [
        'label' => '<i class="fa fa-gavel"></i>',
        'title' => '确认受理',
        'class' => 'btn-accept kv-action-btn',
        'data-key' => $node->project_id,
        'data-title' => $heading
    ];
else :
    $settings['buttons2'] = '{save}';
endif;
echo DetailView::widget($settings);

if( $mode == 'update'):
echo Dialog::widget([
    'libName' => 'acceptDialog', // optional if not set will default to `krajeeDialog`
    'options' => [
        'type' => Dialog::TYPE_SUCCESS,
        'draggable' => true,
        'closable' => true,
        'title'=>'认定受理',
        'buttons' => [
            [
                'label' => '确定受理',
                'action' => new \yii\web\JsExpression("function(dialog) {
                    $.ajax({
                        'url':'/project/apply/accept',
                        'type':'post',
                        'data':{project_id:$('#accept-form input[name=\"project_id\"]').val(),level:$('#accept-form input[name=\"level\"]:checked').val()},
                        'dataType':'json',
                        'success':function(json){

                        }
                    });
                }")
            ],
        ]
    ], // custom options
]);
$level = '';
foreach(Apply::getArrayLevel() as $id=>$title){
    $level .='<div class="radio-inline" style="width: 100px"><label><input type="radio" name="level" value="'.$id.'"> '.$title.' </label></div>';
}
$js = <<< JS
$('.btn-accept').on('click',function(){

    var _html = '<form id="accept-form"><input type="hidden" class="form-control" name="project_id" value="'+$(this).attr('data-key')+'">';
    _html +='<dl>';
    _html +='   <dt class="text-center"><h3> '+$(this).attr('data-title')+' </h3></dt>';
    _html +='   <dt><label class="control-label" for="apply-level">指定星级</label></dt>';
    _html +='   <dd>$level</dd>';
    _html +='</dl></form>';
    acceptDialog.dialog(_html, function (result) {

    });
});
JS;
$this->registerJs($js);
endif;
?>
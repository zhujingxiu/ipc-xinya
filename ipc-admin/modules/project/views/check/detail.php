<?php


use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\modules\config\models\Prove;
use ipc\modules\project\modules\config\models\Check;
extract($params);
$investigate = \ipc\modules\project\models\Investigate::findOne(['project_id'=>$node->project_id]);

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
                'labelColOptions' => ['style'=>'display:none'],
                'value' => $node->text,
                'type'=>DetailView::INPUT_TEXTAREA,
                'valueColOptions'=>['style'=>'width:90%;margin:5px;'],
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
                'label' => msgModule::t('project','Ensure'),
                'value' => $node->ensure,
                'type'=>DetailView::INPUT_TEXTAREA,
                'valueColOptions'=>['style'=>'width:90%']
            ],
        ]
    ],
    [
        'group'=>true,
        'label'=>msgModule::t('project','Sign Info'),
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute' => 'level',
                'displayOnly'=>true,
                'label' => '风险调查等级',
                'value' => Check::getTitleLabel($investigate->level),

            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'officer',
                'displayOnly'=>true,
                'label' => '指定风险官',
                'value' => User::getRealnameLabel($investigate->officer),

            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'remark',
                'displayOnly'=>true,
                'format' => 'raw',
                'value' => "<div class=''>".$investigate->remark."</div> <br><div class='pull-left'>分管领导：<b>".User::getRealnameLabel($investigate->user_id).'</b></div><div class="pull-right">'.date(Yii::t('app','Date CN'),$investigate['addtime']).'</div>',
                'labelColOptions' => [
                    'style' => 'display:none'
                ],
                'type'=>DetailView::INPUT_TEXTAREA,
                'valueColOptions'=>['style'=>'width:90%'],
                'options'=>['rows'=>5]
            ],

        ]
    ]
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


$attach = new \ipc\modules\project\models\Attach();
$attach->project_id = $node->project_id;
$attach->prove_id = Prove::getValue(Prove::REPORT);
echo DetailView::widget([
    'model' => $attach,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_EDIT,
    'labelColOptions' => ['style' => 'width: 12%;'],
    'panel'=>[
        'heading'=> ' 调查报告 ',//$node->$nameAttribute,
        'type'=>DetailView::TYPE_PRIMARY,
    ],
    'vAlign'=>'top',
    'formOptions' => [
        'action' => '/project/check/save',
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
                    'value' => $attach->project_id,
                    'type' => DetailView::INPUT_HIDDEN
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'prove_id',
                    'value' => $attach->prove_id,
                    'type' => DetailView::INPUT_HIDDEN
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'title',
                    'label' => '报告标题',
                    'value' => $attach->title,
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'file',
                    'label' => '上传文件',
                    'value' => $attach->path,
                    'type' => DetailView::INPUT_FILEINPUT,
                    'widgetOptions'=>[
                        'language' => 'zh-CN',
                        'options' => ['multiple' => true,'id'=>'project-attach'],
                        'pluginOptions' => [
                            'showUpload' => false,
                            'uploadUrl' => \yii\helpers\Url::to(['/project/check/upload']),
                            'uploadAsync' => true,
                            'maxFileCount' => 3,
                            'uploadExtraData' => [
                                'sn' => $node->project_sn
                            ]
                        ],
                        'pluginEvents' => [
                            'fileuploaded' => 'function(event,data,previewId,index) {
                                var _val = {"name":data.response.name,"path":data.response.path,"type":data.response.type};
                                $("#project-attach").after("<input type=\"hidden\" name=\"Attach[file][]\" id=\""+previewId+"\" value="+$.toJSON(_val)+" />");
                            }',
                        ]
                    ],
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'remark',
                    'label'=>'简要描述',
                    'value' => $attach->remark,
                    'type'=>DetailView::INPUT_TEXTAREA,
                    'valueColOptions'=>['style'=>'width:90%'],
                ],
            ]
        ]
    ]
]);


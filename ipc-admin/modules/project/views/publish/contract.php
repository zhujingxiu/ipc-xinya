<?php
use ipc\modules\project\models\Audit;
use kartik\detail\DetailView;
use ipc\modules\project\models\Attach;
use ipc\modules\project\modules\config\models\Prove;
use yii\widgets\ActiveForm;
$this->registerCss("
#accordion .box-header:before,#accordion .box-body:before,#accordion .box-footer:before,#accordion .box-header:after,#accordion .box-body:after,#accordion .box-footer:after{
    display:none;
}
");

$audit = Audit::findOne(['project_id'=>$contract->project_id]);
if($audit === null){
    $audit = new Audit();
    $audit->project_id = $contract->project_id;
    $audit->status = 0;
}

?>

<div class="box box-solid">
    <div class="box-body">
        <div class="box-group" id="accordion">
            <div class="panel box <?php echo $audit->status ? 'box-success' : 'box-danger' ?>">
                <div class="box-header">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#manifest" class="collapsed">信贷要件合规审核表</a>
                    </h4>
                </div>
                <div id="manifest" class="panel-collapse collapse" style="height: 0px;">
                    <div class="box-body">
                        <?php
                        echo DetailView::widget(array_merge($common ,[
                            'model' => $audit,
                            'labelColOptions' => ['style' => 'width: 10%;'],
                            'panel' => [ 'heading' => '基本信息' ],
                            'formOptions' => [ 'action' => '/project/publish/audit', ],
                            'attributes' => [
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'project_id',
                                            'value' => $audit->project_id,
                                            'labelColOptions' => [ 'style' => 'display:none;' ],
                                            'valueColOptions' => [ 'style' => 'display:none;' ]
                                        ],
                                    ],
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'audit_sn',
                                            'label' => '受理编号：',
                                            'format'=>'raw',
                                            'value' => $audit->audit_sn ? 'HG('.date('Y').')'.$audit->audit_sn.'号' :  'HG('.date('Y').')',
                                            'labelColOptions' =>[
                                                'style'=>'width:60%;text-align:right;'
                                            ],
                                            'valueColOptions'=>['style'=>'font-weight:bold;color:blue;width:40%;'],
                                            'options' => [
                                                'addon' => [
                                                    'prepend' => [
                                                        'content' => 'HG('.date('Y').')'
                                                    ]
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'borrower',
                                            'label' => '受理人',
                                            'value' => $audit->borrower,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                        [
                                            'attribute' => 'contract_sn',
                                            'label' => '合同编号',
                                            'value' => $audit->contract_sn,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                    ]
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'amount',
                                            'label' => '申请金额',
                                            'value' => $audit->amount,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                        [
                                            'attribute' => 'tender',
                                            'label' => '业务种类',
                                            'value' => $audit->tender,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                    ]
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'ensure',
                                            'label' => '保证措施',
                                            'value' => $audit->ensure,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                        [
                                            'attribute' => 'due',
                                            'label' => '项目期限',
                                            'value' => $audit->due,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                    ]
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'prebid',
                                            'label' => '拟借款时间',
                                            'value' => $audit->prebid,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                        [
                                            'attribute' => false,
                                            'displayOnly' => true,
                                            'label' => '',
                                            'value' => '',
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                    ]
                                ],
                                [
                                    'columns' => [
                                        [
                                            'attribute' => 'operator',
                                            'label' => '经办人',
                                            'value' => $audit->operator,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                        [
                                            'attribute' => 'phone',
                                            'label' => '联系电话',
                                            'value' => $audit->phone,
                                            'valueColOptions'=>['style'=>'width:40%']
                                        ],
                                    ]
                                ],
                            ]
                        ]));
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">审核内容</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-response">
                                    <?php $form = ActiveForm::begin(['id'=>'form-attach','successCssClass'=>'']);?>
                                    <table class="table table-hover table-condensed table-striped">
                                        <?php foreach(Prove::getArrayAudit() as $_prove => $_title) :?>
                                        <?php
                                            $_proveAttach = Attach::findOne(['project_id'=>$contract->project_id,'prove_id'=>Prove::getValue($_prove)]);
                                            if($_proveAttach === null)
                                            {
                                                $_proveAttach = new Attach();
                                                $_proveAttach->project_id = $contract->project_id;
                                                $_proveAttach->prove_id = Prove::getValue($_prove);
                                                $_proveAttach->status = 0;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="2">
                                                <table class="kv-child-table" style="border-bottom:1px solid #ddd">
                                                    <tbody>
                                                    <tr>
                                                        <th style="width:15%;vertical-align: top;">
                                                            <label class="control-label"><?php echo $_title;?></label>
                                                            <div class="hidden">
                                                            <?php $_prove = ucfirst($_prove);
                                                            echo $form->field($_proveAttach,'project_id')->hiddenInput(['name'=>$_prove.'[project_id]'])->label(false);
                                                            echo $form->field($_proveAttach,'prove_id')->hiddenInput(['name'=>$_prove.'[prove_id]'])->label(false);
                                                            ?>
                                                            </div>
                                                        </th>
                                                        <td style="width:15%;">
                                                            <?php
                                                            echo $form->field($_proveAttach,'status')->radioList(['1' => '合规', '0' => '不合规'],['name'=>$_prove.'[status]'])->label(false);
                                                            ?>
                                                        </td>
                                                        <td style="width:70%">
                                                            <?php echo $form->field($_proveAttach,'remark')->textInput(['name'=>$_prove.'[remark]'])->label(false); ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </table>
                                    <?php  ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-success">
                <div class="box-header">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#contract" class="">合同签署</a>
                    </h4>
                </div>
                <div id="contract" class="panel-collapse collapse in">
                    <div class="box-body">
                    <?php echo DetailView::widget( array_merge($common ,[
                        'model' => $contract,
                        'panel' => [ 'heading'=> '合同签署：' ],
                        'attributes' => [
                            [
                                'columns' => [
                                    [
                                        'attribute' => 'project_id',
                                        'value' => $contract->project_id,
                                        'labelColOptions' => [ 'style' => 'display:none' ],
                                        'type'=>DetailView::INPUT_HIDDEN,
                                    ],
                                    [
                                        'attribute' => 'mode',
                                        'value' => $contract->mode,
                                        'labelColOptions' => [ 'style' => 'display:none' ],
                                        'type'=>DetailView::INPUT_HIDDEN,
                                    ],
                                ]
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute' => 'content',
                                        'value' => $contract->content,
                                        'labelColOptions' => [ 'style' => 'display:none' ],
                                        'type'=>DetailView::INPUT_TEXTAREA,
                                        'valueColOptions'=>['style'=>'width:90%'],
                                    ],
                                ]
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute' => false,
                                        'displayOnly' => true,
                                        'labelColOptions' => [ 'style' => 'display:none' ],
                                        'format' => 'raw',
                                        'value' => '<div class="pull-left">'.$operators.'</div><div class="pull-right">'.date(Yii::t('app','Date CN')).'</div>',
                                        'type'=>DetailView::INPUT_TEXTAREA,
                                        'valueColOptions'=>['style'=>'width:90%']
                                    ],
                                ]
                            ],
                        ]
                    ]))
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

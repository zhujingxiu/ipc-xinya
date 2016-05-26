<?php


use kartik\detail\DetailView;
use ipc\modules\project\models\Publish;
use ipc\modules\project\models\Approve;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\models\Order;
use ipc\modules\project\modules\config\models\Status;
use system\modules\auth\models\Role;
use yii\helpers\ArrayHelper;
extract($params);

$user_id = Yii::$app->user->id;
$sign = \ipc\modules\project\models\Sign::findOne( $node->project_id);
$assessed = $sign->getHistory(\ipc\modules\project\modules\config\models\Status::ASSESSED);

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
        'columns' => [
            [
                'attribute' => 'borrower',
                'displayOnly' => true,
                'label' => msgModule::t('project','Borrower'),
                'value' => $node->borrower,
                'valueColOptions'=>['style'=>'width:20%']
            ],
            [
                'attribute' => 'company',
                'displayOnly' => true,
                'label' => msgModule::t('project','Company'),
                'value' => $node->company,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute' => 'tender',
                'displayOnly' => true,
                'label' => msgModule::t('project','Tender'),
                'value' => Tender::getTitleLabel($node->tender),
                'valueColOptions'=>['style'=>'width:20%'],

            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'amount',
                'displayOnly' => true,
                'label' => msgModule::t('project','Amount'),
                'value' => number_format($node->amount,2).msgModule::t('project','Amount Unit'),
                'valueColOptions'=>['style'=>'width:20%']
            ],
            [
                'attribute' => 'due',
                'displayOnly' => true,
                'label' => msgModule::t('project','Due'),
                'value' => $node->due.msgModule::t('project','Due Unit'),
                'valueColOptions'=>['style'=>'width:30%']
            ],

            [
                'attribute' => 'repayment',
                'label' => msgModule::t('project','Repayment'),
                'value' => Repayment::getTitleLabel($node->repayment),
                'valueColOptions'=>['style'=>'width:20%'],
                'displayOnly' => true,
            ],
        ]
    ],
];
$order = Order::findOne(['project_id'=>$node->project_id,'status'=>1]);
if($order){
    $attributes[] = [
        'columns' => [
            [
                'attribute' => 'income',
                'displayOnly' => true,
                'label' => '标的收益',
                'value' => $order->income."%",
                'valueColOptions'=>['style'=>'width:20%'],
            ],

            [
                'attribute' => 'prebid',
                'displayOnly' => true,
                'value' => $order->prebid,
                'label' => '预计发标日期',
                'type'=>DetailView::INPUT_DATE,
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'attribute' => 'fee',
                'displayOnly' => true,
                'label' => '平台费用',
                'value' => $order->fee."%",
                'valueColOptions'=>['style'=>'width:20%'],

            ],
        ]
    ];
}
$settings = [
    'model' => $node,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'labelColOptions' => ['style' => 'width: 10%;'],
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

if($order === null) {
    $order = new Order();
    $order->project_id = $node->project_id;
    echo DetailView::widget([
        'model' => $order,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_EDIT,
        'labelColOptions' => ['style' => 'width: 10%;'],
        'panel' => [
            'heading' => ' 费用及收益 ',//$node->$nameAttribute,
            'type' => DetailView::TYPE_PRIMARY,
        ],
        'formOptions' => [
            'action' => '/project/publish/order',
        ],
        'buttons2' => "{save}",
        'saveOptions' => [
            'title' => '提交',
        ],
        'attributes' => [
            [
                'columns' => [
                    [
                        'attribute' => 'project_id',
                        'value' => $order->project_id,
                        'type' => DetailView::INPUT_HIDDEN
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'fee',
                        'label' => '平台费用（%）',
                        'value' => $order->fee,
                        'valueColOptions' => ['style' => 'width:20%'],

                    ],
                    [
                        'attribute' => 'prebid',
                        'value' => $order->prebid,
                        'label' => '预计发标日期',
                        'type' => DetailView::INPUT_DATE,
                        'widgetOptions' => [
                            'pluginOptions'=>['format'=>'yyyy-mm-dd']
                        ],
                        'valueColOptions' => ['style' => 'width:30%'],
                    ],
                    [
                        'attribute' => 'income',
                        'label' => '标的收益（%）',
                        'value' => $order->income,
                        'valueColOptions' => ['style' => 'width:20%'],
                    ],
                ]
            ]
        ]
    ]);
}else{
    $items = [];
    $common = [
        'mode'=>DetailView::MODE_EDIT,
        'condensed'=>true,
        'hover'=>true,
        'buttons1' => false,
        'buttons2' => false,
        'panel' => [ 'heading'=> '' ],
        'formOptions' => [ 'action' => '/project/publish/commit', ],
        'attributes' => []
    ];
    $approve = Approve::findOne( $node->project_id);
    $assessed = $approve->getHistory(Status::ASSESSED);
    $confirmed = $approve->publishConfirmers;

//undertake
    $undertake = Publish::findOne(['project_id' => $node->project_id,'mode'=>Publish::MODE_UNDERTAKE]);
    if($undertake === null){
        $undertake = new Publish();
        $undertake->project_id = $node->project_id;
        $undertake->mode = Publish::MODE_UNDERTAKE;
    }

    $operators = [];
    foreach([$approve->agent_a,$approve->agent_b] as $uId){
        if($uId) {
            $_str = '<div style="width: 280px">项目承办人：' . User::getRealnameLabel($uId) ;
            if(isset($confirmed['undertake']) && in_array($uId,$confirmed['undertake'])){
                $_str .=  '<a class="pull-right btn btn-success" disabled>已确认</a>';
            }else if($uId == $user_id){
                $_str .=  '<button class="pull-right btn btn-primary">确认</button>';
            }else{
                $_str .=  '<a class="pull-right btn btn-default" disabled>未确认</a>';
            }
            $_str .='</div>';
            $operators[] = $_str;
        }
    }

    $items[] = [
        'label'=>'<i class="fa fa-user"></i> 借款综述',
        'content'=> DetailView::widget( array_merge($common ,
                [
                    'model' => $undertake,
                    'mode' => DetailView::MODE_VIEW,
                    'panel' => [ 'heading' => '承办人确认' ],
                    'attributes' => [
                        [
                            'columns' => [
                                [
                                    'attribute' => 'project_id',
                                    'value' => $undertake->project_id,
                                    'labelColOptions' => [ 'style' => 'display:none;' ],
                                    'valueColOptions' => [ 'style' => 'display:none;' ]
                                ],
                                [
                                    'attribute' => 'mode',
                                    'value' => $undertake->mode,
                                    'labelColOptions' => [ 'style' => 'display:none;' ],
                                    'valueColOptions' => [ 'style' => 'display:none;' ]
                                ],
                            ]
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute' => false,
                                    'value' => empty($assessed['note']) ? '' : $assessed['note'] ,
                                    'format' => 'raw',
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
                                    'value' => '<div class="pull-left">'.implode("<br>",$operators).'</div><div class="pull-right">'.date(Yii::t('app','Date CN')).'</div>',
                                    'type'=>DetailView::INPUT_TEXTAREA,
                                    'valueColOptions'=>['style'=>'width:90%']
                                ],
                            ]
                        ]
                    ]
                ])
        ),
        'active'=>true
    ];
    //risk
    $risk = Publish::findOne(['project_id' => $node->project_id,'mode'=>Publish::MODE_RISK]);
    if($risk === null) {
        $risk = new Publish();
        $risk->project_id = $node->project_id;
        $risk->mode = Publish::MODE_RISK;
    }

    $operators = '<div style="width: 280px">风控部意见：' ;
    if(isset($confirmed['risk']) ){
        $operators .=  User::getRealnameLabel(current($confirmed['risk'])) .'<a class="pull-right btn btn-success" disabled>已确认</a>';
    }else{
        $_users = ArrayHelper::map(User::getUsersByRole(Role::RISK),'user_id','realname');
        if(array_key_exists($user_id,$_users)){
            $operators .= $_users[$user_id].' <button class="pull-right btn btn-primary">确认</button>';
        }else{
            $operators .= '<a class="pull-right btn btn-default" disabled>未确认</a>';
        }
    }
    $operators .= '</div>';
    $items[] = [
        'label'=>'<i class="fa fa-user"></i> 项目审核',
        'content'=> DetailView::widget( array_merge($common ,[
            'model' => $risk,
            'panel' => [ 'heading'=> '项目审核结论：' ],
            'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => 'project_id',
                            'value' => $risk->project_id,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                        [
                            'attribute' => 'mode',
                            'value' => $risk->mode,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'content',
                            'value' => $risk->content,
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
    ];

    //contract
    $contract = Publish::findOne(['project_id' => $node->project_id,'mode'=>Publish::MODE_CONTRACT]);
    if($contract === null) {
        $contract = new Publish();
        $contract->project_id = $node->project_id;
        $contract->mode = Publish::MODE_CONTRACT;
    }

    $operators = '<div style="width: 280px">合同签署监督人：' ;
    if(isset($confirmed['contract']) ){
        $operators .=  User::getRealnameLabel(current($confirmed['contract'])) .'<a class="pull-right btn btn-success" disabled>已确认</a>';
    }else{
        $_users = ArrayHelper::map(User::getUsersByRole(Role::CREDIT),'user_id','realname');
        if(array_key_exists($user_id,$_users)){
            $operators .= $_users[$user_id].' <button class="pull-right btn btn-primary">确认</button>';
        }else{
            $operators .= '<a class="pull-right btn btn-default" disabled>未确认</a>';
        }
    }
    $operators .= '</div>';
    $items[] = [
        'label'=>'<i class="fa fa-user"></i> 合同签署',
        'content'=> $this->render('contract',[
            'common' => $common,
            'contract' => $contract,
            'operators' => $operators
        ])
    ];

    //chairman
    $chairman = Publish::findOne(['project_id' => $node->project_id,'mode'=>Publish::MODE_CHAIRMAN]);
    if($chairman === null) {
        $chairman = new Publish();
        $chairman->project_id = $node->project_id;
        $chairman->mode = Publish::MODE_CHAIRMAN;
    }

    $operators = '<div style="width: 280px">董事长意见：' ;
    if(isset($confirmed['chairman']) ){
        $operators .=  User::getRealnameLabel(current($confirmed['chairman'])) .'<a class="pull-right btn btn-success" disabled>已确认</a>';
    }else{
        $_users = ArrayHelper::map(User::getUsersByRole(Role::CHAIRMAN),'user_id','realname');
        if(array_key_exists($user_id,$_users)){
            $operators .= $_users[$user_id].' <button class="pull-right btn btn-primary">确认</button>';
        }else{
            $operators .= '<a class="pull-right btn btn-default" disabled>未确认</a>';
        }
    }
    $operators .= '</div>';
    $items[] = [
        'label'=>'<i class="fa fa-user"></i> 信贷发布',
        'content'=> DetailView::widget( array_merge($common ,[
            'model' => $chairman,
            'panel' => [ 'heading'=> '信贷项目发布意见：' ],
            'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => 'project_id',
                            'value' => $chairman->project_id,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                        [
                            'attribute' => 'mode',
                            'value' => $chairman->mode,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'content',
                            'value' => $chairman->content,
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
    ];
    echo \kartik\tabs\TabsX::widget([
        'items'=>$items,
        'position'=>\kartik\tabs\TabsX::POS_LEFT,
        //'sideways'=>true,
        'bordered' => true,
        'encodeLabels'=>false
    ]);
}

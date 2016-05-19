<?php


use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use ipc\modules\project\Module as msgModule;
use system\models\User;
use ipc\modules\project\modules\config\models\Tender;
use ipc\modules\project\modules\config\models\Repayment;
use ipc\modules\project\models\Approve;
use ipc\modules\project\modules\config\models\Check;
use kartik\tabs\TabsX;
use ipc\modules\project\models\Comment;
use ipc\modules\project\modules\config\models\Status;
use system\modules\auth\models\Role;
extract($params);

$user_id = Yii::$app->user->id;
$process = \ipc\modules\project\models\Process::findOne(['project_id'=>$node->project_id]);

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
                'attribute' => 'phone',
                'label' => msgModule::t('project','Phone'),
                'value' => $node->phone,
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
                'attribute' => 'level',
                'displayOnly'=>true,
                'label' => '风险调查等级',
                'value' => Check::getTitleLabel($process->level),
            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'officer',
                'displayOnly'=>true,
                'label' => '指定风险官',
                'value' => User::getRealnameLabel($process->officer),
            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'remark',
                'displayOnly'=>true,
                'format' => 'raw',
                'value' => $process->remark,
                'type'=>DetailView::INPUT_TEXTAREA,
                'valueColOptions'=>['style'=>'width:90%'],
                'options'=>['rows'=>5]
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

$attach = \ipc\modules\project\models\Attach::findOne(['project_id' => $node->project_id]);
$items = [];
$common = [
    'mode'=>DetailView::MODE_EDIT,
    'condensed'=>true,
    'hover'=>true,
    'buttons1' => false,
    'buttons2' => false,
    'panel' => [ 'heading'=> '' ],
    'formOptions' => [
        'action' => '/project/approve/commit',
    ],
    'attributes' => []
];
$approve = \ipc\modules\project\models\Approve::findOne( $node->project_id);
$assessed = $approve->getHistory(Status::ASSESSED);
$confirmed = $approve->confirmers;

//undertake
$undertake = Comment::findOne(['project_id' => $node->project_id,'mode'=>Comment::MODE_UNDERTAKE]);
if($undertake === null){
    $undertake = new Comment();
    $undertake->project_id = $node->project_id;
    $undertake->mode = Comment::MODE_UNDERTAKE;
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
    'label'=>'<i class="fa fa-user"></i> 承办意见',
    'content'=> DetailView::widget( array_merge($common ,
        [
            'model' => $undertake,
            'mode'=>DetailView::MODE_VIEW,
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

//credit
$credit = Comment::findOne(['project_id' => $node->project_id,'mode'=>Comment::MODE_CREDIT]);
if($credit === null) {
    $credit = new Comment();
    $credit->project_id = $node->project_id;
    $credit->mode = Comment::MODE_CREDIT;
}
$operators = '<div style="width: 280px">信贷部：'  ;
if(isset($confirmed['credit']) ){
    $operators .=  User::getRealnameLabel(current($confirmed['credit'])) .' <a class="pull-right btn btn-success" disabled>已确认</a>';
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
    'label'=>'<i class="fa fa-tag"></i> 信贷部意见',
    'content'=> DetailView::widget( array_merge($common ,
        [
            'model' => $credit,
            'panel' => [ 'heading'=> '信贷部意见：' ],
            'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => 'project_id',
                            'value' => $credit->project_id,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                        [
                            'attribute' => 'mode',
                            'value' => $credit->mode,
                            'labelColOptions' => [ 'style' => 'display:none' ],
                            'type'=>DetailView::INPUT_HIDDEN,
                        ],
                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'content',
                            'value' => $credit->content,
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
        ])
    )
];

//rist
$risk = Comment::findOne(['project_id' => $node->project_id,'mode'=>Comment::MODE_RISK]);
if($risk === null) {
    $risk = new Comment();
    $risk->project_id = $node->project_id;
    $risk->mode = Comment::MODE_RISK;
}

$operators = '<div style="width: 280px">风控部：' ;
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
    'label'=>'<i class="fa fa-tag"></i> 风控意见',
    'content'=> DetailView::widget( array_merge($common ,
        [
            'model' => $risk,
            'panel' => [ 'heading'=> '风控合规部意见：' ],
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
        ])
    )
];


// committee
$committee = Comment::findOne(['project_id' => $node->project_id,'mode'=>Comment::MODE_COMMITTEE]);
if($committee === null) {
    $committee = new Comment();
    $committee->project_id = $node->project_id;
    $committee->mode = Comment::MODE_COMMITTEE;
}

$operators = [];
foreach(User::getUsersByRole(Comment::MODE_COMMITTEE) as $user){
    if(!empty($user['user_id'])) {
        $_str = '<div style="width: 280px">委员：' . $user['realname'] ;
        if(isset($confirmed['committee']) && in_array($user['user_id'],$confirmed['committee'])){
            $_str .=  '<a class="pull-right btn btn-success" disabled>已确认</a>';
        }else if($user['user_id'] == $user_id){
            $_str .=  '<button class="pull-right btn btn-primary">确认</button>';
        }else{
            $_str .=  '<a class="pull-right btn btn-default" disabled>未确认</a>';
        }
        $_str .='</div>';
        $operators[] = $_str;
    }
}

$items[] = [
    'label'=>'<i class="fa fa-tags"></i> 审批意见',
    'content'=>DetailView::widget( array_merge($common ,
        [
            'model' => $committee,
            'panel' => ['heading'=> '评审委员会确认：',  ],
            'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => 'content',
                            'value' => $committee->content,
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
                            'value' => '<div class="pull-left">'.implode(" <br> ",$operators).'</div><div class="pull-right">'.date(Yii::t('app','Date CN')).'</div>',
                            'type'=>DetailView::INPUT_TEXTAREA,
                            'valueColOptions'=>['style'=>'width:90%']
                        ],
                    ]
                ],
            ]
        ])
    ),
];
$process = \ipc\modules\project\models\Process::findOne(['project_id'=>$node->project_id]);
$operators = '<div style="width: 280px">调查人：'.User::getRealnameLabel($process->officer) ;
if(isset($confirmed['risk']) ){
    $operators .=   '<a class="pull-right btn btn-success" disabled>已确认</a>';
}else{
    $operators .= '<a class="pull-right btn btn-default" disabled>未确认</a>';
}
$operators .= '</div>';


$files = \yii\helpers\Json::decode($attach->file);
$images = [];
foreach($files as $file){
    $images[] = '<a class="thumbnail" href="#"><img src="'.$file['path'].'" title="'.$file['name'].'" /></a>';
}
$items[] = [
    'label'=>'<i class="fa fa-book"></i> 调查报告',
    'content'=>DetailView::widget( array_merge($common ,
        [
            'model' => $attach,
            'panel' => [ 'heading'=> '调查人确认：', ],
            'attributes' => [

                [
                    'columns' => [
                        [
                            'format' => 'raw',
                            'attribute' => false,
                            'displayOnly' => true,
                            'label' => '报告',
                            'value' => implode("",$images),
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
        ])
    ),

];

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_LEFT,
    //'sideways'=>true,
    'bordered' => true,
    'encodeLabels'=>false
]);

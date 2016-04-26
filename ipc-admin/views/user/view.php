<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use system\models\User;

/* @var $this yii\web\View */
/* @var $model system\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p class="hidden">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'bordered'=>true,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>  $model->realname .' ['.Yii::$app->formatter->asDatetime($model->created_at) .']' ,
            'type'=>DetailView::TYPE_PRIMARY,

        ],
        'attributes' => [
            [
                'group'=>true,
                'label'=>Yii::t('app','Profile'),
                'rowOptions'=>['class'=>'info']
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'username',
                        'value' => $model->username,
                        'valueColOptions'=>['style'=>'width:30%']

                    ],
                    [
                        'attribute' => 'realname',
                        'value' => $model->realname,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],


                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'password',
                        'value' => '',
                        'type'=>DetailView::INPUT_PASSWORD ,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'repassword',
                        'value' => '',
                        'type'=>DetailView::INPUT_PASSWORD ,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],


                ]
            ],

            [
                'columns' => [
                    [
                        'attribute' => 'email',
                        'value' => $model->email,
                        'format' => ['email'],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'status',
                        'type'=>DetailView::INPUT_SWITCH ,
                        'format'=>'raw',
                        'value'=>$model->status ? '<span class="label label-success">'.Yii::t('app','Enabled').'</span>' : '<span class="label label-danger">'.Yii::t('app','Disabled').'</span>',
                        'valueColOptions'=>['style'=>'width:30%'],
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => Yii::t('app','Enabled'),
                                'offText' => Yii::t('app','Disabled'),
                            ]
                        ],

                    ],
                ]

            ],
            [
                'columns' => [
                    [
                        'attribute' => 'created_at',
                        'displayOnly'=>true,
                        'format' => ['datetime'],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'updated_at',
                        'displayOnly'=>true,
                        'format' => ['datetime'],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ]
            ],
            [
                'group'=>true,
                'label'=>Yii::t('app','Role'),
                'rowOptions'=>['class'=>'success']
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'role',
                        'format'=>'raw',
                        'value'=>$model->roleLabel,
                        'type'=>DetailView::INPUT_CHECKBOX_LIST,
                        'items' => \system\models\User::getArrayRole(),
                        'options' => [
                            'class' => 'checkbox'
                        ]
                    ],

                ]
            ],
        ],
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => $model->user_id, 'kvdelete'=>true],
        ],

    ]) ?>

</div>

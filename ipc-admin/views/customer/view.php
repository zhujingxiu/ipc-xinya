<?php

use yii\helpers\Html;

use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model ipc\models\Customer */

$this->title = $model->realname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('customer', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">


    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>  $model->realname .' ['.Yii::$app->formatter->asDatetime($model->addtime) .']' ,
            'type'=>DetailView::TYPE_PRIMARY,

        ],

        'attributes' => [
            [
                'group'=>true,
                'label'=>Yii::t('customer','Profile'),
                'rowOptions'=>['class'=>'info']
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'realname',
                        'value' => $model->realname,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'phone',
                        'value' => $model->phone,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],

                ]
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'email',
                        'value' => $model->email,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'gender',
                        'value' => $model->getGenderLabel(),
                        'type'=>DetailView::INPUT_RADIO_LIST ,
                        'items' => $model->getArrayGender(),
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => Yii::t('customer','Yes'),
                                'offText' => Yii::t('customer','No'),
                            ]
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ]

            ],
            [
                'columns' => [

                    [
                        'attribute' => 'birthday',
                        'value' => $model->birthday,
                        'type'=>DetailView::INPUT_DATE ,
                        'widgetOptions'=>[
                            'pluginOptions'=>['format'=>'yyyy-mm-dd']
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute' => 'idnumber',
                        'value' => $model->idnumber,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ]
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'approved',
                        'type'=>DetailView::INPUT_SWITCH ,
                        'format'=>'raw',
                        'value'=>$model->approved ?'<span class="label label-success">'.Yii::t('customer','Yes').'</span>' : '<span class="label label-danger">'.Yii::t('customer','No').'</span>',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => Yii::t('customer','Yes'),
                                'offText' => Yii::t('customer','No'),
                            ]
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'vip',
                        'type'=>DetailView::INPUT_SWITCH ,
                        'format'=>'raw',
                        'value'=>$model->vip ? '<span class="label label-success">'.Yii::t('customer','Yes').'</span>' : '<span class="label label-danger">'.Yii::t('customer','No').'</span>',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => Yii::t('customer','Yes'),
                                'offText' => Yii::t('customer','No'),
                            ]
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],


                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'status',
                        'type'=>DetailView::INPUT_SWITCH ,
                        'format'=>'raw',
                        'value'=>$model->status ? '<span class="label label-success">'.Yii::t('customer','Enabled').'</span>' : '<span class="label label-danger">'.Yii::t('customer','Disabled').'</span>',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => Yii::t('customer','Enabled'),
                                'offText' => Yii::t('customer','Disabled'),
                            ]
                        ],

                    ],
                ]

            ]
            ,
            [
                'group'=>true,
                'label'=>Yii::t('customer','Company'),
                'rowOptions'=>['class'=>'success']
            ],
/*            [
                'columns' => [
                    [
                        //'attribute'=>'role',
                    ]
                ]
            ]*/
        ],
    ]) ?>

</div>

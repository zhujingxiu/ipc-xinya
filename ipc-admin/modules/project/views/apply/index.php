<?php

use yii\helpers\Html;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use ipc\modules\project\Module;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel ipc\modules\project\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('apply', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <?= DataTables::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'project_id',
                    'project_sn',
                    'borrower',
                    'phone',
                    'company',
                    'amount',
                    'due',

                    [
                        'attribute' => 'tender',
                        'value' => function ($model) {
                            return $model->tenderLabel;
                        },
                        'filter' => Html::activeDropDownList(
                            $searchModel,
                            'tender',
                            $arrayTender,
                            ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                        )
                    ],
                    // 'fee',
                    [
                        'attribute' => 'repayment',
                        'value' => function ($model) {
                            return $model->repaymentLabel;
                        },
                        'filter' => Html::activeDropDownList(
                            $searchModel,
                            'repayment',
                            $arrayRepayment,
                            ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                        )
                    ],
                    [
                        'attribute' => 'addtime',
                        'format' => ['date', 'Y-M-d H:i:s'],
                    ],
                    [
                        'class' => 'system\components\ActionColumn',
                        'template' => '{confirm:confirm} {update:update} {del:delete} ',
                        'buttons' => [
                            'confirm' => function ($url, $model, $key) {
                                $options = [
                                    'title' => Module::t('apply', 'Confirm'),
                                    'class' => 'btn btn-success apply-confirm'
                                ];
                                return Html::a('<i class="fa fa-check-circle-o"></i>', 'javascript:;', $options);
                            },
                            'update' => function ($url, $model, $key) {
                                $options = [
                                    'title' => Yii::t('yii', 'Update'),
                                    'aria-label' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-primary'
                                ];
                                return Html::a('<i class="fa fa-pencil"></i>', $url, $options);
                            },
                            'delete' => function ($url, $model, $key) {
                                $options = [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-warning'
                                ];
                                return Html::a('<i class="fa fa-trash"></i>', $url, $options);
                            },
                        ]
                    ],
                ],
                /*
                'clientOptions' => [
                    "lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
                    "info"=>false,
                    "responsive"=>true,
                    "dom"=> 'lfTrtip',
                    "tableTools"=>[
                        "aButtons"=> [
                            [
                                "sExtends"=> "xls",
                                "oSelectorOpts"=> ["page"=> 'current']
                            ],[
                                "sExtends"=> "pdf",
                                "sButtonText"=> Yii::t('app',"Save to PDF")
                            ],
                        ]
                    ]
                ],*/
            ]); ?>
        </div>
    </div>
<?php
echo Dialog::widget([
    'libName' => 'krajeeDialogCust', // a custom lib name
    'options' => [  // customized BootstrapDialog options

        'type' => Dialog::TYPE_SUCCESS, // bootstrap contextual color

        'buttons' => [
            [
                'id' => 'btn-confirm',
                'label' => Module::t('apply','Confirm'),
                'action' => new JsExpression("function(dialog) {
                    dialog.setTitle('Title 1');
                    dialog.setMessage('This is a custom message for button number 1');
                }")
            ],
            [
                'label' => Yii::t('kvdialog', 'Cancel'),
                'icon' => Dialog::ICON_CANCEL,
                'action' => new JsExpression("function(dialog) {
                    dialog.close();
                }")
            ],


        ]
    ]
]);


$js = <<< JS
$(".apply-confirm").on("click", function() {
    krajeeDialogCust.dialog(
        '',
        function(result) {
            // do something
            console.log(result);
            dialog.setTitle('hahah');
        }
    );
});
JS;

$this->registerJs($js);
?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use ipc\models\User;
use yii\helpers\ArrayHelper;

use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel ipc\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Create ') . Yii::t('app', 'User')]) ?>
</p>
<div class="user-index box">

    <div class="box-header">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>
    <div class="box-body  ">
    <?= DataTables::widget([
        'tableOptions' => [
            'id' => 'user-list',
            'class' => 'table table-responsive'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',

            [
                'attribute' => 'role',
                'value' => function ($model) {

                            return $model->roleLabel;
                        },
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'role',
                        $arrayRole,
                        ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                    )
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                        if ($model->status === $model::STATUS_ACTIVE) {
                            $class = 'label-success';
                        } elseif ($model->status === $model::STATUS_INACTIVE) {
                            $class = 'label-warning';
                        } else {
                            $class = 'label-danger';
                        }

                        return '<span class="label ' . $class . '">' . $model->statusLabel . '</span>';
                    },
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'status',
                        $arrayStatus,
                        ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                    )
            ],
            //'created_at',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'Y-M-d H:i:s'],
            ],
            //'updated_at',

            [
                'class' => 'system\components\ActionColumn',
                'template' => ' {user-update:update} {user-del:delete} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
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
        /*'clientOptions' => [
            "lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
            "info"=>false,
            "responsive"=>true, 
            "dom"=> 'lfTrtip',
            "tableTools"=>[
                "aButtons"=> [  
                    [
                    "sExtends"=> "copy",
                    "sButtonText"=> Yii::t('app',"Copy to clipboard")
                    ],[
                    "sExtends"=> "csv",
                    "sButtonText"=> Yii::t('app',"Save to CSV")
                    ],[
                    "sExtends"=> "xls",
                    "oSelectorOpts"=> ["page"=> 'current']
                    ],[
                    "sExtends"=> "pdf",
                    "sButtonText"=> Yii::t('app',"Save to PDF")
                    ],[
                    "sExtends"=> "print",
                    "sButtonText"=> Yii::t('app',"Print")
                    ],
                ]
            ]
        ],*/
    ]); ?>
    </div>
</div>




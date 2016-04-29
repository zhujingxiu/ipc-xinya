<?php

use yii\helpers\Html;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use ipc\modules\project\Module;
use fedemotta\datatables\DataTables;
use ipc\modules\project\models\Apply;
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
    <div class="col-md-4">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'project_id',
                    'project_sn',
                    'borrower',
                    //'phone',
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
                            Apply::getArrayTender(),
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
                            Apply::getArrayRepayment(),
                            ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                        )
                    ],
                    [
                        'attribute' => 'addtime',
                        'format' => ['date', 'Y-M-d H:i:s'],
                    ],

                ],

            ]); ?>
        </div>
    </div>
    </div>
    <div class="col-md-8">
        <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body"></div>
            </div>
        </div>
</div>

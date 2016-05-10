<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\AssessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assess-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'project_sn') ?>

    <?= $form->field($model, 'borrower') ?>

    <?= $form->field($model, 'corporator') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'product') ?>

    <?php // echo $form->field($model, 'bussiness') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'due') ?>

    <?php // echo $form->field($model, 'tender') ?>

    <?php // echo $form->field($model, 'repayment') ?>

    <?php // echo $form->field($model, 'agent_a') ?>

    <?php // echo $form->field($model, 'agent_b') ?>

    <?php // echo $form->field($model, 'intent') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'ensure') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'edittime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('assess', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('assess', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

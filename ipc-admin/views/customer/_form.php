<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<p class="form-group">
    <?= Html::submitButton('<i class="fa fa-save"></i>', ['class' => 'btn btn-success' ,'form'=>'customer-form']) ?>
</p>
<div class="box">

<div class="box-body customer-form">

    <?php $form = ActiveForm::begin(['id'=>'customer-form']); ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList([ 'male' => 'Male', 'female' => 'Female', 'unknown' => 'Unknown', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'birthday')->dateInput() ?>

    <?= $form->field($model, 'idnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approved')->radioList([ '1' => 'Yes', '0' => 'No']) ?>

    <?= $form->field($model, 'vip')->radioList([ '1' => 'Yes', '0' => 'No'])  ?>

    <?= $form->field($model, 'status')->radioList([ '1' => 'Enable', '0' => 'Disable'])  ?>

    <?php ActiveForm::end(); ?>

</div>

</div>
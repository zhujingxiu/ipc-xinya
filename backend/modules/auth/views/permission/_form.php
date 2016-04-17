<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\auth\models\Permission */
/* @var $form yii\widgets\ActiveForm */
?>
<p>
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['form'=>'permission-form','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</p>
<div class="box">

    <div class="box-body permission-form" id="permission-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>



            <?php ActiveForm::end(); ?>


    </div>
</div>


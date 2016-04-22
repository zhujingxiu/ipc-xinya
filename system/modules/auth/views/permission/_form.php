<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Permission */
/* @var $form yii\widgets\ActiveForm */
?>
<p>
    <?= Html::submitButton( 'Save', ['form'=>'permission-form','class' => 'btn btn-primary']) ?>
</p>
<div class="box">

    <div class="box-body permission-form" >


        <?php $form = ActiveForm::begin(['id'=>'permission-form']); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'data')->textarea(['rows' => 2]) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>


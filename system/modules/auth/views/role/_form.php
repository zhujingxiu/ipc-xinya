<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>
<p><?= Html::submitButton('Save', ['form'=>'role-form','class' => 'btn btn-primary']) ?></p>
<?php $form = ActiveForm::begin(['id'=>'role-form']); ?>
<div class="col-lg-4">
    <div class="box">
        <div class="box-header">
            <h3>角色信息</h3>
        </div>
        <div class="role-form box-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 2]) ?>

        </div>
    </div>
</div>
<div class="col-lg-8" >
    <div class="box">
        <div class="box-header">
            <h3>授权</h3>
        </div>
        <div class="role-form box-body">

            <?= $form->field($model, 'child')->listBox(ArrayHelper::map($permissions,'name','name'),['multiple'=>'true']) ?>

        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
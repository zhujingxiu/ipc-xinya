<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Assess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assess-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'borrower')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'corporator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bussiness')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due')->textInput() ?>

    <?= $form->field($model, 'tender')->textInput() ?>

    <?= $form->field($model, 'repayment')->textInput() ?>

    <?= $form->field($model, 'agent_a')->textInput() ?>

    <?= $form->field($model, 'agent_b')->textInput() ?>

    <?= $form->field($model, 'intent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'source')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ensure')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'addtime')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'edittime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('assess', 'Create') : Yii::t('assess', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

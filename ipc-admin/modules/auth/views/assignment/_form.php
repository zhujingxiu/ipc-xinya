<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use ipc\modules\auth\Module;
/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Assignment */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'project_sn') ?>

    <?= $form->field($model, 'borrower') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'due') ?>

    <?php // echo $form->field($model, 'tender') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'fee') ?>

    <?php // echo $form->field($model, 'repayment') ?>

    <?php // echo $form->field($model, 'prebidding') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

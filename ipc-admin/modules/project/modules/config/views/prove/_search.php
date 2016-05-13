<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\ProveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prove-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prove_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'order') ?>

    <?= $form->field($model, 'credit') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'validity') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('prove', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('prove', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model system\modules\auth\models\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'node_id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'lft') ?>

    <?= $form->field($model, 'rgt') ?>

    <?= $form->field($model, 'lvl') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'icon_type') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'selected') ?>

    <?php // echo $form->field($model, 'disabled') ?>

    <?php // echo $form->field($model, 'readonly') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'collapsed') ?>

    <?php // echo $form->field($model, 'movable_u') ?>

    <?php // echo $form->field($model, 'movable_d') ?>

    <?php // echo $form->field($model, 'movable_l') ?>

    <?php // echo $form->field($model, 'movable_r') ?>

    <?php // echo $form->field($model, 'removable') ?>

    <?php // echo $form->field($model, 'removable_all') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('auth', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('auth', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

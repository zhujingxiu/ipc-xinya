<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<p>
    <?= Html::submitButton( Yii::t('app', 'Save'), ['class' => 'btn btn-primary','form'=>'user-form']) ?>
</p
<?php $form = ActiveForm::begin(['id'=>'user-form']); ?>
<div class="col-lg-5">
    <div class="box">

        <div class="box-header">
            <h3>用户信息</h3>
        </div>

        <div class="user-form box-body">

            <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'status')->radioList(User::getArrayStatus()) ?>
        </div>
    </div>
</div>

<div class="col-lg-7">
    <div class="box">
        <div class="box-header">
            <h3>用户信息</h3>
        </div>

        <div class="user-form box-body">
        
            <?=  $form->field($model, 'role')->radioList(User::getArrayRole()) ?>
        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>
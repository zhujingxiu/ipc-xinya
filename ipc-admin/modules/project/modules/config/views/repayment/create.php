<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Repayment */

$this->title = Yii::t('app', 'Create Repayment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repayments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repayment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

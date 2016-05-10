<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Assess */

$this->title = Yii::t('assess', 'Create Assess');
$this->params['breadcrumbs'][] = ['label' => Yii::t('assess', 'Assesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assess-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

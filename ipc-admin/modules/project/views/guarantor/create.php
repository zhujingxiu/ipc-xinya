<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\ProjectGuarantor */

$this->title = Yii::t('app', 'Create Project Guarantor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Guarantors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-guarantor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

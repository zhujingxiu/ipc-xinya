<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\ProjectAttach */

$this->title = Yii::t('app', 'Create Project Attach');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Attaches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-attach-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

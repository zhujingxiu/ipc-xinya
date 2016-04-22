<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\auth\models\Node */

$this->title = Yii::t('auth', 'Create Node');
$this->params['breadcrumbs'][] = ['label' => Yii::t('auth', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

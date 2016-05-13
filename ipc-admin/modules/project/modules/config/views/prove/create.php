<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ipc\modules\project\modules\config\models\Prove */

$this->title = Yii::t('prove', 'Create Prove');
$this->params['breadcrumbs'][] = ['label' => Yii::t('prove', 'Proves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prove-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

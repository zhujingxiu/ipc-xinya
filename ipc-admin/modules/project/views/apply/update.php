<?php

use yii\helpers\Html;
use ipc\modules\project\Module;
/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Project */

$this->title = Module::t('project', 'Project SN') . $model->project_sn . ' - ' . ($model->borrower ? $model->borrower .' - ' .intval($model->amount).'万元' : '' );
$this->params['breadcrumbs'][] = ['label' => Module::t('project', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_sn, 'url' => ['update', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Module::t('project', 'Update');
?>
<div class="project-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

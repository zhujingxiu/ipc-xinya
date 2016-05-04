<?php

use yii\helpers\Html;
use ipc\modules\project\Module;
/* @var $this yii\web\View */
/* @var $model ipc\modules\project\models\Project */

$this->title = Module::t('project', 'Create Project');
$this->params['breadcrumbs'][] = ['label' => Module::t('project', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">


    <?= $this->render('_form', [
        'model' => $model,
        'mode' => 'create',

    ]) ?>

</div>

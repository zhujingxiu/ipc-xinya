<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ipc\modules\project\modules\config\models\ProveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('prove', 'Proves');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prove-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('prove', 'Create Prove'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prove_id',
            'title',
            'code',
            'order',
            'credit',
            // 'remark',
            // 'validity',
            // 'addtime:datetime',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

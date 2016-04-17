<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\auth\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>角色</th>
                    <th>规则</th>
                    <th>参数</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider as $item): ?>
                <tr>
                    <td><input name="selected[]" type="checkbox" value="<?php echo $item->name ?>"> </td>
                    <td><span><?php echo $item->description .' '. $item->name ?></span> </td>
                    <td><span><?php echo $item->ruleName  ?></span> </td>
                    <td><span><?php echo $item->data  ?></span> </td>
                    <td><a class="btn btn-link" href="/auth/role/update?id=<?php echo $item->name ?>"><i class="fa fa-pencil"></i> </a> </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php /*>
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

 <?php */ ?>
</div>

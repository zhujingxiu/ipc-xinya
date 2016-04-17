<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\auth\models\search\PermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-index">

    <p>
        <?= Html::a('Create Permission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>权限</th>
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
                        <td><a class="btn btn-link" href="/auth/permission/update?id=<?php echo $item->name ?>"><i class="fa fa-pencil"></i> </a> </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php /* ?>
    <?= GridView::widget([
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
 <?php */?>
</div>

<?php

use yii\helpers\Html;
use kartik\tree\TreeView;
use system\modules\auth\models\Menu;

use system\modules\auth\Module;
/* @var $this yii\web\View */


$this->title = Module::t('auth', 'Nodes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('auth', 'Create Node'), ['create'], ['class' => 'btn btn-success hidden']) ?>
    </p>
    <?php /* echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'node_id',
            'pid',
            'lft',
            'rgt',
            'lvl',
            // 'name',
            // 'icon',
            // 'icon_type',
            // 'active',
            // 'selected',
            // 'disabled',
            // 'readonly',
            // 'visible',
            // 'collapsed',
            // 'movable_u',
            // 'movable_d',
            // 'movable_l',
            // 'movable_r',
            // 'removable',
            // 'removable_all',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>

    <?php
    echo TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => $model->find()->where(['mode'=>$model->mode])->addOrderBy('parent_id, lft'),
        'nodeAddlViews' => [
            kartik\tree\Module::VIEW_PART_2 => '@system/modules/auth/views/node/_treePart2'
        ],
        'headingOptions' => ['label' => 'Nodes'],
        'fontAwesome' => true,     // optional
        'isAdmin' => false,         // optional (toggle to enable admin mode)
        'displayValue' => $model->getFirstNode(),        // initial display value
        'softDelete' => true,       // defaults to true
        'cacheSettings' => [
            'enableCache' => true   // defaults to true
        ],
        'treeOptions' => [
            'style' => 'height:600px'
        ]
    ]);
    /*
        echo kartik\tree\TreeViewInput::widget([
            // single query fetch to render the tree
            // use the Product model you have in the previous step
            'query' => Node::find()->addOrderBy('pid, lft'),
            'headingOptions'=>['label'=>'Categories'],
            'name' => 'kv-node', // input name
            'value' => '1,2,3',     // values selected (comma separated for multiple select)
            'asDropdown' => false,   // will render the tree input widget as a dropdown.
            'multiple' => true,     // set to false if you do not need multiple selection
            'fontAwesome' => true,  // render font awesome icons
            'rootOptions' => [
                'label'=>'<i class="fa fa-tree"></i>',  // custom root label
                'class'=>'text-success'
            ],
            //'options'=>['disabled' => true],
        ]);*/
    ?>
</div>

<?php

use ipc\modules\project\Module as msgModule;
use kartik\tree\Module as kvModule;
use kartik\tree\TreeView;
use yii\helpers\Url;
use ipc\modules\project\models\Apply;
use ipc\modules\project\modules\config\models\Status;
/* @var $this yii\web\View */
/* @var $searchModel ipc\modules\project\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = msgModule::t('apply', 'Projects');
$this->params['breadcrumbs'][] = $this->title;

$status = [Status::getValue(Status::QUEUING),Status::getValue(Status::REJECTED)] ;
?>
<div class="project-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo TreeView::widget([
        'query' => Apply::find()->where(['status'=>$status])->addOrderBy('level,addtime'),
        'fontAwesome' => true,
        'isAdmin' => false,
        'displayValue' => empty(Yii::$app->session['currentProject']) ? Apply::getFirstNode($status) : Yii::$app->session['currentProject'],
        'cacheSettings' => [
            'enableCache' => false   // defaults to true
        ],
        'nodeView' => '@ipc/modules/project/views/apply/detail',
        'nodeActions' => [
            //Module::NODE_MANAGE => Url::to(['/treemanager/node/manage']),
            kvModule::NODE_SAVE => Url::to(['/project/apply/save']),
            kvModule::NODE_REMOVE => Url::to(['/project/apply/remove']),
            //Module::NODE_MOVE => Url::to(['/treemanager/node/move']),
        ],
        'rootOptions' => [
            'label'=>msgModule::t('apply', 'Projects'),  // custom root label
            'class'=>'text-success'
        ],
        'treeOptions' => [
            'style' => 'height:620px'
        ],

        'toolbar' => [
            TreeView::BTN_CREATE => false,
            TreeView::BTN_CREATE_ROOT => [
                'icon' => 'fa fa-plus',
                'options' => [
                    'title' => Yii::t('app', '添加申请'),
                ]
            ],
            TreeView::BTN_REMOVE => false,
            TreeView::BTN_MOVE_UP => false,
            TreeView::BTN_MOVE_DOWN => false,
            TreeView::BTN_MOVE_LEFT => false,
            TreeView::BTN_MOVE_RIGHT => false,
        ],
        'breadcrumbs'=>[
            'untitled' => msgModule::t('apply','New Apply')
        ]
    ]);?>
<?php
$this->registerCss("
.kv-detail-container{padding:0px;border:none;}
.select2-container .select2-selection--single .select2-selection__rendered{margin-top:0px;}
.kv-child-table-row th,.kv-child-table-row td{border-top: 1px #ddd solid;}
");
?>
</div>

<?php

use ipc\modules\project\Module as msgModule;
use kartik\tree\TreeView;
use ipc\modules\project\modules\config\models\Status;
use ipc\modules\project\models\Check;

/* @var $this yii\web\View */

$this->title = msgModule::t('check', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
.kv-detail-container{padding:0px;border:none;}
.select2-container .select2-selection--single .select2-selection__rendered{margin-top:0px;}
.kv-child-table-row th,.kv-child-table-row td{border-top: 1px #ddd solid;}
.input-group .kv-fileinput-caption{min-width:220px;}
");
$status = Status::getValue(Status::CHECKING);
?>
<div class="approve-index">
    <?php echo TreeView::widget([
        'query' => Check::find()->where(['status'=>$status])->addOrderBy('level desc,addtime desc'),
        'fontAwesome' => true,
        'isAdmin' => false,
        'displayValue' => empty(Yii::$app->session['currentProject']) ? Check::getFirstNode($status) : Yii::$app->session['currentProject'],
        'cacheSettings' => [
            'enableCache' => false   // defaults to true
        ],
        'nodeView' => '@ipc/modules/project/views/approve/detail',
        'rootOptions' => [
            'label'=> $this->title ,  // custom root label
            'class'=>'text-success'
        ],
        'treeOptions' => [
            'style' => 'height:620px',

        ],
        'iconEditSettings' =>[
            'type' => TreeView::ICON_RAW
        ],
        'toolbar' => [
            TreeView::BTN_CREATE => false,
            TreeView::BTN_CREATE_ROOT => false,
            TreeView::BTN_REMOVE => false,
            TreeView::BTN_MOVE_UP => false,
            TreeView::BTN_MOVE_DOWN => false,
            TreeView::BTN_MOVE_LEFT => false,
            TreeView::BTN_MOVE_RIGHT => false,
        ],
        'mainTemplate' => '
            <div class="row">
                <div class="col-sm-9">
                    {detail}
                </div>
                <div class="col-sm-3">
                    {wrapper}
                </div>
            </div>
        '
    ]);

    ?>
</div>
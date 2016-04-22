<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use system\modules\config\models\Config;
use system\modules\config\Module;

$this->title = Module::t('config', 'Setting');
$this->params['breadcrumbs'][] = $this->title;

$items = [];
foreach($configParent as $parent)
{
    $item['label'] = Module::t('config', $parent->code);

    $str = '';
    $children = Config::find()->where(['parent_id' => $parent->config_id])->orderBy(['sort_order' => SORT_ASC, 'config_id' => SORT_ASC])->all();
    foreach($children as $child)
    {
        $str .= '<div class="form-group field-blogcatalog-parent_id"><label class="col-lg-2 control-label" for="blogcatalog-parent_id">' . Module::t('config', $child->code) . '</label><div class="col-lg-3">';

        if($child->type == 'text')
            $str .= Html::textInput("Config[$child->code]", $child->value, ["class" => "form-control"]);
        elseif($child->type == 'password')
            $str .= Html::passwordInput("Config[$child->code]", $child->value, ["class" => "form-control"]);
        elseif($child->type == 'select') {
            $options = [];
            $arrayOptions = explode(',', $child->store_range);
            foreach($arrayOptions as $option)
                $options[$option] = Module::t('config', $option);

            $str .= Html::dropDownList("Config[$child->code]", $child->value, $options, ["class" => "form-control"]);
        }

        $str .= '</div></div>';
    }
    $item['content'] = $str;

    array_push($items, $item);
}

?>

<style>
.tab-pane {padding-top: 20px;}
</style>

<div class="config-form">
    <?php $form = ActiveForm::begin([
        'id' => 'config-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}{hint}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?php
    echo \yii\bootstrap\Tabs::widget([
        'items' => $items,
        'options' => ['tag' => 'div'],
        'itemOptions' => ['tag' => 'div'],
        'headerOptions' => ['class' => 'my-class'],
        'clientOptions' => ['collapsible' => false],
    ]);
    ?>

    <div class="form-group">
        <label class="col-lg-2 control-label" for="">&nbsp;</label>
        <?= Html::submitButton(Module::t('config', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

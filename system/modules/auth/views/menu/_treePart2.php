
<?php
use pendalf89\filemanager\widgets\TinyMCE;
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">权限范围</h3>
        <div class="box-tools pull-right">
            <?php echo \yii\helpers\Html::a('编辑节点','/auth/permission',['class'=>'btn btn-link']) ?>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-8">
            <?php
            echo kartik\tree\TreeViewInput::widget([
                // single query fetch to render the tree
                // use the Product model you have in the previous step
                'query' => system\modules\auth\models\Menu::find()->andWhere(['mode'=>'permission'])->addOrderBy('parent_id, lft'),
                'headingOptions'=>['label'=>'Permissions'],
                'name' => 'Menu[sets]', // input name
                'value' => $node->sets,     // values selected (comma separated for multiple select)
                'asDropdown' => false,   // will render the tree input widget as a dropdown.
                'multiple' => true,     // set to false if you do not need multiple selection
                'fontAwesome' => true,  // render font awesome icons
                'rootOptions' => [
                    'label'=>'<i class="fa fa-tree"></i>',  // custom root label
                    'class'=>'text-success'
                ],
                'options'=>[
                    'id' => uniqid()
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->field($node, 'path')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->field($node, 'rule')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->field($node, 'rule_param')->textInput(['value'=>$node->rule_param ? @unserialize($node->rule_param) : '' ]); ?>
                    <?php echo $form->field($node, 'mode')->hiddenInput()->label(false); ?>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <?php echo $form->field($node, 'remark')->widget(TinyMCE::className(), [
            'clientOptions' => [
                'menubar' => false,
                'language' => 'zh_CN',
                'height' => 100,
                'image_dimensions' => false,
                'plugins' => [
                    'advlist autolink lists charmap preview anchor searchreplace visualblocks contextmenu table',
                ],
                'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
            ],
        ]);?>

    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?php echo $form->field($node, 'rule')->textInput(); ?>
    </div>
    <div class="col-md-8">
        <?php echo $form->field($node, 'rule_param')->textInput(['value'=>@unserialize($node->rule_param)]); ?>
        <?php echo $form->field($node, 'mode')->hiddenInput()->label(false); ?>
    </div>

</div>


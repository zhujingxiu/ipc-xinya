<?php

use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\TinyMCE;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-04-29
 * Time: 09:56
 */
?>

<?php $form = ActiveForm::begin(['id'=>'apply-histoy-form']); ?>

<?php echo $form->field($model, 'text')->widget(TinyMCE::className(), [
    'clientOptions' => [
        'menubar' => false,
        'height' => 300,
        'image_dimensions' => false,
        'plugins' => [
            'advlist autolink lists charmap preview anchor searchreplace visualblocks contextmenu table',
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
    ],
]);?>
<input type="hidden" value="" name="project_id">
<?php ActiveForm::end();?>


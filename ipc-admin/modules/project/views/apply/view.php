<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015
 * @package   yii2-tree-manager
 * @version   1.0.5
 */

use kartik\form\ActiveForm;
use kartik\tree\Module;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use kartik\detail\DetailView;
/**
 * @var View       $this
 * @var Tree       $node
 * @var ActiveForm $form
 * @var string     $keyAttribute
 * @var string     $nameAttribute
 * @var string     $iconAttribute
 * @var string     $iconTypeAttribute
 * @var string     $iconsList
 * @var string     $action
 * @var array      $breadcrumbs
 * @var array      $nodeAddlViews
 * @var mixed      $currUrl
 * @var bool       $showIDAttribute
 * @var bool       $showFormButtons
 */
?>

<?php
/**
 * SECTION 1: Initialize node view params & setup helper methods.
 */
?>
<?php
extract($params);
$isAdmin = ($isAdmin == true || $isAdmin === "true"); // admin mode flag

$flagOptions = ['class' => 'kv-parent-flag'];         // node options for parent/child

// get module and setup form
$module = TreeView::module(); // the treemanager module

$form = ActiveForm::begin([   // the active form instance
    'action' => $action,
    'options' => [
        'id' => 'kv-' . uniqid(),
    ],
]);

// initialize for create or update
$depth = ArrayHelper::getValue($breadcrumbs, 'depth');
$glue = ArrayHelper::getValue($breadcrumbs, 'glue');
$activeCss = ArrayHelper::getValue($breadcrumbs, 'activeCss');
$untitled = ArrayHelper::getValue($breadcrumbs, 'untitled');
$name = $node->isNewRecord ? $untitled :  $node->$nameAttribute;//$node->getBreadcrumbs($depth, $glue, $activeCss, $untitled);

// show alert helper
$showAlert = function ($type, $body = '', $hide = true) {
    $class = "alert alert-{$type}";
    if ($hide) {
        $class .= ' hide';
    }
    return Html::tag('div', '<div>' . $body . '</div>', ['class' => $class]);
};

// render additional view content helper
$renderContent = function ($part) use ($nodeAddlViews, $params, $form) {
    if (empty($nodeAddlViews[$part])) {
        return '';
    }
    $p = $params;
    $p['form'] = $form;
    return $this->render($nodeAddlViews[$part], $p);
};
?>

<?php
/**
 * SECTION 2: Initialize hidden attributes. In case you are extending this
 * and creating your own view, it is mandatory to set all these hidden
 * inputs as defined below.
 */
?>
<?php echo Html::hiddenInput('treeNodeModify', $node->isNewRecord) ?>
<?php echo Html::hiddenInput('parentKey', '') ?>
<?php echo Html::hiddenInput('project_id', $node->project_id) ?>
<?php echo Html::hiddenInput('currUrl', $currUrl) ?>
<?php echo Html::hiddenInput('modelClass', $modelClass) ?>

<?php
/**
 * SECTION 3: Setup form action buttons.
 */
?>


<?php
/**
 * SECTION 4: Setup alert containers. Mandatory to set this up.
 */
?>
<div class="kv-treeview-alerts">
    <?php
    $session = Yii::$app->session;
    if ($session->hasFlash('success')) {
        echo $showAlert('success', $session->getFlash('success'), false);
    } else {
        echo $showAlert('success');
    }
    if ($session->hasFlash('error')) {
        echo $showAlert('danger', $session->getFlash('error'), false);
    } else {
        echo $showAlert('danger');
    }
    echo $showAlert('warning');
    echo $showAlert('info');
    ?>
</div>

<?php
/**
 * SECTION 5: Additional views part 1 - before all form attributes.
 */
?>
<?php echo $renderContent(Module::VIEW_PART_1);?>

<?php
/**
 * SECTION 6: Basic node attributes for editing.
 */
?>



<?php echo $this->render('_form',[
    'model' => $node,
    'mode' => $node->project_id ? 'update' : 'create'
]);
?>

<?php
/**
 * SECTION 7: Additional views part 2 - before admin zone.
 */
?>
<?php echo $renderContent(Module::VIEW_PART_2) ?>

<?php
/**
 * SECTION 8: Administrator attributes zone.
 */
?>
<?php if ($isAdmin): ?>
    <h4><?php echo Yii::t('kvtree', 'Admin Settings') ?></h4>

    <?php
    /**
     * SECTION 9: Additional views part 3 - within admin zone
     * BEFORE mandatory attributes.
     */
    ?>
    <?php echo $renderContent(Module::VIEW_PART_3) ?>

    <?php
    /**
     * SECTION 10: Default mandatory admin controlled attributes.
     */
    ?>
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->field($node, 'active')->checkbox() ?>
            <?php echo $form->field($node, 'selected')->checkbox() ?>
            <?php echo $form->field($node, 'collapsed')->checkbox($flagOptions) ?>
            <?php echo $form->field($node, 'visible')->checkbox() ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($node, 'readonly')->checkbox() ?>
            <?php echo $form->field($node, 'disabled')->checkbox() ?>
            <?php echo $form->field($node, 'removable')->checkbox() ?>
            <?php echo $form->field($node, 'removable_all')->checkbox($flagOptions) ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($node, 'movable_u')->checkbox() ?>
            <?php echo $form->field($node, 'movable_d')->checkbox() ?>
            <?php echo $form->field($node, 'movable_l')->checkbox() ?>
            <?php echo $form->field($node, 'movable_r')->checkbox() ?>
        </div>
    </div>

    <?php
    /**
     * SECTION 11: Additional views part 4 - within admin zone
     * AFTER mandatory attributes.
     */
    ?>
    <?php echo $renderContent(Module::VIEW_PART_4) ?>
<?php endif; ?>
<?php ActiveForm::end() ?>

<?php
/**
 * SECTION 12: Additional views part 5 accessible by all users
 * after admin zone.
 */
?>
<?php echo $renderContent(Module::VIEW_PART_5) ?>

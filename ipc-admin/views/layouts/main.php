<?php
use ipc\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body class="skin-purple">
    <?php $this->beginBody() ?>
    <header class="main-header">
        <a href="<?= Yii::$app->homeUrl ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?= Yii::$app->config->get('siteName') ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only"><?= Yii::t('app', 'Toggle navigation') ?></span>
            </a>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
            </form>

            <div class="navbar-custom-menu">
                <?= $this->render('//layouts/top.php') ?>
            </div>
            <?php
            /*$menuItemsMain = [
                ['label' => 'Catalog', 'url' => ['/catalog']],
                ['label' => 'Show', 'url' => ['/show']],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItemsMain,
                'encodeLabels' => false,
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);*/
            ?>

        </nav>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>
                        <?= Yii::t('app', 'Hello, {name}', ['name' => Yii::$app->user->identity->realname]) ?>
                    </p>
                    <a>
                        <i class="fa fa-circle text-success"></i> <?= Yii::t('app', 'Online') ?>
                    </a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?= $this->render('//layouts/sidebar') ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $this->title ?>
                <?php if (isset($this->params['subtitle'])) : ?>
                    <small><?= $this->params['subtitle'] ?></small>
                <?php endif; ?>
            </h1>
            <?= Breadcrumbs::widget(
                [
                    'homeLink' => [
                        'label' => '<i class="fa fa-dashboard"></i> ' . Yii::t('app', 'Home'),
                        'url' => ['/']
                    ],
                    'encodeLabels' => false,
                    'tag' => 'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                ]
            ) ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section><!-- /.content -->


    </div>

    <?= $this->render('//layouts/footer') ?>

    <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

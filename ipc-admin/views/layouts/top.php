<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/*NavBar::begin([
    'brandLabel' => 'My Company',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);*/
$menuItems = [

    [
        'label' => '',
        'url' => ['/'],
        'linkOptions' => [
            'class' => 'fa fa-dashboard',
            'title' => Yii::t('app','Home')
        ],
        'active' => Yii::$app->request->url === Yii::$app->homeUrl
    ],
    [
        'label' => '',
        'url' => ['/config'],
        'linkOptions' => [
            'class' => 'fa fa-gears',
            'title' => Yii::t('app','Settings')
        ],
        'visible' => Yii::$app->user->identity->isAllowed('config'),
        'active' => Yii::$app->request->pathInfo === 'config',
    ],
    [
        'label' => '',
        'url' => '#',
        'linkOptions' => [
            'data-toggle' => 'control-sidebar',
            'class' => 'fa fa-bell'
        ]
    ],


];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);

$menuItemsMain = [
    [
        'label' => '',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'fa fa-sign-out',
            'title'=>Yii::t('app', 'Logout') . '(' . Yii::$app->user->identity->realname . ')',

        ]
    ],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right','style' => 'margin-right:0px;'],
    'items' => $menuItemsMain,
    'encodeLabels' => false,
]);

//NavBar::end();


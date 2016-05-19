<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>
<ul class="navbar-nav navbar-left nav">
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning notifications-icon-count">0</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">您有<span class="notifications-header-count">0</span>个消息</li>
            <li>
                <div id="notifications"></div>
            </li>
        </ul>
    </li>
</ul>
<?php


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


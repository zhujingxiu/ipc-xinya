<?php
use common\widgets\Menu;
/*
$menuNodes = [
    [
        'label' => Yii::t('app','Customer'),
        'url' => ['/customer'],
        'icon' => 'fa-child',
        'visible' => Yii::$app->user->can('customer'),
    ],

    [
        'label' => Yii::t('app', 'Project'),
        'url' => ['#'],
        'icon' => 'fa-cubes',
        'options' => [
            'class' => 'treeview',
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Apply'),
                'url' => ['/project/apply/'],
                'icon' => 'fa-envelope ',
                'active' => Yii::$app->request->pathInfo === 'project/apply',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Confirm'),
                'url' => ['/project/confirm/'],
                'icon' => 'fa-tags',
                'active' => Yii::$app->request->pathInfo === 'project/confirm',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Check'),
                'url' => ['/project/check/'],
                'icon' => 'fa-binoculars',
                'active' => Yii::$app->request->pathInfo === 'project/check',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Approve'),
                'url' => ['/project/approve/'],
                'icon' => 'fa-gavel',
                'active' => Yii::$app->request->pathInfo === 'project/approve',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Sign'),
                'url' => ['/project/sign/'],
                'icon' => 'fa-book',
                'active' => Yii::$app->request->pathInfo === 'project/sign',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Borrowing'),
                'url' => ['/project/borrowing/'],
                'icon' => 'fa-exchange',
                'active' => Yii::$app->request->pathInfo === 'project/borrowing',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Manage'),
                'url' => ['/project/manage/'],
                'icon' => 'fa-recycle',
                'active' => Yii::$app->request->pathInfo === 'project/manage',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
        ]
    ],
    [
        'label' => Yii::t('app', 'Config'),
        'url' => ['#'],
        'icon' => 'fa-puzzle-piece',
        'options' => [
            'class' => 'treeview',
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Repayment'),
                'url' => ['/project-config/repayment/'],
                'icon' => 'fa-money',
                'active' => Yii::$app->request->pathInfo === 'project-config/repayment',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Tender'),
                'url' => ['/project-config/tender/'],
                'icon' => 'fa-flask',
                'active' => Yii::$app->request->pathInfo === 'project-config/tender',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Project Status'),
                'url' => ['/project-config/status/'],
                'icon' => 'fa-road',
                'active' => Yii::$app->request->pathInfo === 'project-config/status',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
        ]
    ],




    [

        'label' => Yii::t('app', 'Users Roles'),
        'url' => ['#'],
        'icon' => 'fa-sitemap',
        'options' => [
            'class' => 'treeview',
        ],

        'items' => [
            [
                'label' => Yii::t('app', 'User'),
                'url' => ['/user'],
                'icon' => 'fa-user ',
                'visible' => Yii::$app->user->can('setting'),
                'active' => Yii::$app->request->pathInfo === 'user',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Role'),
                'url' => ['/auth/role'],
                'icon' => 'fa-users',
                'active' => Yii::$app->request->pathInfo === 'auth/role',
            ],
            [
                'label' => Yii::t('app', 'Permission'),
                'url' => ['/auth/permission'],
                'icon' => 'fa-key',
                'active' => Yii::$app->request->pathInfo === 'auth/permission',
            ],
        ],
    ],

];
*/
$nodes = Yii::$app->user->identity->renderTree();
//echo '<pre>';
//print_r($nodes);
//echo '</pre>';
echo Menu::widget(
    [
        'options' => [
            'class' => 'sidebar-menu'
        ],
        'items' => $nodes
    ]
);
$js = <<<JS
$.each($('.main-sidebar .treeview'),function() {
    if($(this).children('ul.treeview-menu').length == 0){
        $(this).remove();
    }
})
JS;
$this->registerJs($js);
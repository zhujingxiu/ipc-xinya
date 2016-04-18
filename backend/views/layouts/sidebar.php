<?php
use common\widgets\Menu;

echo Menu::widget(
    [
        'options' => [
            'class' => 'sidebar-menu'
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Dashboard'),
                'url' => Yii::$app->homeUrl,
                'icon' => 'fa-dashboard',
                'active' => Yii::$app->request->url === Yii::$app->homeUrl
            ],

            [
                'label' => Yii::t('app', 'System'),
                'url' => ['#'],
                'icon' => 'fa fa-cog',
                'options' => [
                    'class' => 'treeview',
                ],
                'items' => [
                    [
                        'label' => Yii::t('app', 'Settings'),
                        'url' => ['/setting'],
                        'icon' => 'fa fa-wrench',
                        'visible' => Yii::$app->user->can('setting'),
                    ],
                    
                    [

                        'label' => Yii::t('app', 'Users Roles'),
                        'url' => ['#'],
                        'icon' => 'fa fa-sitemap',
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'items' => [
                            [
                                'label' => Yii::t('app', 'User'),
                                'url' => ['/user/index'],
                                'icon' => 'fa fa-user',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Role'),
                                'url' => ['/auth/role/index'],
                                'icon' => 'fa fa-users',
                            ],
                            [
                                'label' => Yii::t('app', 'Permission'),
                                'url' => ['/auth/permission/index'],
                                'icon' => 'fa fa-key',
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ]
);
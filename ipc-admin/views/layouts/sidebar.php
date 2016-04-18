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
                'label' => Yii::t('app','Customer'),
                'url' => ['/customer'],
                'icon' => 'fa-child'
            ],
            [
                'label' => Yii::t('app', 'Service'),
                'url' => ['#'],
                'icon' => 'fa fa-cubes',
                'options' => [
                    'class' => 'treeview',
                ],
                'items' => [
                    [
                        'label' => Yii::t('app', 'Project'),
                        'url' => ['#'],
                        'icon' => 'fa fa-database',
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'items' => [
                            [
                                'label' => Yii::t('app', 'Apply'),
                                'url' => ['/project/apply/'],
                                'icon' => 'fa fa-envelope',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Accept'),
                                'url' => ['/project/accept/'],
                                'icon' => 'fa-tags',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Check'),
                                'url' => ['/project/check/'],
                                'icon' => 'fa-check-square',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Approve'),
                                'url' => ['/project/approve/'],
                                'icon' => 'fa-gavel',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Sign'),
                                'url' => ['/project/sign/'],
                                'icon' => 'fa-book',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Borrowing'),
                                'url' => ['/project/borrowing/'],
                                'icon' => 'fa-exchange',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Manage'),
                                'url' => ['/project/manage/'],
                                'icon' => 'fa-recycle',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                        ]
                    ],
                    [
                        'label' => Yii::t('app', 'Config'),
                        'url' => ['#'],
                        'icon' => 'fa fa-puzzle-piece',
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'items' => [
                            [
                                'label' => Yii::t('app', 'Repayment'),
                                'url' => ['/project-config/repayment/'],
                                'icon' => 'fa fa-money',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Tender'),
                                'url' => ['/project-config/tender/'],
                                'icon' => 'fa fa-flask',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                            [
                                'label' => Yii::t('app', 'Status'),
                                'url' => ['/project-config/status/'],
                                'icon' => 'fa-road',
                                //'visible' => (Yii::$app->user->identity->username == 'admin'),
                            ],
                        ]
                    ],
                ]
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
                                'active' => Yii::$app->request->url === Yii::$app->homeUrl
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
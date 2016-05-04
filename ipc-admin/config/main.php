<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-ipc',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'ipc\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'config' => [
            'class' => 'system\modules\config\Module',
        ],
        'auth' => [
            'class' => 'system\modules\auth\Module',
        ],
        'project' => [
            'class' => 'ipc\modules\project\Module',
        ],
        'project-config' => [
            'class' => 'ipc\modules\project\modules\config\Module',
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            'routes' => [
                'baseUrl' => '',
                'basePath' => '@ipc/web',
                'uploadPath' => 'uploads',
            ],
            'thumbs' => [
                'small' => [
                    'name' => 'small',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 'medium',
                    'size' => [300, 200],
                ],
                'large' => [
                    'name' => 'large',
                    'size' => [500, 400],
                ],
            ],
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // other module settings, refer detailed documentation
            'treeStructure' => [
                'treeAttribute' => 'parent_id',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'depthAttribute' => 'lvl',
            ],
            'dataStructure' => [
                'keyAttribute' => 'node_id',
                'nameAttribute' => 'name',
                'iconAttribute' => 'icon',
                'iconTypeAttribute' => 'icon_type'
            ]
        ],
        'notifications' => [
            'class' => 'machour\yii2\notifications\NotificationsModule',

            'notificationClass' => 'ipc\models\Notification',
            // This callable should return your logged in user Id
            'userId' => function() {
                return \Yii::$app->user->id;
            }
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'controllerMap' =>[
        'site' => [
            'class' => 'system\controllers\SiteController'
        ],
        'user' => [
            'class' => 'system\controllers\UserController'
        ]
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=gonge_ipc',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'ipc_',
        ],

        'user' => [
            'identityClass' => 'system\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'config' => [
            'class' => 'system\modules\config\Config',
        ],

    ],
    'params' => $params,
];

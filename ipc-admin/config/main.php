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
    'bootstrap' => ['log','ipc\modules\setting\bootstrap'],
    'modules' => [
        'setting' => [
            'class' => 'ipc\modules\setting\Module',
        ],
        'auth' => [
            'class' => 'ipc\modules\auth\Module',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'user' => [
            'identityClass' => 'ipc\models\User',
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
        'setting' => [
            'class' => 'ipc\modules\setting\Setting',
        ],
        
    ],
    'params' => $params,
];

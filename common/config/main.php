<?php
return [
	'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    // 'basePath' => '@app/messages',
                    // 'sourceLanguage' => 'zh-CN',
                    'fileMap' => [
                        'app' => 'app.php',
                        'auth' => 'auth.php',
                        'app/error' => 'error.php',
                    ],
                ],
                
            ],
        ],
        'formatter' => [
	        'dateFormat' => 'yyyy-MM-dd',
	        'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
	        'decimalSeparator' => ',',
	        'thousandSeparator' => ' ',
	        'currencyCode' => 'CNY',
	    ],
    ],

];

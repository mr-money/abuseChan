<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'eNx4eXbrRjsWyQoTwDOLWsTaLkW_Twg4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => ['*'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['wechat'],
                    'levels' => ['error', 'warning','info'],
                    'logVars' => ['*'],
                    'logFile' => '@runtime/logs/wechat/'.date('Ymd').'.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['wxuser'],
                    'levels' => ['error', 'warning','info'],
                    'logVars' => ['*'],
                    'logFile' => '@runtime/logs/wxuser/'.date('Ymd').'.log',
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager' => [
            'enablePrettyUrl' => true,  //美化url==ture
            'enableStrictParsing' => false,  //不启用严格解析
            'showScriptName' => false,   //隐藏index.php

// 			'suffix' => ".html",
// 				'rules' => [ '' => 'site/index', // 如果没有这里，则访问域名不能直接打开默认Action
// 			],

            'rules' => array(
                '<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                'Admin' => 'Admin/admin/index',
            )
        ],


        /**
         * yii2-easy-wechat
         * https://github.com/jianyan74/yii2-easy-wechat
         */
        'wechat' => [
            'class' => 'jianyan\easywechat\Wechat',
            'userOptions' => [],  // 用户身份类参数
            'sessionParam' => 'wechatUser', // 微信用户信息将存储在会话在这个密钥
            'returnUrlParam' => '_wechatReturnUrl', // returnUrl 存储在会话中
        ],
    ],

    //自建模块
    'modules' => [
        'Home' => [
            'class' => 'app\module\Home\wechat',
        ],
        'Admin' => [
            'class' => 'app\module\Admin\index',
        ],
    ],

    'params' => $params,
];

if (YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

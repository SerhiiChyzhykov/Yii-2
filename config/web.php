<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0123456789',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
           'gii' => 'index.php/gii',
           'about'=>'site/about',
           'photo/add'=>'photos/create',
           'photo/update'=>'photos/update',
           'user/login'=>'user/security/login',
           'user/logout'=>'user/security/logout',
           'home'=>'site/index',
           'user/register'=>'user/registration/register',
           'user/resend'=>'user/registration/resend',
           'user/confirm'=>'user/registration/confirm',
           'user/request'=>'user/recovery/request',
           'user/reset'=>'user/recovery/reset',
           'user/profile'=>'user/settings/profile',
           'user/account'=>'user/settings/account',
           'user/networks'=>'user/settings/networks',
           'user/request'=>'user/recovery/request',
           'user/request'=>'user/recovery/request',
            ],
        ],
  
    ],
    'modules' => [
    'user' => [
        'class' => 'dektrium\user\Module',
    ],
],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

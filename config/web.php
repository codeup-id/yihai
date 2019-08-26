<?php
$config = [
    'id' => 'yihai',
    'name' => 'AppName',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'yihai\controllers',
    'aliases' => [
        '@yihai' => dirname(__DIR__),
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '{cookieValidationKey}',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'theme' => [
            'list' => [
                [
                    'class' => 'yihai\core\themes\defyihai\Theme',
                    'skin' => 'skin-red-light'

                ]
            ]
        ],
        'user' => [
            'class' => 'yihai\core\web\User',
        ],
    ],
];

if (YII_ENV_DEV) {
    if(class_exists('\yii\debug\Module')) {
        // configuration adjustments for 'dev' environment
        $config['bootstrap'][] = 'debug';
        $config['modules']['debug'] = [
            'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            'allowedIPs' => ['127.0.0.1', '::1', '[::1]'],
        ];
    }

    if(class_exists('\yii\gii\Module')) {
        $config['bootstrap'][] = 'gii';
        $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            'allowedIPs' => ['127.0.0.1', '::1', '[::1]'],
        ];
    }
}
return \yii\helpers\ArrayHelper::merge(require __DIR__ . '/common.php', $config);

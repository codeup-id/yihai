<?php
$config = require __DIR__ . '/bootstrap.php';
$config = [
    'id' => 'yihai',
    'name' => 'Sistem Informasi Managemen Perjalanan Dinas',
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
            'cookieValidationKey' => 'xr-gLUar6dj12i4q77wLcDbpPeqk--nB',
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
    'controllerMap' => [
        'system/filemanager' => [
            'class' => 'yihai\core\extension\elfinder\Controller',
            'access' => ['@'],
            'connectOptions' => [
                'uploadDeny' => ['all'],
            ],
            'roots' => [
                [
                    'baseUrl' => '@web/cfiles/show',
                    'basePath' => '@yihai/storages',
                    'path' => 'public',
                    'name' => 'Public Files',
                    'tmbPath' => 'assets/thumbnails',
                    'options' => [
                        'uploadDeny' => ['text/x-php'],
                    ]
                ],
                [
                    'baseUrl' => '@web/cfiles/show/photos',
                    'basePath' => '@yihai/storages',
                    'path' => '',
                    'name' => 'Photos',
                    'access' => ['write' => false, 'read' => true],
                    'tmbPath' => 'assets/thumbnails',
                ],
            ]
//            'watermark' => [
//                'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                'marginRight'    => 5,          // Margin right pixel
//                'marginBottom'   => 5,          // Margin bottom pixel
//                'quality'        => 95,         // JPEG image save quality
//                'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                'targetMinPixel' => 200         // Target image minimum pixel size
//            ]
        ]
    ]
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

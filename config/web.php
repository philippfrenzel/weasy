<?php
return [
    'app' => [
        'controllerNamespace' => yii\app\controllers::class,
        'aliases' => [
            '@webroot' => __DIR__ . '/../public',
            //'@doc' => __DIR__ . '/../docs',
        ],
    ],
    'user' => [
        // '__class' => app\models\User::class,
        'identityClass' => yii\app\models\User::class, // User must implement the IdentityInterface
        'enableAutoLogin' => true
    ],
    'request' => [
        'enableCookieValidation' => true,
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => '',
        'parsers' => [
            'application/json' => 'yii\web\JsonParser',
        ]
    ],
    'assetManager' => [
        'appendTimestamp' => true,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            '<controller:(about|login)>' => 'site/index',
            '<controller:(\w|-)+>/' => '<controller>/index',
            '<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<controller>/<action>',
            '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
            '<controller:\w+>/<action:(\w|-)+>' => '<controller>/<action>'
        ],
    ],
];
<?php
return [
    'bootstrap' => [
        'gii'
    ],
    'app' => [
        'controllerNamespace' => app\controllers::class,
        'aliases' => [
            '@webroot' => __DIR__ . '/../public',
            '@npm' => __DIR__ . '/../node_modules',
            //'@doc' => __DIR__ . '/../docs',
        ],
    ],
    'session' => [
        '__class' => yii\web\Session::class,
    ],
    'user' => [
        //'__class' => app\models\User::class,
        'identityClass' => app\models\User::class, // User must implement the IdentityInterface
        'enableAutoLogin' => false
    ],
    'response' => [
        '__class' => yii\web\Response::class,
        'formatters' => [
            yii\web\Response::FORMAT_HTML => [
                '__class' => yii\web\formatters\HtmlResponseFormatter::class,
            ],
            yii\web\Response::FORMAT_XML => [
                '__class' => yii\web\formatters\XmlResponseFormatter::class,
            ],
            yii\web\Response::FORMAT_JSON => [
                '__class' => yii\web\formatters\JsonResponseFormatter::class,
            ],
            yii\web\Response::FORMAT_JSONP => [
                '__class' => yii\web\formatters\JsonResponseFormatter::class,
                'useJsonp' => true,
            ],
        ],
    ],
    'assetManager' => [
        'appendTimestamp' => true,
        'linkAssets' => true,
        'bundles' => [
        \Yiisoft\Yii\Bootstrap4\BootstrapAsset::class => [
                'css' => [],
            ]
        ]
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            '<controller:(about|login)>' => 'site/index',
            '<controller:(\w|-)+>/' => '<controller>/index',
            '<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<controller>/<action>',
            '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
            '<controller:\w+>/<action:(\w|-)+>' => '<controller>/<action>',
            'site/packages/<package:[-\w]+>' => 'site/package'
        ],
    ],
    'modules' => [
        'gii' => [
            '__class' => yii\gii\Module::class,
        ],
    ],
];
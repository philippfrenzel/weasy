<?php
return [
    'app' => [
        'basePath' => dirname(__DIR__) . '/src',
        'aliases' => [
            '@app' => dirname(__DIR__),
            '@github' => dirname(__DIR__) . '/runtime/github',
            '@runtime' => dirname(__DIR__) . '/runtime',
            '@vendor' => dirname(__DIR__) . '/vendor',
        ]
    ],
    'file-target' => [
        '__class' => \Yii\Log\FileTarget::class,
        'logFile' => '/tmp/foo.log',
    ],
    'logger' => [
        '__class' => \Yii\Log\Logger::class,
        '__construct()' => function() {
            return [
                [
                    'file' => new \Yii\Log\FileTarget("/tmp/log.txt"),
                ]
            ];
        }
    ],
    'cache' => [
        '__class' => yii\cache\Cache::class,
        'handler' => [
            '__class' => yii\cache\FileCache::class,
            'keyPrefix' => 'my-project',
        ],
    ],
    'mailer' => [
        '__class' => yii\swiftmailer\Mailer::class,
    ],
    'db' => array_filter([
        '__class' => yii\db\Connection::class,
        'dsn'       => 'sqlite:dbname=' . $params['db.name']
            . (!empty($params['db.host']) ? (';host=' . $params['db.host']) : '')
            . (!empty($params['db.port']) ? (';port=' . $params['db.port']) : ''),
        'username'  => $params['db.user'],
        'password'  => $params['db.password'],
        'enableSchemaCache' => false
        //'enableSchemaCache' => defined('YII_ENV') && YII_ENV !== 'dev',
    ]),
    'translator' => [
        'translations' => [
            'yii-base-web' => [
                '__class' => yii\i18n\PhpMessageSource::class,
                'sourceLanguage' => 'en-US',
                'basePath' => '@yii/app/messages',
            ],
        ],
    ],
];
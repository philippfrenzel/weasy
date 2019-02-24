<?php

return [
    'app' => [
        'controllerNamespace' => yii\app\commands::class,
        'aliases' => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
            '@tests' => '@app/tests',
        ],
        'controllerMap' => [
            'migrate' => [
                '__class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                    'app\migrations',
                    //'some\extension\migrations',
                ],
                //'migrationPath' => null, // allows to disable not namespaced migration completely
            ],
        ],
    ],
];

/*
$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic-console',
    'controllerNamespace' => yii\app\commands::class,
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'params' => $params
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
*/
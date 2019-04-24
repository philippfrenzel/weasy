<?php

$params = require __DIR__ . '/params.php';

return [
    'controllerNamespace' => app\commands::class,
    'bootstrap' => [
        'gii'
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'params' => $params,
    'controllerMap' => [
        'asset' => [
            '__class' => \yii\console\controllers\AssetController::class,
        ],
        'cache' => [
            '__class' => \yii\console\controllers\CacheController::class,
        ],
        'fixture' => [
            '__class' => \yii\console\controllers\FixtureController::class,
        ],
        'help' => [
            '__class' => \yii\console\controllers\HelpController::class,
        ],
        'message' => [
            '__class' => \yii\console\controllers\MessageController::class,
        ],
        'migrate' => [
            '__class' => \yii\console\controllers\MigrateController::class,
        ],
        'serve' => [
            '__class' => \yii\console\controllers\ServeController::class,
        ],
    ],
    'modules' => [
        'gii' => [
            '__class' => yii\gii\Module::class,
        ],
    ],
];

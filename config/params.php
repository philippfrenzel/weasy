<?php
return [
    'app.id' => 'my-project',
    'app.name' => 'Weasy',
    'adminEmail' => 'admin@frenzel.net',
    'db.dsn'        => "mysql:host=localhost;dbname=myproject;charset=utf8",
    'db.username'   => 'root',
    'db.password'   => '',
    'favicon.ico' => '@yii/app/../web/favicon.ico',
    'i18n.locale' => 'en-US',
    'debug.allowedIPs' => ['127.0.0.1'],
    'packages' => require 'packages.php',
];
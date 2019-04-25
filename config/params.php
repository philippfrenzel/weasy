<?php
return [
    'app.id' => 'my-project',
    'app.name' => 'Weasy',
    
    'adminEmail' => 'admin@frenzel.net',
    
    'debug.allowedIPs' => ['*'],

    'db.name'       => 'weasy',
    'db.host'       => '127.0.0.1',
    'db.port'       => 3306,
    'db.username'   => 'root',
    'db.password'   => 'secret',
    
    'favicon.ico' => '@yii/app/../web/favicon.ico',
    
    'i18n.locale' => 'en-US',
    
    'packages' => require 'packages.php',

    'request.cookieValidationKey' => 'kZcZPIa22dtb5k00JfBhtOm9svGfihig'
];
<?php

use yii\db\Connection;

return [
    'class'               => Connection::class,
    'dsn'                 => 'mysql:host=mysql;dbname=yii2port',
    'username'            => 'port',
    'password'            => 'secret',
    'charset'             => 'utf8mb4',
    'enableSchemaCache'   => YII_DEBUG === false,
    'schemaCacheDuration' => 60,
    'schemaCache'         => 'cache',
];

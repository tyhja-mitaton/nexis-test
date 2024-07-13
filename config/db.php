<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=nexis_db_mysql;dbname=nexis_db',
    'username' => 'nexis_db',
    'password' => 'root',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

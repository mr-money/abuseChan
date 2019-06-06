<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=abusechan',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'tablePrefix' => 'abuse_',   //加入前缀名称

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//定义图片上传公共路径
define('UPLOAD_DIR', $_SERVER['HTTP_HOST']."/upload");

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

$application = new yii\web\Application($config);
$application->defaultRoute = 'index'; //默认进入路由
$application->layout = false; //不使用默认布局
$application->run();
//(new yii\web\Application($config))->run();

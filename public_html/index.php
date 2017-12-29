<?php
// composer autoload include
require(__DIR__ . '/../vendor/autoload.php');
//date_default_timezone_set("Asia/Shanghai");
// use the luya boot wrapping class
$boot = new \luya\Boot();
$boot->setBaseYiiFile(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
$boot->run();

<?php
/**
 * @desc 框架入口文件
 * 1.定义常量
 * 2.加载函数库
 * 2.启动框架
 * **/
define('APP_PATH', dirname(__FILE__));//网站根目录
define('CORE',APP_PATH.'/core');
define('APP',APP_PATH.'/app');
define('MODULE','app');
define('CONF',APP_PATH.'/conf');
//引用公共方法文件
require CORE.'/common/function.php';
require CORE.'/app.php';
//加入自动加载方法
spl_autoload_register('\core\app::autoLoad');
//启动框架
\core\app::start();

?>

<?php
/***
 *入口文件执行文件运行整个框架
 **/
define('APP_PATH',dirname($_SERVER['SCRIPT_FILENAME']).'/');  //系统运行目录
define('PROJECT_PATH',APP_PATH."app/");
define('CONTROLLER_PATH',PROJECT_PATH."Controllers/");  //项目控制器目录
define('MODEL_PATH',PROJECT_PATH."Models/");    //项目模型model目录
define('VIEW_PATH',PROJECT_PATH."Views/"); //项目视图view目录
define('WDF_PATH',__DIR__.'/'); //文件当前目录
define('LIB_PATH',WDF_PATH.'lib/'); //wdf底层lib目录
const EXT = '.class.php';
require LIB_PATH.'Wdf'.EXT;
//开始执行框架
wdf\Wdf::run();

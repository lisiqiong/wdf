<?php
//加载核心类文件
include "./wdf/core/Loader.php";
use wdf\core\Loader;
//定义斜线常量，兼容windows和linux环境
define("DS",DIRECTORY_SEPARATOR);
//定义根目录
define("ROOT_PATH",__DIR__);
//定义框架目录
define("WDF_PATH",ROOT_PATH.DS.'wdf'.DS);
//定义核心目录
define("CORE_PATH",ROOT_PATH.DS.'wdf'.DS."core".DS);
//定义应用app目录
define("APP_PATH",ROOT_PATH.DS.'app'.DS);

Loader::unshiftObj("Request");
Loader::pushObj("Router");
Loader::pushObj("Permit");
Loader::pushObj("Cache");
Loader::pushObj("Action");
Loader::pushObj("Response");
Loader::pushObj("Log");
while (Loader::listen()){
    Loader::doObj();
}

?>

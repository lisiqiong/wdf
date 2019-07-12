<?php
//加载核心类文件
include ROOT_PATH.DS."wdf".DS."core".DS."Loader.php";
use wdf\core\Loader;
//定义框架目录
define("WDF_PATH",ROOT_PATH.DS.'wdf'.DS);
//定义核心目录
define("CORE_PATH",ROOT_PATH.DS.'wdf'.DS."core".DS);
//定义应用app目录
define("APP_PATH",ROOT_PATH.DS.'app'.DS);

//加载数据请求类
Loader::unshiftObj("Request","init",[],Loader::_STATIC);
//加载路由类
Loader::pushObj("Router","init",[],Loader::_SIGNLE);
//加载权限处理
Loader::pushObj("Permit");
//加载缓存处理
Loader::pushObj("Cache");
//加载控制器
Loader::pushObj("Controller");
//加载响应处理
Loader::pushObj("Response");
//加载写入日志处理
Loader::pushObj("Log");
while (Loader::listen()){
    Loader::doObj();
}

?>

<?php
/**
 * @desc 核心的控制器处理类
 */
namespace wdf\core;
class Controller{

    /**
     * @desc 启动控制器
     */
    public function init(){
        $module = Router::getModule();
        $controller = Router::getController();
        $action = Router::getAction();
        $controller = ucfirst($controller).'Controller';
        include APP_PATH.$module.DS.'controller'.DS.$controller.'.php';
        $class = 'app\\'.$module.'\\'.$controller;
        $c = new $class();
        $c->$action();
    }

}
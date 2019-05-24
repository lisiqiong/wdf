<?php
/**
 * @desc 核心路由类
 * Class Router
 */
namespace wdf\core;
class Router{
    //存储router类的实例
    private static $_router;
    //app应用名
    private $module;
    //模块名
    private $controller;
    //方法名
    private $action;

    /**
     * @desc 私有化防止外部new实例化
     * Router constructor.
     */
    private function __construct()
    {

    }

    /**
     * @desc 私有化克隆方法防止外部克隆
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @desc 唯一入口实例化router路由类
     * @return Router
     */
    public static function getInstance(){
        if(!(self::$_router instanceof Router)){
            self::$_router = new Router();
        }
        self::$_router->setRouter();
        return self::$_router;
    }

    /**
     * @desc 启用router
     */
    public function init(){
        //获取路由信息
        $this->setRouter();
    }

    /**
     * @desc 获取应用名
     * @return mixed
     */
    public static function getModule(){
        return self::$_router->module;
    }

    /**
     * @desc 获取控制器名称
     * @return mixed
     */
    public static function getController(){
        return self::$_router->controller;
    }

    /**
     * @desc 获取方法名称
     * @return mixed
     */
    public static function getAction(){
        return self::$_router->action;
    }


    /**
     * @desc 设置路由
     */
    private  function setRouter(){
        $this->module = $_GET['module'];
        $this->controller = $_GET['controller'];
        $this->action = $_GET['action'];
    }


}

<?php
/**
 * @desc 用户核心信息请求类
 * Class Request
 */
namespace wdf\core;
class Request{
    private static $request;
    private  $host;
    private  $method;
    private  $file;
    //私有
    private function __construct(){}

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance(){
        if(!self::$request instanceof Request){
            self::$request = new self();
        }
        return self::$request;
    }

    /**
     * @dsesc 入口
     */
    public function init(){
        $this->host = $_SERVER['HTTP_HOST'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->file = $_SERVER['SCRIPT_NAME'];
        //print_r($_SERVER);
        //echo strpos($_SERVER['REQUEST_URI'],'.php');
    }

    /**
     * @desc 获取文件名
     * @return mixed
     */
    public function getFile(){
        return $this->file;
    }

}
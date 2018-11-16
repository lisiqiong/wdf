<?php
/**
 * @desc 框架路由类
 * **/
namespace core\libs;
use core\libs\config;

class router{
	public $controller;//控制器类
	public $action;//控制器方法
	
	/**
	 * @desc 思路
	 * 1.隐藏index.php
	 * 2.获取url参数部分
	 * 3.返回对应的控制器和方法
	 * **/
	public function __construct(){
		//获取路由的默认配置项信息
		$routerConfig = config::get('router');
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/' ){
			$routers = ltrim($_SERVER['REQUEST_URI'],'/');
			$routerArr = explode('/', $routers);			
			if(isset($routerArr[0])){
				$this->controller = $routerArr[0];
				unset($routerArr[0]);
			}
			if(isset($routerArr[1])){
				$this->action = $routerArr[1];
				unset($routerArr[1]);
			}else{
				$this->action = $routerConfig['default_action'];
			}
			$count = count($routerArr)+2;
			$i = 2;
			while($i < $count){
				if(isset($routerArr[$i + 1]) && !empty($routerArr[$i + 1])){
					$_GET[$routerArr[$i]] = $routerArr[$i+1];					
				}
				$i = $i + 2;
			}
		}else{
			//如果域名没有参数默认为进入index控制器的index方法
			$this->controller = $routerConfig['default_contr'];
			$this->action = $routerConfig['default_action'];
		}		
	}
	
	
}
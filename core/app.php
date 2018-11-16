<?php
/**
 * @desc 应用启动初始化操作类
 * ***/
namespace core;
class app{
	public static $classMap = [];	
	
	/**
	 * @desc 启动应用
	 * **/
	static public  function start(){
		//加载日志类
		\core\libs\log::init();
				
		//启动路由类
		$router = new \core\libs\router();		
		$contrClass = ucfirst($router->controller).'Controller';
		$actionName = $router->action;
		$controllerFile = APP.'/Controller/'.$contrClass.'.php';
		if(is_file($controllerFile)){
			include $controllerFile;
			$contrClass = MODULE."\Controller\\".$contrClass;
			$controller = new $contrClass();
			\core\libs\log::log('controller:'.$router->controller.'   '.'action:'.$actionName);
			$controller->$actionName();
		}else{
			throw new \Exception('not found controller '.$contrClass);
		}
	}
	
	/**
	 * @desc 自动加载类库
	 * **/
	static public function autoLoad($class){
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = APP_PATH.'/'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}			
		}
	}
		
}

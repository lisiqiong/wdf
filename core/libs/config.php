<?php
namespace core\libs;
class config{
	
	static public $conf = array();
	
	/**
	 * @desc 获取某个配置文件的单个配置项,默认获取config文件的
	 * **/
	static public function get($name,$file='config'){
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$file = CONF.'/'.ENVIRONMENT.'/'.$file.'.php';
			if(is_file($file)){
				$conf = include $file;
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception('没有这个配置'.$name);
				}
			}else{
				throw new \Exception('没有这个配置'.$name);
			}
		}
	}
	
	/**
	 * @desc 获取指定配置文件的所有配置信息
	 * **/
	static public function all($file='config'){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$file = CONF.'/'.ENVIRONMENT.'/'.$file.'.php';
			if(is_file($file)){
				$conf = include $file;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception('没有这个配置文件'.$file);
			}
		}
		
	}
	
}
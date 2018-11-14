<?php
namespace core\libs;
class config{
	
	static public $conf = array();
	
	/**
	 * @desc 获取config配置内容
	 * **/
	static public function get($name,$file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$file = CONF.'/'.$file.'.php';
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
	
	
	
}
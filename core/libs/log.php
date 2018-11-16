<?php
/**
 * @desc 日志管理类
 * **/
namespace core\libs;
use core\libs\config;
class log{
	static $class;
	
	/**
	 * 1.确定日志存储方式
	 * 2.写日志
	 * **/
	static public function init(){
		//确定存储方式
		$logConf = config::get('log');
		$drive = $logConf['drive'];
		$class = '\core\libs\drive\log\\'.$drive;
		self::$class = new $class;		
	}
	
	static public function log($name,$file='log'){
		self::$class->log($name,$file);
	}
	
	
}
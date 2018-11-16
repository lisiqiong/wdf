<?php
/*
 * @desc 文件系统
 * **/
namespace core\libs\drive\log;
use core\libs\config;

class file{
	public $path;//日志存储位置
	
	public function __construct(){
		$conf = config::get('log');
		$this->path = $conf['option']['path'];
	}
	
	/**
	 * @desc 写入日志文件
	 * **/
	public function log($msg,$file='log'){
		$path = $this->path.'/'.date('Ymd');
		if(!is_dir($path)){
			mkdir($path,'0777',true);
		}
		$title = date('Y-m-d H:i:s',time()).' ';
		return file_put_contents($path.'/'.$file.'.log',$title.json_encode($msg).PHP_EOL,FILE_APPEND);
	}
		
}
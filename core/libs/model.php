<?php
/**
 * @desc 框架模型类
 * **/
namespace core\libs;
use Medoo\Medoo as medoo;
use core\libs\config;
class model extends medoo{
	/*
	 * @desc 设置数据库配置实例化对象
	 * **/
	public function __construct(){
		$conf = config::get('mysql');
		parent::__construct($conf);
	}
	
	
	
}
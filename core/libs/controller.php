<?php
/**
 * @desc 控制器基类
 * **/
namespace core\libs;
class controller{
	
	/**
	 * @desc 生成api返回的统一数据
	 * **/
	public function outJson($data){
		echo json_encode($data);
		exit();
	}
	
}
<?php
namespace app\Controller;
use core\libs\controller;

/**
 *wdf框架默认控制器
 **/
class IndexController extends controller{
	
	public function index(){
		$data = ['code'=>0,'msg'=>'success','data'=>['list'=>'这是数据']];
		$this->outJson($data);
	}
	
}


<?php
namespace app\Controller;
use core\libs\controller;
use app\Model\GoodsModel;
use app\Model\NewsModel;
/**
 *@desc 控制器默认操作演示类
 **/
class IndexController extends controller{
	
	/**
	 * @desc 获取所有新闻列表信息
	 * **/
	public function index(){
		$model = new NewsModel();
		$list = $model->getNewlist();
		$this->outJson(0,'成功获取新闻列表',$list);
	}
	
	
	
}


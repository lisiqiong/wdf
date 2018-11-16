<?php
namespace app\Model;
use core\libs\model;

/**
 * @desc 商品模型类
 * **/
class NewsModel extends model{
	
	/**
	 * @desc 获取商品列表
	 * **/
	public function getNewlist(){
		$list = $this->select("news",["id","title","intro","ctime"]);
		return $list;
	}
	
}
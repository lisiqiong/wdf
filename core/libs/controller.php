<?php
/**
 * @desc 控制器基类
 * **/
namespace core\libs;
class controller{
	
	/**
	 * @desc 生成api返回的统一数据
	 * ['code'=>0,'msg'=>'','data'=>'']
	 * **/	
	public function outJson($code,$msg,$data){
		$msg = empty($msg)?'success':$msg;
		$rData = ['code'=>$code,'msg'=>$msg,'data'=>[]];
		if(!empty($data)){
			$rData['data'] = $data;
		}
		echo json_encode($rData);
		exit();
	}
	
}
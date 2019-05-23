<?php
/*
 * @desc 核心加载器
 */
class Core{
    //需要加载对象数组
    private static $_objlist=[];
    //标示的调用方法为静态
    const _STATIC=1;
    //标示的方法为对象的
    const _OBJECT=2;
    //标示方法为静态的
    const _SIGNLE=3;

    /**
     * @desc 在对象前添加对象
     * @param $array
     */
    public static function unshiftObj($array){
        array_unshift(self::$_objlist,$array);
    }

    /***
     * @desc 监听对象个数用来遍历执行存储在数组的对象
     * @return bool
     */
    public static function listen(){
        if(count(self::$_objlist)>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @desc 向对象末尾加入对象
     * @param $array
     */
    public static function pushObj($array){
        array_push(self::$_objlist,$array);
    }

    /**
     * @desc 依次执行需要加载的对象
     */
    public static function doObj(){
        $objArr = array_shift(self::$_objlist);
        $className = $objArr[0];
        $funcNmae = $objArr[1];
        $params = $objArr[2];
        $type = $objArr[3];
        if($type==self::_STATIC){
            call_user_func_array([$className,$funcNmae],$params);
        }elseif ($type==self::_OBJECT){
            $obj = new $className();
            call_user_func_array([$obj,$funcNmae],$params);
        }elseif ($type==self::_SIGNLE){
            $signleObj = $className::getInstance();
            call_user_func_array([$signleObj,$funcNmae],$params);
        }
    }
}

class B{
    public static function  init(){
        echo "b init<br/>";
    }
}

class C{
    public  function add($name,$age=null){
        echo "c add name:{$name} , age:{$age}<br/>";
    }
}

class D{
    private static $_instance;

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @desc 获取实例化对象的入口
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof D)){
            self::$_instance = new D();
        }
        return self::$_instance;
    }

    public function show(){
        echo "this is single func<br/>";
    }

}

Core::unshiftObj(['B','init',[],Core::_STATIC]);
Core::unshiftObj(['C','add',['思琼哈哈哈',33],Core::_OBJECT]);
Core::unshiftObj(["D","show",[],Core::_SIGNLE]);
while (Core::listen()){
    Core::doObj();
}


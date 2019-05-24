<?php
/*
 * @desc 核心加载器,类和文件记载器
 */
class Loader{
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
        //取出数组中的第一组数据
        $objArr = array_shift(self::$_objlist);
        //获取类名
        $className = $objArr[0];
        //获取方法名称
        $funcNmae = $objArr[1];
        //获取参数信息
        $params = $objArr[2];
        //获取调用类型，是静态直接调用，还是对象调用方法，还是单例模式的方法调用
        $type = $objArr[3];
        //使用call_user_func_array方法调用类对应的方法
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

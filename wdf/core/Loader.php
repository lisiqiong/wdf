<?php
/*
 * @desc 核心加载器,类和文件记载器
 * 1.加载核心类
 * 2.加载配置文件
 * 3.记载控制器文件
 * 4.加载数据模型文件
 * 5.记载视图文件
 * 6.加载第三方依赖（composer）
 *
 */
namespace wdf\core;
class Loader{
    //需要加载对象数组
    private static $_objlist=[];
    //标示的调用方法为静态
    const _STATIC=1;
    //标示的方法为对象的
    const _OBJECT=2;
    //标示方法为静态的
    const _SIGNLE=3;

    private static $_config=[];

    /**
     * @desc 在对象前添加对象
     * @param $array
     */
    public static function unshiftObj($className,$func='init',$params=[],$type=self::_OBJECT){
        array_unshift(self::$_objlist,[$className,$func,$params,$type]);
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
    public static function pushObj($className,$func='init',$params=[],$type=self::_OBJECT){
        array_push(self::$_objlist,[$className,$func,$params,$type]);
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

        //加载类库文件
        include CORE_PATH.$className.".php";

        //使用命名空间后类要使用命名空间的方式使用
        $className = "wdf\core\\".$className;

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

    /**
     * @desc 加载类实现拦截
     * 保留返回信息和日志的记录
     */
    public  static function clear(){
        self::$_objlist = [];
        self::pushObj("Response");
        self::pushObj("Log");
    }

    /**
     * @desc 加载配置文件获取配置信息
     * @param $file
     * @param $key
     */
    public static function C($file,$key=null){
        if(isset(self::$_config[$file])){
            if(empty($key)){
                return self::$_config[$file];
            }else{
                //$key是数组的情况
                if(is_array($key)){
                    $conf = self::$_config[$file];
                    foreach($key as $k=>$v){
                        $conf = $conf[$v];
                    }
                    return $conf;
                }else{
                    return self::$_config[$file][$key];
                }
            }
        }else{
            $info = include WDF_PATH.'config'.DS.$file.".php";
            self::$_config[$file] = $info;
            return self::C($file,$key);
        }
    }

}

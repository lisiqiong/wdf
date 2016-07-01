<?php
namespace Wdf;
/**
 *wdf框架入口引导类
 **/
class wdf{
    /**
     *框架执行开始
     */
    static public  function run(){
       spl_autoload_register("Wdf\Wdf::autoload");
       $c = ucwords($_GET['c']); 
       $a = $_GET['a'];
       $controller = $c."Controller";
       $action = new $controller();
       $action->$a();
    }

    /***
     *自动加载类方法
     ***/
   static public  function autoload($className){
        if(preg_match('/Controller/',$className)){    
            $filename = CONTROLLER_PATH.$className.EXT;
            include WDF_PATH."Controller.class.php";
            include $filename;
        }
   }
   

}

?>

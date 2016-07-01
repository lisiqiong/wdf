<?php
class Dispatcher{
    protected static $dispa;
    public function __construct(){
        
    }

    public static  function getInstance(){
        if(!isset(self::$dispa)){
            self::$dispa = new self(); 
        }
        return self:$dispa;
    }

    public static function dispatch(){
        
    }


}

?>

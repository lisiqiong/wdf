<?php
/**
 * @desc 用户核心信息请求类
 * Class Request
 */
namespace wdf\core;
class Request{
    //对象实例
    private static $request;
    //host
    private  $host;
    //请求方法
    private  $method;
    //请求文件
    private  $file;
    //请求uri
    private $uri;
    //请求协议
    private $scheme;
    //请求端口号
    private $port;
    //请求历史记录
    private $history = [];
    //请求参数
    private $query="";

    //私有
    private function __construct(){}

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @desc 请求的初始化处理
     */
    public static function init(){
        if(!self::$request instanceof Request){
            self::$request = new self();
        }
        self::$request->host = $_SERVER['HTTP_HOST'];
        self::$request->method = $_SERVER['REQUEST_METHOD'];
        //没有找到.php文件为空
        $uri = parse_url($_SERVER['REQUEST_URI']);
        if(isset($uri['query'])){
            self::$request->query = $uri['query'];
        }
        $path = $uri['path'];
        //获取请求的文件名和业务uri
        if(strpos($path,".php"==-1)){
            self::$request->uri = '';
            self::$request->file = '';
        }else{
            $uriStr =  substr($path,1);
            $uriArr = explode("/",$uriStr);
            self::$request->file = $uriArr[0];
            self::$request->uri =  substr($path,strlen(self::$request->file)+2,strlen($path)-strlen(self::$request->file));
        }
        //用户协议类型
        self::$request->scheme = $_SERVER["REQUEST_SCHEME"];
        //用户端口号
        self::$request->port = $_SERVER["REMOTE_PORT"];
        //存储历史记录
        $setHistory = Loader::C('config',['history','sethistory']);
        if($setHistory){
            self::$request->setHistory($setHistory);
        }
        //黑名单处理
        self::$request->blackList();
        //恶意字符处理
        self::$request->filterCharacter();
    }

    /**
     * @desc 获取文件名
     * @return mixed
     */
    public static function getFile(){
        return self::$request->file;
    }

    /**
     * @desc 返回uri
     */
    public static function getUri(){
        return  self::$request->uri;
    }

    /**
     * @desc 记录历史访问信息
     */
    private  function setHistory(){
        if(isset($_COOKIE['history'])){
            $this->history = unserialize($_COOKIE['history']);
        }
        $uri = empty($this->uri)?'':"/".$this->uri;
        if($this->query==''){
            $url = $this->scheme."://".$this->host."/".$this->file.$uri;
        }else{
            $url = $this->scheme."://".$this->host."/".$this->file.$uri.'?'.$this->query;
        }
        $number = Loader::C('config',['history','number']);
        if(count($this->history)>$number){
            array_shift($this->history);
            array_push($this->history,$url);
        }else{
            array_unshift($this->history,$url);
        }
        setcookie("history",serialize($this->history),time()+3600);
    }

    /**
     * @desc 返回上一次记录
     */
    public static function getLastHistory(){
        if(isset($request->history[1])){
            return self::$request->history[1];
        }
        return "";
    }

    /**
     * @desc 返回所有历史记录
     */
    public static function getHistory(){
        return self::$request->history;
    }

    /**
     * @desc 恶意字符处理
     */
    private function filterCharacter(){

    }

    /**
     * @desc 黑名单处理
     */
    private function blackList(){

    }



}
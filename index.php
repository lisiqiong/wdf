<?php
//加载核心类文件
include "./wdf/core/Loader.php";
include "./wdf/core/Request.php";
include "./wdf/core/Router.php";
include "./wdf/core/Permit.php";
include "./wdf/core/Cache.php";
include "./wdf/core/Action.php";
include "./wdf/core/Response.php";
include "./wdf/core/Log.php";

Loader::unshiftObj(["Request","init",[],Loader::_OBJECT]);
Loader::pushObj(["Response","init",[],Loader::_OBJECT]);
Loader::pushObj(["Router","init",[],Loader::_OBJECT]);
Loader::pushObj(["Permit","init",[],Loader::_OBJECT]);
Loader::pushObj(["Cache","init",[],Loader::_OBJECT]);
Loader::pushObj(["Action","init",[],Loader::_OBJECT]);
Loader::pushObj(["Response","init",[],Loader::_OBJECT]);
Loader::pushObj(["Log","init",[],Loader::_OBJECT]);
while (Loader::listen()){
    Loader::doObj();
}

?>

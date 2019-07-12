<?php

return array(
    //mysql数据库配置信息
    'database'=>[
        'host'=>'localhost',
        'user'=>'root',
        'db'=>'test',
        'password'=>'',
        'port'=>3306,
    ],
//    //默认访问的路由
//    'default_router'=>[
//        'module'=>'index',
//        'controller'=>'index',
//        'action'=>'show'
//    ],
    "routering"=>[
        'index.php'=>[
            'module'=>'index',
            'controller'=>'index',
            'action'=>'index'
        ],
        'admin.php'=>[
            'module'=>'admin',
            'controller'=>'index',
            'action'=>'index'
        ],
    ],
//    "pathinfo"=>2,
///路由方式1.普通路由，2index.php?/index/index/index
    'history'=>[
        'sethistory'=>true,
        'number'=>5
    ]
);
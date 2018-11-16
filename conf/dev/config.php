<?php
return array(
		'mysql'=>[
			'database_type' => 'mysql',
			'database_name' => 'test',
			'server' => '192.168.0.213',
			'username' => 'root',
			'password' => 'devpassword',
			'charset' => 'utf8',
			'port' => 3306,
		],
		'router'=>[
			'default_contr'=>'index',
			'default_action'=>'index'	
		],
		'log'=>[
			'drive'=>'file',
			'option'=>[
				'path'=>APP_PATH.'/log/'
			]
		]		
	);
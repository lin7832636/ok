<?php
return array(
	
	//'配置项'=>'配置值'
	
	'DB_TYPE'   => 'mysql',				// 数据库类型
	'DB_HOST'   => '192.168.1.60',	
	'DB_NAME'   => 'servers',	
	// 'DB_HOST'   => '192.168.1.60',			// 服务器地址
	// 'DB_NAME'   => 'servers',			// 数据库名
	'DB_USER'   => 'spbc',				// 用户名
	'DB_PWD'    => 'rootroot',					// 密码
	'DB_PORT'   => 3306,				// 端口
	'DB_PREFIX' => 'sp_',				// 数据库表前缀 
	'DB_CHARSET'=> 'utf8',				// 字符集
	
	'URL_HTML_SUFFIX'=>'',				//伪静态后缀
	
	'APIKEY'=>'servers',					//对外接口访问第一密钥层
	'APIURL'=>'http://127.0.0.1/ok/servers/index.php/Api/',	//API接口地址
	
	'LOAD_EXT_CONFIG'=>array(	//扩展配置文件
		'errorcode', 
		'area',
	),	
);

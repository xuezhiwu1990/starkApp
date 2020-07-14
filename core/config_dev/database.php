<?php
return [
	//mysql 配置文件
	'PDO' => [
		'MYSQL_DSN' => 'mysql:host=127.0.0.1;dbname=test',
		'MYSQL_USER' => 'root',
		'MYSQL_PWD' => 'root',
	],
	'MEDOO' => [
		'database_type' => 'mysql',
		'database_name' => 'test',
		'server' => '127.0.0.1',
		'username' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'port' => 3306,
	],
];

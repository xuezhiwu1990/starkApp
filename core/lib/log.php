<?php
namespace core\lib;
use core\lib\conf as conf;
class log {
	static $class;
	/***
	  * 1.确定日志存储方式
	  * 2.写日志
	  */
	static public function init(){
		//确定存储方式
		$drive = conf::get('DRIVE','log');

		$class = '\core\lib\drive\log\\'.$drive;
		
		if(self::$class){
			return self::$class;
		}
		self::$class = new $class;
		
	}


	static public function log($name,$file = 'log'){
		self::$class->log($name,$file);
	}
}
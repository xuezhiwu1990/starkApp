<?php
namespace core\lib\drive\log;
use core\lib\conf;
class file {

	public $path;
	public function __construct(){
		$conf = conf::get('OPTION','log');
		$this->path = $conf['PATH'];
	}


	public function log( $massges , $file = 'log' ){
		/***
		 * 1.确定文件存储位置是否存在
		 * 2.新建目录
		 * 3.写入日志
		 **/
		$pathName = $this->path.date('Ymd');
		if(!is_dir($pathName)){
			mkdir($pathName,'0777',true);
		}

		$massges = date('Y-m-d H:i:s') . ' '. json_encode( $massges ) . PHP_EOL ;
		return 	file_put_contents( $pathName.'/'.$file.'.log',  $massges.PHP_EOL,FILE_APPEND );

	}
}
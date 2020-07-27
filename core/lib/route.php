<?php
/**
 * 路由类 1.要隐藏index.php 
 * try_files $uri $uri/ /index.html?$query_string;
 */
namespace core\lib;
use \core\lib\log;
class route
{
	public $ctrl;
	public $action; 
	public function __construct(){
		//1.隐藏index.php Nginx
		//2.获取url参数部分
		//3.返回对应的控制器和方法
		$uri = $_SERVER['REQUEST_URI'];
		if(isset($uri) && $uri != '/'){
			$urlLog['uri'] = $uri;
			$urlLog['params'] = $_REQUEST;
			log::log( $urlLog , 'url' );

			$pathArr = explode('/', ltrim( $uri , '/'));
			if(isset($pathArr[0]) && !empty($pathArr[0])){
				$this->ctrl = $pathArr[0];
				unset($pathArr[0]);
			}
			if(isset($pathArr[1]) && !empty($pathArr[1])){
				$this->action = $pathArr[1];
				unset($pathArr[1]);
			}else{
				$this->action = 'index';
			}

			//返回剩下的参数
			// $count = count($pathArr) + 2;
			// $i = 2;
			// while ( $i < $count ) {
			// 	if(isset($pathArr[$i + 1])) {
			// 		$_GET[$pathArr[$i]] = $pathArr[$i+1];
			// 	}
			// 	$i = $i + 2;
			// }
		}else{
			$this->ctrl = 'index';
			$this->action = 'index';
		}
	}
}
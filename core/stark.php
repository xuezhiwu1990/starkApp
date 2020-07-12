<?php
namespace core;
class stark
{
	public static $classMap = array();
	public $accign;
	static public function run(){
		\core\lib\log::init();	
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if(is_file( $ctrlfile )){
			include $ctrlfile;
			$ctrl = new $cltrlClass();
			$ctrl->$action();
			$routrLog['ctrl'] = $ctrlClass;
			$routrLog['action'] = $action;
			\core\lib\log::log( $routrLog , 'action' );	
		}else{
			throw new Exception("Error Processing Request");
		}
	}

	static public function load($class){
		//自动加载类库
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = STARK .'/'. $class . '.php';
			if(is_file( $file )){
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}

	public function assign($name,$value){
		$this->accign[$name] = $value;
	}

	public function display($file){

		$file = APP.'/views/'.$file;
		if(is_file($file)){
			extract($this->accign);
			include $file;
		}
	}
}
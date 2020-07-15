<?php
/**
 * starkApp 启动类
 */
namespace core;
class stark
{
	public static $classMap = array();
	public $accign;
	/**
	 *  try_files $uri $uri/ /index.php?$query_string;
	 */
	static public function run(){
		\core\lib\log::init();	
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/controller/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\controller\\'.$ctrlClass.'Ctrl';
		if(is_file( $ctrlfile )){
			include $ctrlfile;
			$ctrl = new $cltrlClass();
			if( !method_exists($ctrl ,$action) ){
				echo "没有找到指定的方法 - ".$action.' ,请检查...';
				die();
				//throw new Exception("没有找到指定的控制器".$ctrlClass);
			}

			$ctrl->$action();			
			$routrLog['ctrl'] = $ctrlClass;
			$routrLog['action'] = $action;
			\core\lib\log::log( $routrLog , 'action' );	
		}else{
			echo "没有找到指定的控制器 - ".$ctrlClass.' ,请检查...';
			die();
			//throw new Exception("没有找到指定的控制器".$ctrlClass);
		}
	}

	static public function Autoload($class){
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

	/**
	 * 模板赋值方法
	 */
	public function assign($name,$value){
		$this->accign[$name] = $value;
	}
	
	/**
	 * 模板渲染方法
	 */
	public function display($file){
		$file = APP.'/views/'.$file;
		if(is_file($file)){
			extract($this->accign);
			include $file;
		}
	}
}
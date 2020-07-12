<?php
namespace core\lib;
class conf {

	public static $conf = [];
	
	public static function get( $name , $file ){

		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{

			if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
				$path = STARK .'/core/config_dev/'.$file.'.php';
			}else{
				$path = STARK .'/core/config_web/'.$file.'.php';
			}

			
			if(is_file($path)){
				$conf = include $path;
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
				   throw new \Exception("没有这个配置项".$name);
				}
			}else{
				throw new Exception('找不到配置文件'.$file );
			}

		}
	}

	public static function all($file){
		
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$path = STARK .'/core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new Exception('找不到配置文件'.$file );
			}

		}
	}
}
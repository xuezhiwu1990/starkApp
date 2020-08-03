<?php
/**
 * https://medoo.lvtao.net/1.2/doc.php
 * MEDOO 数据库插件
 */
namespace core\lib;
use core\lib\conf as conf;
class model extends \Medoo\Medoo {

	public function __construct(){
		$db = conf::all('database');
		parent::__construct($db['MEDOO']);
	}


	// public static function getDatabase(){

	// 	$db = conf::all('database');
	// 	$database = new Medoo($db['MEDOO']);
	// 	var_dump($database );
	// }


	// public function addShopData($data){
	// 	$bool = $this->debug()->insert('app_shop', $data);
	// 	//$shop_id = $this->id();
	// 	var_dump($bool );die();
	// }
}
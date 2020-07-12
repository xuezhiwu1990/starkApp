<?php
namespace core\lib;
use core\lib\conf as conf;
class model extends \PDO {

	public function __construct(){
		$db = conf::all('database');
		try{
			parent::__construct($db['MYSQL_DSN'],$db['MYSQL_USER'],$db['MYSQL_PWD']);
		}catch (\PDOException $e){
			echo $e->getMessage();
		}
	}
}
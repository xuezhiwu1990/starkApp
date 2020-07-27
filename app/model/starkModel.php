<?php
namespace app\model;
use core\lib\model;
class starkModel extends model {
	 
	 public $table = 'stark';

	 public function getLists(){
	 	$res = $this->select($this->table,['id','name'],['id[>]' => 1]);
	 	dump($res);
	 }

}
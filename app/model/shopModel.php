<?php
namespace app\model;
use core\lib\model;
class shopModel extends model {
	 
	 public $table = 'app_shop';

	 public function addShop(array $data){
	 	$this->insert($this->table,$data);
	 	$shop_id = $this->id();
	 	return empty($shop_id) ? 0 : $shop_id;
	 }

}
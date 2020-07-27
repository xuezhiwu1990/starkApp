<?php
namespace app\model;
use core\lib\model;
class adminModel extends model {
	 
	 public $table = 'app_admin';

	 public function getAccountInfo(string $ad_account){
	 	$res = $this->select($this->table,['ad_password'],['ad_account' => $ad_account]);
	 	return empty($res[0]['ad_password']) ? '' : $res[0]['ad_password'];
	 }

}
<?php
namespace core\lib;
use core\lib\conf as conf;
class model extends \Medoo\Medoo {

	public function __construct(){
		$db = conf::all('database');
		parent::__construct($db['MEDOO']);
	}
}
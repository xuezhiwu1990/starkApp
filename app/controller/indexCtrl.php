<?php
namespace app\controller;
//use core\lib\model;
class indexCtrl extends \core\stark {
	public function index(){
		$model = new \app\model\starkModel();
		$model->getLists();
		//$this->display('index.html');
	}

}

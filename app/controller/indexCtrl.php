<?php
namespace app\controller;
//use core\lib\model;
class indexCtrl extends \core\stark {
	public function index(){
		// $model = new \core\lib\model();
		// $sql = 'select * from stark';
		// $res = $model->query($sql);
		// p($res->fetchAll(\PDO::FETCH_ASSOC));


		// $data = 'hello,world';
		// $title = '这里是视图文件';
		// $this->assign( 'data' , $data );
		// $this->assign( 'title' , $title );


		// $temp = \core\lib\conf::get('CTRL','config');
		// $temp = \core\lib\conf::get('CTRL','config');
		// $temp = \core\lib\conf::get('CTRL','config');
//$model = new \core\lib\model();
		$model = new \app\model\starkModel();
		$model->getLists();
		//$this->display('index.html');
	}

}

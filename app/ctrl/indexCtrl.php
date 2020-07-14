<?php
namespace app\ctrl;
class indexCtrl extends \core\stark {
	public function index(){
		$model = new \core\lib\model();
		$sql = 'select * from stark';
		$res = $model->query($sql);
		p($res->fetchAll(\PDO::FETCH_ASSOC));


		$data = 'hello,world';
		$title = '这里是视图文件';
		$this->assign( 'data' , $data );
		$this->assign( 'title' , $title );


		$temp = \core\lib\conf::get('CTRL','config');
		$temp = \core\lib\conf::get('CTRL','config');
		$temp = \core\lib\conf::get('CTRL','config');
		var_dump($temp);

		$this->display('index.html');
	}

}

<?php
namespace app\controller;
use core\lib\conf as conf;
//use core\lib\model;
class adminCtrl extends controller {
	
	protected $base_encry = true;
	protected $model;

	public function __construct(){

		parent::__construct();
		
		if( $this->model == NULL ){
			$this->model = new \app\model\adminModel();
		}
	}

	
	public function getAdminInfo(){

		$params = $this->_request(['name']);
		$solt = conf::get('MD5_SOLT','decrypt');

		$ad_password = $this->model->getAccountInfo($params['username']);

		if(!$ad_password){
			$result['status'] = 403;
            $result['msg'] = '账户输入不正确~';
            $this->jsonResult($result);
		}

		$password = md5($params['password'].$solt );
        if($password != $ad_password){
            $result['status'] = 403;
            $result['msg'] = '密码不正确';
            $this->jsonResult($result);
        }


        //账户和密码都正确，写入session
        $key = md5('STARK-HN001-%^&*');
        $time = time() + 3600*8;
        setcookie("Auth_".$key, base64_encode($ad_password), $time,'/','.stark.com',false);
        $result['status'] = 200;
        $result['msg'] = '账号正常使用，欢迎'.$params['username'];
        $result['data']['key'] = $key;
        $this->jsonResult($result);
	}


	public function getTest(){
		var_dump($_COOKIE,$_SESSION);
	}

}

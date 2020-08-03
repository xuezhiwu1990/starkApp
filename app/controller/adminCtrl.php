<?php
namespace app\controller;
use core\lib\conf as conf;
//use core\lib\model;
class adminCtrl extends controller {
	
	protected $base_encry = true;
	protected $model;
	protected $shopModel;

	public function __construct(){

		parent::__construct();
		
		if( $this->model == NULL ){
			$this->model = new \app\model\adminModel();
			$this->shopModel = new \app\model\shopModel();
		}
	}

	
	public function getAdminInfo(){

		$params = $this->_request(['name']);
		$solt = conf::get('MD5_SOLT','decrypt');

		$accountInfo = $this->model->getAccountInfo($params['username']);
		
		if(empty($accountInfo)){
			$result['status'] = 403;
            $result['msg'] = '账户输入不正确~';
            $this->jsonResult($result);
		}

		$password = md5($params['password'].$solt );
        if($password != $accountInfo['ad_password']){
            $result['status'] = 403;
            $result['msg'] = '密码不正确';
            $this->jsonResult($result);
        }

        $token_key = conf::get('TOKEN_KEY','decrypt');
        $key = md5($token_key);
        $time = time() + 3600*8;
        setcookie("Auth_".$key, base64_encode(json_encode($accountInfo)), $time,'/','.stark.com',false);
        setcookie("ZhiD_Token", base64_encode(json_encode($accountInfo)), $time,'/','.stark.com',false);
        $result['status'] = 200;
        $result['msg'] = '账号正常使用，欢迎'.$params['username'];
        $result['data']['key'] = $key;
        $result['data']['access'] = base64_encode(json_encode($accountInfo));
        $this->jsonResult($result);
	}
}

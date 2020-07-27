<?php
namespace app\controller;

/**
 *  公共控制器
 */
class controller extends \core\stark
{

	protected $base_encry = false; //1 加密接口 0 未加密
	protected $request = []; 
	protected $_decrypt;
	function __construct()
	{
		if( $this->base_encry ){  $this->request = $this->_decrypt(); }
	}

	/*
	 * 接收参数方法
	 */
	protected function _request( array $name ){
		
		if(isset( $name ) && !empty( $name ) && is_array( $name )){
			foreach ($name as $key => $val) {
				if( isset($_REQUEST[$val]) && !empty($_REQUEST[$val]) ){
					$this->request[$val] = $_REQUEST[$val];
				}
			}
		}

		return $this->request;
	}


	protected function _decrypt(){

		if(isset($_REQUEST['token']) && !empty($_REQUEST['token'])){
 			$params = json_decode(base64_decode( $_REQUEST['token'] ),true);
		}else{
			$result['status'] = 402;
            $result['msg'] = '接口加密,Token不存在';
            $result['data'] = [];
            echo json_encode($result);
            die();
		}

        if( isset($params) && !empty($params) && is_array($params)){
            return $params;
        }else{
            $result['status'] = 402;
            $result['msg'] = '参数加密方式不正确';
            $result['data'] = [];
            echo json_encode($result);
            die();
        }
	}


	function jsonResult($result){
		echo json_encode($result);
		die();
	}	
}
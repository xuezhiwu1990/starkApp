<?php
namespace app\controller;
use core\lib\conf as conf;
//use core\lib\model;
class shopCtrl extends controller {
	
	protected $base_encry = true;
	protected $model;
	protected $shopModel;

	public function __construct(){

		parent::__construct();
		
		if( $this->model == NULL ){
			$this->model = new \app\model\shopModel();
		}
	}

	/**
	 * 新增商品
	 */
	public function addShop(){

		$params = $this->_request(['shop_name','shop_status','shop_price','shop_tag','shop_thumb','shop_type','shop_describe','shop_info']);

		if(!empty($params['shop_info'])) { $params['shop_info'] = htmlspecialchars($params['shop_info']); }
		if($params['shop_status'] == 'on') { $params['shop_status'] = 1; }else{ $params['shop_status'] = 2;}
		unset($params['username']);
		unset($params['password']);
		$shop_id = $this->model->addShop($params);
		if($shop_id){
			$result['status'] = 200;
	        $result['msg'] = '添加成功';
	        $result['data']['shop_id'] = $shop_id;
		}else{
			$result['status'] = 500;
	        $result['msg'] = '添加失败,联系管理员';
		}
		$this->jsonResult($result);
	}	


	public function uploadImage(){
		return '{"status":200,"msg":"操作成功","data":{"src":"http://ironman.zhuangbfan.com/upload/image/202008/20200803033303tkx6rv.png"}}';
		
	}

}

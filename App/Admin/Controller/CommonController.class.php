<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {
	/**
	 * 会在所有方法执行之前判断是否登录
	 */
    public function _initialize(){
    	if (!session('?adminInfo')) {
    		$this->redirect('Login/index');
    	}
    }

    /**
     * 防止手贱用户，直接退出并跳404
     */
    public function _empty()
    {
    	session('adminInfo', null);
    	$this->display('Public/404');
    }
}
<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller {
	/**
	 * 显示并处理登录
	 */
    public function index(){
    	if (IS_POST) {
    		//1.判断用户名是否为空
    		//2.密码是否为空
    		//3.查询数据库
    		$user = M('User');
    		$map['username'] = I('username');
    		$map['pwd'] = md5(I('pwd'));

    		//find() 只查1条数据，返回一维数组
    		$info = $user->where($map)->find();
    		// echo $user->_sql();
    		// dump($info);
      //       exit;
    		if ($info) {
    			//1.判断是否被禁用//2.判断角色是否为管理员
               if($info['status'] == 1 && $info['role'] > 0 ){
    			
    			session('adminInfo', $info);
    			$this->success('登录成功', U('User/index'));
                }
    		} else {
    			$this->error('用户名或密码错误');
    		}
    	} else {
	    	$this->display();
    	}
    }

    /**
     * 退出登录
     */
    public function logout()
    {
    	session('adminInfo', null);
    	$this->redirect('Login/index');
    }
}
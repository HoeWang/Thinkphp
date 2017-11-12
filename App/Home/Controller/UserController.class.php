<?php

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	/**
	 * 用户列表
	 */
	public function index(){
		$user = D('User');

		if(isset($_GET['username']) && strlen($_GET['username']) > 0){
			$map['username'] = ['like','%'.I('get.username').'%'];
		}

		$count = $user->where($map)->count();

		$page = new \Think\Page($count,5);

		$btn = $page->show();
		// var_dump($btn);
		$arr = $user->where($map)->limit($page->firstRow,$page->listRows)->order('id desc')->getData();

		if(IS_AJAX){
			$data = $arr;
			$data['page'] = $btn;
			$this->ajaxReturn($data);
			exit;
		}

		$this->assign('list',$arr);
		$this->assign('btn',$btn);
		// var_dump($arr);
		$this->display();
	}

	//AJAX验证用户名存在与否，存在返回1，不存在返回0
	public function select(){
		$user = D('User');
		$uname = I('get.username');
		$res = $user->findData($uname);
		if($res == 0){
			$this->ajaxReturn($res);
		}else{
			$this->ajaxReturn($res);
		}

	}

	//用户添加页面渲染以及用户添加数据提交操作
	public function add()
	{
		if(IS_GET){
		$this->display();
		}else{
			$user = D('User');
			if(IS_POST){
			$username = I('post.username');
			$password = I('post.pass');
			$password = md5($password);
			$addtime = time();
			$list = [
				'username'=>$username,
				'pwd'=>$password,
				'addtime'=>$addtime
			];
			}else{
				$this->error('非法请求');
			}
			

			$res = $user->addData($list);
			// echo '<pre>';
			// print_r($res);
			// echo '</pre>';
			if($res){
			$this->success('操作成功',U('User/index'),3);
			}else{
				$this->error('操作失败');
			}
		}
	}
	
	//删除用户
	public function del()
	{
		//var_dump($_GET['id']);
		$user = D('User');
		$id = I('get.id');
		$res = $user->delData($id);
		if($res){
		$this->ajaxReturn($res);
		}

	}

	//修改界面及处理
	public function update()
	{
		if(IS_GET){
		$id = I('get.id');
		// echo '<pre>';
		// print_r($id);
		// echo '</pre>';
		$user = D('User');
		$res = $user->upFind($id);
		// echo '<pre>';
		// print_r($res);
		// echo '</pre>';
		$this->assign('res',$res);
		$this->display();
		}else{
			$list = I('post.');
			$user = D('User');
			$res = $user->changeData($list);
			// echo '<pre>';
			// print_r($res);
			// echo '</pre>';
			if($res){
				$this->success('修改成功',U('User/index'),3);
			}else{
				$this->error('操作失败或者没进行任何修改');
			}
		}
	}

	
}
<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class UserController extends CommonController {
	/**
	 * 显示用户列表
	 */
    public function index(){
    	// dump($_GET);
    	$user = D('User');

    	//处理搜索
    	if (strlen(trim(I('username'))) > 0) {
    		$search['username'] = ['like', '%'.I('username').'%'];
    	}
    	if (strlen(trim(I('sex'))) > 0) {
    		$search['sex'] = I('sex');
    	}
    	//分页类
    	$total = $user->where($search)->count();
    	$p = new Page($total, 5);
        $p->setConfig('prev',"<b>上一页</b>");
        $p->setConfig('next',"<b>下一页</b>");
        // $p->setConfig('header','共 %TOTAL_ROW% 条记录');

    	$arr = $user->limit($p->firstRow, $p->listRows)
	    			// ->field(true)
    				->where($search)->order('id desc')
    				->fuck();
        $btn = $p->show();
        if(IS_AJAX){
            $data = $arr;
            $data['page'] = $btn;
            $this->ajaxReturn($data);
            exit;  
        }
    	//分配数据
    	$this->assign('list', $arr);
    	$this->assign('btn', $btn);

    	$this->display();
    }

    /**
     * ajax删除用户
     * @param  int $id 要删除的id
     */
    public function ajaxDel($id)
    {
    	// dump($_POST);
    	if (IS_AJAX) {
    		if (M('User')->delete($id)) {
    			$this->success('删除成功');
    		} else {
    			$this->error('删除失败');
    		}
    	}
    }

    /**
     * 修改用户
     * @param  int $id 要改的id
     */
    public function edit($id)
    {
    	if (IS_POST) {
    		$user = D('User');
            // dump($_POST);
    		//默认会传$_POST
            if(empty(I('post.pwd')) && !empty(I('post.pwd2'))){
                $this->error('请输入修改密码');
            }elseif(!empty(I('post.pwd')) && empty(I('post.pwd2'))){
                $this->error('请输入确认密码');
            }
            // exit;
    		$data = $user->create($_POST);
    		if ($data) {
    			//判断密码
    			if (!empty($data['pwd']) && !empty($data['pwd2'])) {
    				$data['pwd'] = md5($data['pwd']);
    			} else {
    				unset($data['pwd']);
    			}
    			// dump($data);exit;

    			if ($user->save($data)) {
	    			$this->success('修改成功', U('index'));
	    		} else {
	    			$this->error('您啥也没改到');
	    		}
    		} else {
    			$this->error($user->getError());
    		}
    	} else {
	    	$info = M('User')->find($id);
	    	$this->assign('info', $info);
	    	$this->display();
	    }
    }

    /**
     * 添加用户数据
     */
    public function add()
    {
    	if (IS_POST) {
    		//只有用D实例化出来的对象，才可以使用Model层各种功能，这里就是使用了自动验证的create方法
    		$user = D('User');
    		$data = $user->create();
            
            dump($data);
            exit;
    		if ($data) {
    			if ($user->add($data)) {
	    			$this->success('添加成功', U('index'));
	    		} else {
	    			$this->error('添加失败');
	    		}
    		} else {
    			$this->error($user->getError());
    		}
    	} else {
    		// echo md5('');exit;
    		$this->display();
    	}
    }

    /*public function add()
    {
    	if (IS_POST) {
    		$user = M('User');
    		//1.判断用户名是否合法、是否存在
    		//2.判断密码是否为空
    		//3.判断两次密码是否一致

    		$_POST['pwd'] = md5(I('pwd'));
    		$_POST['addtime'] = time();
    		if ($user->add($_POST)) {
    			echo 'yes';
    			echo $user->_sql();
    			exit;
    			$this->success('添加成功', 'index');
    		} else {
    			$this->error('添加失败');
    		}

    	} else {
    		// echo md5('');exit;
    		$this->display();
    	}
    }*/
}
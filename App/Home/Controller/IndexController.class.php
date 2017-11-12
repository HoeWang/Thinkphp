<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $name = '宴辉';

    	define('HOST', 'localhost');

        vendor('PHPMailer.class','','.pop3.php');
        vendor('PHPMailer.classphpmailer');
        echo sendMail('157731917@qq.com','测试邮件','<h1>哈哈哈</h1><a href="http://www.baidu.com">hah</a>');
    	//分配数据
    	$this->assign('name', $name);
    	$this->assign('age', 18);

    	$arr = ['size'=>'F', 'height'=>120];
    	$this->assign('list', $arr);
    	//显示模板：[模块@][控制器:][操作]
    	// $this->theme('Green')->display('Admin@Index/index');
    	$this->display();
    }


    public function tag(){
    	$arr = M('User')->select();

    	$this->assign('lists',$arr);
    	$this->assign('emp',"<tr><td colspan='5'>暂时没有数据</td></tr>");
    	$this->display();
    }

    public function shiwu()
    {
        $user = M('User');
        $user->startTrans();

        $user->commit();

        $user->rollback();
    }

    public function cache()
    {
        // S(array('type'=>'memcache','expire'=>60));
        // S('key','卓佳',60);

        // echo S('key');
        $user = M('User');
        $arr = $user->cache('user',60,'memcache')->find();

        dump(S('user'));
        dump($arr);


    }
}
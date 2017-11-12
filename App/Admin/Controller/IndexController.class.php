<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	// $user = D('Fuck');
    	// // $user = M('Fuck');

    	// $user->getData();

    	// $obj = M('','','mysql://root:123456@localhost/shop#utf8');
    	$obj = M('User');
    	$where['username'] = ['eq',':username'];
    	dump($obj->where($where)->bind(':username','admin')->select());




    }


    public function curd()
    {
    	// dump(M('User')->select());
    	// dump(M('User')->where('id > 50')->order('id')->getField('id,username'));
    	// dump(D('User')->field('id,username,pwd')->add(['xxoo'=>23,'pwd'=>md5(123),'username'=>xxoo],'',true));
    	// dump(M('User')->where('id=112')->save(['username'=>'1111222']));
    	// dump(M('User')->save(['username'=>'11111222','id'=>64]));
    	// dump(M('User')->where('id=105')->delete());
    	// dump(M('User')->delete(104));
    }

    public function cha()
    {
    	//where传数组可以防注入，也就是利用$map方法
    	$user = M('User');

    	// $arr = $user->where("id=:id")->bind(':id','88')->select();

    	// $arr = $user->where(["id"=>['eq',88]])->select();
    	// dump($user->_sql());
    	$map['id|username'] = [['in', '64,65,71,72,88'], ['like', '%1%'], '_multi'=>true];
    	$map['id'] = ['gt', 70];
    	$arr = M('User')->where($map)->select();
    	dump($arr);
    }
}
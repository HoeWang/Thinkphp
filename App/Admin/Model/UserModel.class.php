<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model
{
	//自动验证：具体能写那些东西，参考：模型-》自动验证
	protected $_validate = [
		//检测用户名是否存在
		//表单自动验证,
		
		['username', '', '用户名已经存在', 0, 'unique'],
		//require表示必须输入
		['username', 'require', '请输入用户名'],
		//使用正则
		// ['username', '/^\w{2,11}$/', '请输入合法用户名'],
		//验证两次密码是否一致
		
		['pwd2', 'pwd', '两次密码不一致', 2, 'confirm'],
		
	];

	//自动完成：用callback的时候如何传第2个参数？
	//第一个参数是完成的字段，就是自动往返回的数据内(即返回给C层的$data中)插入这个字段名为下标的值
	//第二个参数，因为是表单不存在的值，所以这个参数是对表单参数的处理
	//第三个参数是生成时机，即什么时候生成这个数据。和自动验证的低6个参数一致。但是默认为1
	//第四个参数附加规则，默认为string，function为填充的内容是一个函数名
	protected $_auto = [
		['pwd','md5',1,'function'],
		['addtime', 'time', 1, 'function'],
	];

	public function fuck()
	{
		$arr = $this->select();

		$sex = ['女', '男', '妖', '卓佳佳'];
		foreach ($arr as $k=>$v) {
			$arr[$k]['sex'] = $sex[$v['sex']];
			$arr[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
		}
		return $arr;
	}
}
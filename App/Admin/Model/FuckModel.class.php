<?php
namespace Admin\Model;
class FuckModel extends \Think\Model
{
	protected $_validate =[
		['name','require','用户名不能为空']
	];

	protected $_map = [
		'name'=>'username',
	];

	protected $tableName = "user";

	
	public function getData()
	{
		// dump($this->select());

		// dumo(M('Goods')->select());

		// dump($this->table('shop_godds')->select());

		// dump($this->table('__GOODS__')->select());
		// 查询的是shop_goods表

		// dump($this->table('__USER_ROLE__')->select());
		// 查询的是shop_user_role表

	}
}
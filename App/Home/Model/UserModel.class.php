<?php
namespace Home\Model;

class UserModel extends \Think\Model
{
	public function getData()
	{
		$arr = $this->select();

		$sex = ['女', '男', '妖', 'gay'];
		//在返回之前处理数据
		foreach ($arr as $k=>$v) {
			$arr[$k]['sex'] = $sex[ $v['sex'] ];
			$arr[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
		}
		return $arr;
	}

	public function addData($list)
	{
		$res = $this->add($list);
		return $res;
	}

	public function findData($uname='')
	{

		$res = $this->where("username='{$uname}'")->select();
		if(empty($res)){
		return 0;
		}else{
			return $res;
		}
	}

	public function delData($id)
	{
		$res = $this->delete($id);
		return $res;
	}	


	public function upFind($id)
	{
		$res = $this->find($id);
		return $res;
	}

	public function changeData($list)
	{
		$res = $this->save($list);
		return $res;
	}
}
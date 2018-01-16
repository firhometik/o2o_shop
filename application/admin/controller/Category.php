<?php
namespace app\admin\controller;
use think\Controller;
class Category extends Controller
{
	private $model;
	public function _initialize(){
		$this -> model = model('Category');
	}
	public function index(){
		$parentId = input("get.parent_id",0,'intval');
		$category = $this -> model -> getparent($parentId);
		return $this -> fetch('',['category'=>$category]);
	}
	public function add(){
		$id = input('get.id');
		$cate = $this -> model ->get($id);
		$category = $this -> model -> getparent();
		return $this -> fetch('',['category'=>$category,'cate'=>$cate]);
	}
	public function setcategory(){
		if (!request()->isPost()) {
			$this -> error('请求失败');
		}
		$data = input('post.');
		$validate = validate('Category');
		if (!$validate->check($data)) {
			$this -> error($validate->getError());
		}
		if (!empty($data['id'])) {
			$re = $this -> model -> save($data,['id'=>intval($data['id'])]);
			if ($re) {
				$this -> success('修改成功');
			}else{
				$this -> error('修改失败');
			}
		}else{
			if ($this -> model -> add($data) !==false ) {
				$this -> success("添加成功");
			}else{
				$this -> error("添加失败");
			}
		}
	}
	public function listorder($id,$listorder){
		$re = $this -> model -> save(['listorder'=>$listorder],['id'=>$id]);
		if ($re) {
			$this -> result($_SERVER['HTTP_REFERER'],1,'success');
		}else{
			$this -> result($_SERVER['HTTP_REFERER'],0,'更新失败');
		}
	}
	public function status(){

	}
	public function delcategory(){
		$id = input('get.id');
		$re = $this -> model ->where(['id'=>$id]) ->delete();
		if ($re) {
			$this -> result($_SERVER['HTTP_REFERER'],1,'success');
		}else{
			$this -> result($_SERVER['HTTP_REFERER'],0,'删除失败');
		}
	}
}
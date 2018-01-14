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
		$category = $this -> model -> getparent();
		return $this -> fetch('',['category'=>$category]);
	}
	public function save(){
		$data = input('post.');
		$validate = validate('Category');
		if (!$validate->check($data)) {
			$this -> error($validate->getError());
		}
		if ($this -> model -> add($data) !==false ) {
			$this -> success("添加成功");
		}else{
			$this -> error("添加失败");
		}
	}
}
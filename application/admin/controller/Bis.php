<?php
namespace app\admin\controller;
use think\Controller;
class Bis extends Controller
{
	public function index(){
		return $this -> fetch();
	}
}
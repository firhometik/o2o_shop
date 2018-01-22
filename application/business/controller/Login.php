<?php
namespace app\business\controller;
use think\Controller;
class Login extends Controller
{
	public function index(){
		return $this -> fetch();
	}
}
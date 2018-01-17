<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this -> fetch();
    }
    public function welcome(){
    	return $this -> fetch();
    }
    public function test(){
    	return \Map::staticimage('浙江省嘉兴市智慧产业园');
    }
}

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
        \phpmailer\Email::sendmail('1033741321@qq.com','tp5-email-test','欢迎注册我的tp5商城');
        return '发送邮件成功';
    	// return $this -> fetch();
    }
    public function test(){
    	return \Map::staticimage('浙江省嘉兴市智慧产业园');
    }
}

<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 状态函数
function status($status){
	if ($status == 1) {
		$str = "<span class='label label-success radius'>正常</span>";
	}elseif ($status == 0) {
		$str = "<span class='label label-danger radius'>待审<span>";
	}else{
		$str = "<span class='label label-danger radius'>删除/span>";
	}
	return $str;
}

//curl
function doCurl($url,$type=0,$data=[]){
	$ch = curl_init();
	//设置选项
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	if ($type == 1) {
		//post
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	//执行并获取内容
	$outopt = curl_exec($ch);
	curl_close($ch);
	return $outopt;
}
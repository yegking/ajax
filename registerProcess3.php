<?php
	//这里的两句话很重要，第一句话高速浏览器返回的数据是xml格式
	header("Content-Type:text/html;charset=utf-8");
	//高速浏览器不要缓存数据//内容类型
	header("Cache-Control:no-cache");//缓存管理，不要缓存

	//接收数据(这里要看请求方式对应是 _POST 还是_GET)
	$username=$_POST["username"];

	//这里我们看看如何处理格式是xml
	$info="";
	if($username=="shunping"){
		//这里$info是一个json数据格式的字串
		$info='{"res":"该用户名不可以用","id":"a001","date":"2015-11-24"}';

	

	}else{
		$info='{"res":"该用户名可以用","id":"a002","date":"2015-11-24"}';
	}
	echo $info;


?>
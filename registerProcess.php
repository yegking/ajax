<?php

//这里两句换很重要，第一句话告诉浏览器返回的数据是xml格式
header("Content-Type:text/xml;charset=utf-8");

//告诉浏览器不要缓存数据
header("Cache-Control:no-cache");

//接收数据
//$username=$_GET['username'];

$username=$_POST['username'];
if($username=="yannwu"){
	echo "用户名不可以用";

}else{

echo "用户名可以用";
}


?>
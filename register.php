<html>
<head>
<title>用户注册</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<script type="text/javascript">
	//创建ajax引擎
	function getXmlHttpObject(){
		var xmlHttpRequest;
		//不同浏览器获取对象xmlhttprequest对象方法不一样
		if(window.ActiveXObject){
			xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");
				
		}else{
			xmlHttpRequest=new XMLHttpRequest();
		}

		return xmlHttpRequest;
	
}

var myXmlHttpRequest="";

//验证用户名是否存在
	function checkName(){
		myXmlHttpRequest=getXmlHttpObject();


		//怎么判断创建ok

		if(myXmlHttpRequest){

			//通过myXmlHttpRequest对象发送请求到服务器的某个页面
			//第一个参数表示请求的方式,"get""post"
			//第二个参数指定url，对那个页面发出ajax请求（本质仍然是http请求）
			//第三个参数表示true表示使用异步机制,如果false表示不使用异步

			//GET方法
			
			var url="../ajax/registerProcess.php?mytime="+new Date()+"&username="+$("username").value;
			//打开请求
			myXmlHttpRequest.open("get",url,true);
			//指定回调函数。chuli 是函数名
			myXmlHttpRequest.onreadystatechange=chuli;
			//真的发送请求，如果是get请求则填入null即可
			//如果是post请求则填入实际的数据即可
			myXmlHttpRequest.send(null);

			





		}

	}

	//回调函数
	function chuli(){

		//window.alert("处理函数被调回"+myXmlHttpRequest.readyState);

		//我要取出从registerProcess.php页面返回的数据
			//readyState值的含义

			//等于1：说明请求已经准备好可以发送

			//等于2：服务器正在处理请求时会作出响应，响应首部提供了有//关响应的信息，并提供一个状态码。

			//等于3：数据下载到请求对象，但是响应数据还没有完全准备好，还不能使用

			//等于4：服务器处理完请求，数据可以使用了
		if(myXmlHttpRequest.readyState==4){
			//取出值，根据返回信息的格式定.text
			//window.alert("服务器返回"+myXmlHttpRequest.responseText);

			$('myres').value=myXmlHttpRequest.responseText;


		}
	}


	//这里我么自己写一个函数
	function $(id){
		return document.getElementById(id);

	}

	

</script>
</head>
<body>
<form action="" method="post">
用户名字:<input type="text" name="username1"  id="username"/>
<input type="button" onclick="checkName();" value="验证用户名"/>
<input style="border-width:0;color:red" type="text" id="myres"/>
<br/>
用户密码:<input type="password" name="password"><br/>
电子邮件:<input type="text" name="email"><br/>
<input type="submit" value="用户注册"/>
</form>
</body>
</html>
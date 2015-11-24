<html>
<head>
<title>用户注册</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<script type="text/javascript">
	//创建ajax引擎
	function getXmlHttpObject(){
		var xmlHttpRequset;
		//不同的浏览器获取对象xmlhttprequest对象的方法不一样
		if(window.ActiveXObject){
			
			xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");


		}else{


			xmlHttpRequest=new XMLHttpRequest();
		}
		return xmlHttpRequest;
	
	}

	var myXmlHttpRequest;

	//验证用户名是否存在
	function checkName(){

		myXmlHttpRequest=getXmlHttpObject();
		//怎么判断创建ok
		if(myXmlHttpRequest){

			//通过myXmlHttpRequest对象发送请求到服务器的某个页面
			//第一个参数表示请求的方式“get，post”
			//第二个参数指定url，对哪个页面发出ajax请求（本质仍然是http请求）
			//第三个参数表示：true表示使用异步机制，如果false表示不使用异步机制
			var url="registerProcess3.php";
			//这个是要发送的数据
			var data = "username="+$('username').value
			//打开请求
			myXmlHttpRequest.open("post",url,true);
			//还有一句话

			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");// 在AJAX往服务器上传数据是，设置了content-type为application/x-www-form-urlencoded，此时是对整个发 送内容作了编码，并不是对名字对应的值做了编码

			//指定回调函数.chuli是函数名
			myXmlHttpRequest.onreadystatechange=chuli;

			//真的发送请求，如果是get请求则填入null即可
			//如果是post请求，则填入实际的数据
			myXmlHttpRequest.send(data);



		}


	}
	//回调函数

	function chuli(){
		//window.alert("处理函数被调回"+myXmlHttpRequest.readState);
		//我要取出从registerPro.php页面返回的数据
		if(myXmlHttpRequest.readyState==4){

			var mes=myXmlHttpRequest.responseText;
			//使用eval函数将mes字符串转换成对应的对象
			var mes_obj=eval("("+mes+")");

			$("myres").value=mes_obj.res;

		}



	}

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
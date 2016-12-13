<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登录</title>
<link rel="stylesheet" type="text/css" href="home/bootstrap/css/login.css">

</head>
<body>
<div class="htmleaf-container">
	<div id="wrapper" class="login-page">
	  <div id="login_form" class="form">
		<form class="register-form">
		  <input type="text" placeholder="用户名" id="r_user_name"/>
		  <input type="password" placeholder="密码" id="r_password" />
		  <input type="text" placeholder="邮箱" id="r_email" />
		  <button id="create">创建账户</button>
		  <p class="message">已经有了一个账户? <a href="#">立刻登录</a></p>
		</form>
		<form class="login-form">
		  <input type="text" placeholder="用户名" id="user_name"/ value="陈先生">
		  <input type="password" placeholder="密码" id="password"/ value="12345678">
		  <button id="login">登　录</button>
		  <p class="message">还没有账户? <a href="#">立刻创建</a></p>
		</form>
	  </div>
	</div>
</div>

<script src="home/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
function check_login()
{
 var name=$("#user_name").val();
 var pass=$("#password").val();
 $.post('/index.php?module=sql&action=loginYz',{name:name,pass:pass},function(data){
 	if (data == '0000') {
 		alert("登录成功！");
		window.location.href='/index.php';
 	}else{
 		$("#login_form").removeClass('shake_effect');  
 		setTimeout(function()
 		{
 			$("#login_form").addClass('shake_effect')
 		},1); 
 	}
 },'json');

}

function check_register(){
	var name = $("#r_user_name").val();
	var pass = $("#r_password").val();
	var email = $("#r_email").val();
	$.post('/index.php?module=sql&action=register',{name:name,pass:pass,email:email},function(data){
		if (data == '0000') {
			 alert("注册成功！");
		}else if(data == '2222'){
			 alert("用户已存在");
		}else{
			$("#login_form").removeClass('shake_effect');  
			setTimeout(function()
			{
				$("#login_form").addClass('shake_effect')
			},1);  
		}

	},'json');

}
$(function(){
	$("#create").click(function(){
		check_register();
		return false;
	})
	$("#login").click(function(){
		check_login();
		return false;
	})
	$('.message a').click(function () {
		$('form').animate({
			height: 'toggle',
			opacity: 'toggle'
		}, 'slow');
	});
})
</script>

 
</body>
</html>
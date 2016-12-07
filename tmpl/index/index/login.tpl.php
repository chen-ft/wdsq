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
		  <input type="text" placeholder="电子邮件" id="r_emial"/>
		  <button id="create">创建账户</button>
		  <p class="message">已经有了一个账户? <a href="#">立刻登录</a></p>
		</form>
		<form class="login-form">
		  <input type="text" placeholder="用户名" id="user_name"/>
		  <input type="password" placeholder="密码" id="password"/>
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
 if(name=="123" && pass=="123")
 {
  alert("登录成功！");
  $("#user_name").val("");
  $("#password").val("");

 }
 else
 {
  $("#login_form").removeClass('shake_effect');  
  setTimeout(function()
  {
   $("#login_form").addClass('shake_effect')
  },1);  
 }
}
function check_register(){
	var name = $("#r_user_name").val();
	var pass = $("#r_password").val();
	var email = $("r_email").val();
	if(name!="" && pass=="" && email != "")
	 {
	  alert("注册成功！");
	  $("#user_name").val("");
	  $("#password").val("");
	 }
	 else
	 {
	  $("#login_form").removeClass('shake_effect');  
	  setTimeout(function()
	  {
	   $("#login_form").addClass('shake_effect')
	  },1);  
	 }
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
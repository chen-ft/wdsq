<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>问答社区</title>
<?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
<link rel="stylesheet" href="home/lunt/css/setting.css">
<!-- 表单验证 -->
<link rel="stylesheet" href="home/plugins/validator/bootstrapValidator.min.css">
</head>
<body>
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/nav.tpl.php"); ?>
	<div class="aw-container-wrap">
		<div class="container">
			<div class="row">
				<div class="aw-content-wrap clearfix">
					<div class="aw-user-setting">
						<div class="tabbable">
							<ul class="nav nav-tabs aw-nav-tabs active">
								<li class="active"><a href="/index.php?module=user&action=security">安全设置</a></li>
								<li><a href="/index.php?module=user&action=profile">基本资料</a></li>
								<h2><i class="icon icon-setting"></i> 用户设置</h2>
							</ul>
						</div>
						<div class="tab-content clearfix">
							<div class="aw-mod">
								<form class="form-horizontal" action="/index.php" method="post" id="setting_form">
									<input type="hidden" name="module" value="sql">
									<input type="hidden" name="action" value="setPass">
									<div class="mod-body">
										<div class="aw-mod aw-user-setting-bind">
											<div class="mod-head">
												<h3>修改密码</h3>
											</div>
											<div class="mod-body">
												<div class="form-group">
													<label class="control-label" for="input-password-old">当前密码</label>
													<div class="row">
														<div class="col-lg-4">
															<input type="password" class="form-control" id="input-password-old" name="old_password">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label" for="input-password-new">新的密码</label>
													<div class="row">
														<div class="col-lg-4">
															<input type="password" class="form-control" id="input-password-new" name="password">
														</div>
													</div>
												</div> 
												<div class="form-group">
													<label class="control-label" for="input-password-re-new">确认密码</label>
													<div class="row">
														<div class="col-lg-4">
															<input type="password" class="form-control" id="input-password-re-new" name="re_password">
														</div>
													</div>
												</div>      
											</div>
										</div>
									</div>
									<div class="mod-footer clearfix">
										<button type="submit" class="btn btn-large btn-success pull-right">保存</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
	<!-- 表单验证 -->
	<script src="home/plugins/validator/bootstrapValidator.min.js"></script>
	<script>
	$(function(){
		  // 表单验证
	    $('#setting_form').bootstrapValidator({
	        message: '请输入有效值',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            old_password: {
	                message: '请输入有效值',
	                validators: {
	                    notEmpty: {
	                        message: '当前密码不能为空'
	                    },
	                }
	            },
	            password: {
	                validators: {
	                    notEmpty: {
	                        message: '不能为空'
	                    },
	                    stringLength: {
	                        min: 6,
	                        max: 30,
	                        message: '密码不能少于6位'
	                    },
	                    identical: {
	                        field: 're_password',
	                        message: '确认密码不一致'
	                    }
	                }
	            },
	            re_password: {
	                validators: {
	                    notEmpty: {
	                        message: '确认密码不能为空'
	                    },
	                    identical: {
	                        field: 'password',
	                        message: '确认密码不一致'
	                    }
	                }
	            },
	        }
	    });
	});
/*
	function save(obj){
		 //判断是否验证成功
	    $('#setting_form').data('bootstrapValidator').validate();  
	        if(!$('#setting_form').data('bootstrapValidator').isValid()){
	                return;
	    } 
	    $.post('/index.php?module=sql&action=setPass',{'oldPass':'','newPass':''},function(result){

	    },'json');

	}	*/	
	</script>
</body>
</html>
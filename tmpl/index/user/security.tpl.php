<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>问答社区</title>
<?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
<link rel="stylesheet" href="home/lunt/css/setting.css">
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
								<div class="mod-body">
									<div class="aw-mod aw-user-setting-bind">
										<div class="mod-head">
											<h3>修改密码</h3>
										</div>
										<form class="form-horizontal" action="http://wenda.bootcss.com/account/ajax/modify_password/" method="post" id="setting_form">
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
										</form>
									</div>
								</div>
								<div class="mod-footer clearfix">
									<a href="javascript:;" class="btn btn-large btn-success pull-right" onclick="AWS.ajax_post($('#setting_form'));">保存</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
</body>
</html>
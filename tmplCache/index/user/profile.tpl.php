<!DOCTYPE html> <html lang="en">
<head>
<meta charset=UTF-8">
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
								<li><a href="/index.php?module=user&action=security">安全设置</a></li>
								<li class="active"><a href="/index.php?module=user&action=profile">基本资料</a></li>
								<h2><i class="icon icon-setting"></i> 用户设置</h2>
							</ul>
						</div>
						<div class="tab-content clearfix">
							<div class="side-bar" style="margin-top: 25px;" >
								<ul>
									<li>
										<img style="border-radius: 5px;width: 101px;height:101px" src="home/userImg/user-<?=$_SESSION['login']['strUserId']?>.jpg"  alt="" id="avatar_src">
									</li>
									<li style="margin-top: 8px;margin-left: 8px;">
									<form method="post" id="imgForm" name="imgForm" action="/index.php" enctype="multipart/form-data">
										<input type="hidden" name="module" value="sql">
										<input type="hidden" name="action" value="imgUp">
										<input type="button" class="btn btn-success" onclick="File1.click()" style="border: 1px solid #ccc" value="上传头像">
										<input type="file" onchange="this.form.submit()"  name="File1" multiple="multiple" style=" position:absolute;top:-7px;left:-12px; width:80px; height:34px;filter:alpha(opacity=0)">
									</form>
									</li>
								</ul>
								</div>
						 		
							<!-- 基本信息 -->
							<div class="aw-mod">
								<form id="setting_form" method="post" action="/index.php">
									<input type="hidden" name="module" value="sql">
									<input type="hidden" name="action" value="userSet">
									<div class="mod-body">
										<div class="aw-mod mod-base">
											<div class="mod-head">
												<h3>基本信息</h3>
											</div>
											<div class="mod-body">
												<dl>
													<dt>账号:</dt>
													<dd>414448804@qq.com</dd>
												</dl>
												<dl>
													<dt>真实姓名:</dt>
													<dd>_TimChen</dd>
												</dl>
												<dl>
													<dt>性别:</dt>
													<dd>
														<label>
															<input name="info[sex]" id="sex" value="1" type="radio" /> 男						
														</label>
														<label>
															<input name="info[sex]" id="sex" value="2" type="radio" /> 女						
														</label>
														<label>
															<input name="info[sex]" id="sex" value="3" type="radio" checked="checked" /> 保密						
														</label>
													</dd>
												</dl>
												<dl>
													<dt>生日:</dt>
													<dd>
														<select name="info[birthday_y]">
															<option value=""></option>
															<?php for($i=2016;$i>=1950;$i--):?>
															<option value=<?=$i?>><?=$i?></option>
															<?php endfor;?>
														</select>
														年						
														<select name="info[birthday_m]">
															<option value=""></option>
															<?php for($i=1;$i<=12;$i++):?>
															<option value=<?=$i?>><?=$i?></option>
														    <?php endfor;?>
														</select>
														月						
														<select name="info[birthday_d]">
															<option value=""></option>
															<?php for($i=1;$i<=31;$i++):?>
															<option value=<?=$i?>><?=$i?></option>
														    <?php endfor;?>
														</select>
														日					
													</dd>
												</dl>
												<dl>
													<dt><label>介绍:</label></dt>
													<dd class="introduce">
														<input class="form-control" name="info[signature]" maxlength="128" type="text" />
													</dd>
												</dl>
												<!-- 上传头像 -->
												<div class="side-bar" style="margin-right: 25px">
													
												</div>
												<!-- end 上传头像 -->
											</div>
										</div>
										<!-- end 基本信息 -->
										<!-- 联系方式 -->
										<div class="aw-mod mod-contact">
											<div class="mod-head">
												<h3>联系方式</h3>
											</div>
											<div class="mod-body clearfix">
												<ul>
													<li>
														<label for="input-mobile">手机号码 :</label>
														<input class="form-control" type="text" id="input-mobile" name="info[mobile]" value="" />
													</li>
												</ul>
											</div>
										</div>
										<!-- end 联系方式 -->
									</div>
									<div class="mod-footer clearfix">
										<a class="btn btn-large btn-success pull-right" onclick="AWS.form_set($('#setting_form'));return false;">保存</a>
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
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=UTF-8">
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
											<div class="mod-head title-input">
												<textarea id="js-textarea" ui-textarea-autogrow="" required="" ng-model="draft.title" name="title" ui-tab-trigger="" autofocus="" word-min="1" word-max="50" placeholder="请输入标题" style="height: 46px;width: 912px;resize: none;"></textarea>
											</div>
											<div class="mod-body">
												<div class="article"></div>   
											</div>
										</div>
									</div>
									<div class="mod-footer clearfix">
										<button type="submit" class="btn btn-large btn-success pull-right">发表</button>
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
	

	<script>
	$('.article').summernote({
		 height:300,
	});
	</script>
</body>
</html>
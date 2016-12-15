<div class="col-md-2">
	<a href="/admin.php?module=work&action=index" class="btn btn-primary btn-block margin-bottom">工作区</a>
	<div class="box box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">全部任务</h3>
			<div class="box-tools">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body no-padding">
			<ul class="nav nav-pills nav-stacked">
				<li class=<?php if(ACTION_NAME == 'index') echo "active";?> ><a href="/admin.php?module=user&action=index"><i class="fa fa-inbox"></i> 问题列表 </a></li>
				<li class=<?php if(ACTION_NAME == 'report') echo "active";?> ><a href="/admin.php?module=report&action=report"><i class="fa fa-server"></i> 收到举报<span class="label label-primary pull-right"><?=$_SESSION['report']['num']?></span></a></li>
				<li class=<?php if(ACTION_NAME == 'user') echo "active";?> ><a href="/admin.php?module=user&action=user"><i class="fa fa-server"></i> 用户管理</a></li>
				<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"></i> 添加客户</a></li>
			</ul>
		</div><!-- /.box-body -->
	</div><!-- /. box -->
	<div class="box box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">黑名单客户</h3>
			<div class="box-tools">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body no-padding">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#"><i class="fa fa-circle-o text-red"></i> 待解冻</a></li>
				<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> 已拒绝</a></li>
			</ul>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div><!-- /.col -->


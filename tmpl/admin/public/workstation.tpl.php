<div class="col-md-2">
	<a href="javascript:void(0)" class="btn btn-success btn-block margin-bottom">工作区</a>
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
				<li class=<?php if(ACTION_NAME == 'topic') echo "active";?> ><a href="#"><i class="fa fa-server"></i> 话题管理</a></li>
			</ul>
		</div><!-- /.box-body -->
	</div><!-- /. box -->
</div><!-- /.col -->


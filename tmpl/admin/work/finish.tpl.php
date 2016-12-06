<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>消费金融-小微时贷</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini  <?php echo CFG_DEF_CSS; ?>">
        <div class="wrapper">
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/header.tpl.php"); ?>
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/left.tpl.php"); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        信审管理
                        <small>-今天不努力工作，明天努力找工作</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin.php?module=work&action=index"><i class="fa fa-dashboard"></i> 信审管理</a></li>
                        <li class="active">信审进度查询</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
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
                                        <li><a href="/admin.php?module=work&action=index"><i class="fa fa-inbox"></i> 待处理 <span class="label label-primary pull-right">12</span></a></li>
                                        <li class="active"><a href="/admin.php?module=work&action=finish"><i class="fa fa-envelope-o"></i> 已处理</a></li>
                                        <li><a href="#"><i class="fa fa-server"></i> 任务查询</a></li>
                                        <li><a href="/admin.php?module=work&action=refuse"><i class="fa fa-trash-o"></i> 已拒绝</a></li>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">关注的任务</h3>
                                    <div class="box-tools">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> 待处理</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> 已拒绝</a></li>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <div class="col-md-10">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">已处理列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>任务编号</th>
                                                <th>产品</th>
                                                <th>申请期限</th>
                                                <th>申请金额</th>
                                                <th>最高承受还款</th>
                                                <th>贷款类型</th>
                                                <th>贷款进度</th>
                                                <th>业务员</th>
                                                <th>添加时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) {
                                                foreach ($data as $value) { ?>
                                                    <tr>
                                                        <td>{$value['strWorkNum']}</td>
                                                        <td>{$value['strProductNum']}</td>
                                                        <td>{$value['inApplyCycle']}周</td>
                                                        <td>{$value['inApplyMoney']}</td>
                                                        <td>{$value['inBearMoney']}</td>
                                                        <td>{$value['strLoanType']}</td>
                                                        <td>{$value['strTitle']}</td>
                                                        <td>{$value['strSalesman']}</td>
                                                        <td>{$value['tCreateTime']}</td>
                                                        <td><input type="button" value="查看"></td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>任务编号</th>
                                                <th>产品</th>
                                                <th>申请期限</th>
                                                <th>申请金额</th>
                                                <th>最高承受还款</th>
                                                <th>贷款类型</th>
                                                <th>业务员</th>
                                                <th>添加时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php"); ?>
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
<?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    </body>
</html>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>
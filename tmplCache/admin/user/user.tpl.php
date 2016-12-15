<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>问答社区工作区</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini <?php echo CFG_DEF_CSS; ?>">
        <div class="wrapper">
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/header.tpl.php"); ?>
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/left.tpl.php"); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        后台管理
                        <small>-今天不努力工作，明天努力找工作</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin.php?module=user&action=index"><i class="fa fa-dashboard"></i> 数据管理</a></li>
                        <li class="active">问题列表</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php $this->loadTmplate(TEMPLATE_PATH . "public/workstation.tpl.php"); ?>
                        <div class="col-md-10">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">用户列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>问题编号</th>
                                                <th>问题标题</th>
                                                <th>举报内容</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody id="user-list">
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>问题编号</th>
                                                <th>问题标题</th>
                                                <th>举报内容</th>
                                                <th>创建时间</th>
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
<script id="user" type="text/html">
    {{each list as value index}}
    <tr>
        <td>{{value['strQsId']}}</td>
        <td>{{value['qsTitle']}}</td>
        <td>{{value['strReason']}}</td>
        <td>{{value['tCreateTime']}}</td>
        <td><button class="btn btn-block btn-primary" onclick="openUrl('{{value['strQsId']}}');">编辑</button></td>
    </tr>
    {{/each}}
</script>
<script>
    $(function() {
        $("#example1").DataTable();

    });
    $.post("/admin.php?module=ajax&action=reportList",
        function(listData) {
            var data = {
            list: listData,
        };
        var html = template('user', data);
            $("#user-list").html(html);
        }, "json");
            
    function openUrl(qsId){
        var index = layer.open({
            type: 2,
            content: '/admin.php?module=user&action=edit&id=' + qsId,
            area: ['320px', '195px'],
            maxmin: true
        });
        layer.full(index);
    }
 
</script>
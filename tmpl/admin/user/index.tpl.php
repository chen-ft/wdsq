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
    <body class="hold-transition skin-blue sidebar-mini <?php echo CFG_DEF_CSS; ?>">
        <div class="wrapper">
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/header.tpl.php"); ?>
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/left.tpl.php"); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        客户管理
                        <small>-今天不努力工作，明天努力找工作</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin.php?module=user&action=index"><i class="fa fa-dashboard"></i> 客户管理</a></li>
                        <li class="active">客户列表查询</li>
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
                                        <li class="active"><a href="/admin.php?module=user&action=index"><i class="fa fa-inbox"></i> 客户列表 <span class="label label-primary pull-right">12</span></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-server"></i> 白名单客户</a></li>
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
                        <div class="col-md-10">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">客户列表</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>申请件编号</th>
                                                <th>客户姓名</th>
                                                <th>手机号码</th>
                                                <th>创建时间</th>
                                                <th>更新时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody id="user-list">
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>申请件编号</th>
                                                <th>客户姓名</th>
                                                <th>手机号码</th>
                                                <th>创建时间</th>
                                                <th>更新时间</th>
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
            <!-- myModel -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">注册新客户</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="box-body" id="userLink">
                                    <div class='form-group'> 
                                        <label for='strPhone' class='col-sm-2 control-label'>手机号:</label>
                                        <div class='col-sm-5'> 
                                            <input  type='text' class='form-control' placeholder="请输入手机号" name="strPhone" id="strPhone" onblur="checkPhone()">
                                        </div> 
                                        <label id='phoneMeg' class='col-sm-4 control-label' style="color: red;"></label>
                                    </div><!-- 
                                    <div class='form-group'> 
                                      <label for='strLinkOffice3' class='col-sm-2 control-label'>头像</label>
                                      <div class='col-sm-3'> 
                                         <input type='text' class='form-control' >
                                      </div> 
                                    </div> -->
                                    <div class='form-group'> 
                                        <label for='strPass' class='col-sm-2 control-label'>密码:</label>
                                        <div class='col-sm-5'> 
                                            <input  type='text' class='form-control' placeholder="请输入密码" name="strPass">
                                        </div> 
                                    </div>
                                    <div class='form-group'> 
                                        <label for='strPass' class='col-sm-2 control-label'>验证码:</label>
                                        <div class='col-sm-5'> 
                                            <input  type='text' class='form-control' placeholder="验证码" name="strCode">
                                        </div> 
                                        <button type="button" class="btn btn-default btn-sm " id="getCode">获取验证码</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary" onclick="addClient()">注册</button>
                        </div>
                    </div>
                </div>
            </div> <!--  myModel  -->
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php"); ?>
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    </body>
</html>
<script id="user" type="text/html">
    {{each list as value index}}
    <tr>
        <td>{{value['strWorkNum']}}</td>
        <td>{{value['strUserName']}}</td>
        <td>{{value['strPhone']}}</td>
        <td>{{value['tCreateTime']}}</td>
        <td>{{value['tUpdateTime']}}</td>
        <td><button class="btn btn-block btn-primary" onclick="openUrl('{{value['strUserId']}}');">客户编辑</button></td>
    </tr>
    {{/each}}
</script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
    $.post("/admin.php?module=ajax&action=userList",
        function(listData) {
            var data = {
            title: listData['data']['title'],
            isStatus: listData['ret'],
            list: listData['data']['content']['data'],
        };
        var html = template('user', data);
            $("#user-list").html(html);
        }, "json");
            
    function openUrl(strUserId){
        var index = layer.open({
            type: 2,
            content: '/admin.php?module=user&action=edit&strUserId=' + strUserId,
            area: ['320px', '195px'],
            maxmin: true
        });
        layer.full(index);
    }
    //注册新客户
function addClient() {
        var info = $('#clientMsg').serializeArray();
        $.ajax({
            type: 'post',
            data: {
                info: info
            },
            url: '/admin.php?module=ajax&action=userAdd',
            success: function (data) {
                var data = eval("(" + data + ")");
                if (data.ret == '0000') {
                    layer.msg("注册成功", {
                        icon: 6
                    });
                    window.location.replace('/admin.php?module=user&action=edit&strUserId=' + data.data.content.strUserId);
                } else {
                    layer.msg(data.msg, {
                        icon: 5
                    });
                }

            },
        });
    }
    //验证手机号格式

function checkPhone() {
        var mobile = $('#strPhone').val();
        if (!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))) {
            $('#phoneMeg').html('手机号格式错误');
        } else {
            $('#phoneMeg').empty();
        }
    }
    // 获取验证码
$('#getCode').click(function () {
    var phone = $('#strPhone').val();
    $.ajax({
        type: 'post',
        data: {
            phone: phone
        },
        url: '/admin.php?module=ajax&action=codeGet',
        dataType: 'json',
        success: function (data) {
                if (data.ret == '0000') {
                    time($('#getCode'));
                    layer.msg("发送成功", {
                        icon: 6
                    });
                } else {
                    layer.msg("发送失败", {
                        icon: 5
                    });
                }
            },
            error: function (data) {
                layer.msg("手机号不能为空", {
                    icon: 7
                });
            }
    }); //ajax
});
var wait = 60;

function time(o) {
    if (wait == 0) {
        o.removeClass("disabled");
        o.html('获取验证码');
        wait = 60;
    } else {
        o.addClass('disabled');
        o.html("重新发送(" + wait + ")");
        wait--;
        setTimeout(function () {
            time(o);
        }, 1000)
    }
}
</script>
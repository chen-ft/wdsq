<!--<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://www.xinfeiyou.com">xinfeiyou.com</a>.</strong> All rights reserved.
</footer>-->
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

<script>
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
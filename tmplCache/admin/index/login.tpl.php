<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>小微时贷消费金融后台登陆</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a><b>小微速贷</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Admin Sign In</p>
                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="info[strOperation]" placeholder="Username" value="xing654">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="info[strPass]" placeholder="Password" value="123456">
                        <input type="hidden" name="module" value="index">
                        <input type="hidden" name="action" value="login">
                    </div>
                    <div class="row">
                        <label for="" class="control-label col-xs-3">验证码:</label>
                        <!-- <div class="col-xs-3">   -->
                        <input type="text" class="control-text col-xs-3" name="checkCode">
                        <!-- </div> -->
                        <div class="col-xs-4">
                            <img id="checkcode" class="color_1" align="absmiddle" src="code.php" onclick="this.src = 'code.php?id=' + Math.random() * 5;" style="cursor:pointer;" alt="验证码,看不清楚?请点击刷新验证码">
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-2" style="margin-top: 20px;">  
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                        <div class="col-xs-4" style="margin-top: 20px;">  
                            <button type="reset" class="btn btn-primary btn-block btn-flat">Reset</button>
                        </div><!-- /.col -->
                    </div>
                </form>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="home/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="home/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="home/plugins/iCheck/icheck.min.js"></script>

    </body>
</html>

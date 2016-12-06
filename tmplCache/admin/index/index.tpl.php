<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
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
            <div class="content-wrapper">
                <section class="content-header"><!--导航头--></section>
                <section class="content">
                    <ul class="timeline">
                        <li class="time-label">
                            <span class="bg-red">
                                整体流程
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                <h3 class="timeline-header"><a href="#">客户借款</a></h3>
                                <div class="timeline-body">
                                    <ol>
                                        <li>纸质申请表</li>
                                        <li>审核客户资料</li>
                                    </ol>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-edit bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">客服初审</a></h3>

                                <div class="timeline-body">
                                    <ol>
                                        <li>申请表</li>
                                        <li>身份证和验磁截屏</li>
                                        <li>银行卡</li>
                                        <li>网查资料</li>
                                        <li>社保公积金</li>
                                        <li>寿险保单</li>
                                        <li>其他</li>
                                    </ol>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">分部面审</a></h3>

                                <div class="timeline-body">

                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">总部终审</a></h3>

                                <div class="timeline-body">
                                    纸质申请表
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">签订合同</a></h3>

                                <div class="timeline-body">
                                    <ol start="8">
                                        <li>第三方协议</li>
                                        <li>借款承诺书</li>
                                        <li>还款明细</li>
                                        <li>信用咨询管理服务程序</li>
                                        <li>委托扣款协议书与POS条款</li>
                                        <li>其他(NDCS授权书，签约照片等)</li>
                                    </ol>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-clock-o bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a href="#">财务付款</a></h3>
                                <div class="timeline-body">
                                    生成付款呈签单
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-clock-o bg-gray"></i>

                        </li>
                        <!-- END timeline item -->
                    </ul>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php"); ?>
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    </body>
</html>

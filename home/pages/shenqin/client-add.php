<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/jjtong/home/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- DataTables -->
    <link rel="stylesheet" href="/jjtong/home/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/jjtong/home/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/jjtong/home/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/jjtong/home/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/jjtong/home/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/jjtong/home/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/jjtong/home/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/jjtong/home/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/jjtong/home/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/jjtong/home/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/jjtong/home/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
           <!-- sidebar menu: :左侧菜单-->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="/jjtong/admin.php">
                <i class="fa fa-dashboard"></i> <span>我的桌面</span></i>
              </a>
            </li>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>申请件管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="client-list.php"><i class="fa fa-circle-o"></i> 客户信息管理</a></li>
                <li><a href="apply-message-list.php"><i class="fa fa-circle-o"></i> 申请信息管理</a></li>
                <li><a href="media-list.php"><i class="fa fa-circle-o"></i> 影像件管理</a></li>
                <li><a href="interview-sign.php"><i class="fa fa-circle-o"></i> 面审签约管理</a></li>
                <li><a href="risk-control.php"><i class="fa fa-circle-o"></i> 风控审核管理</a></li>
                <li><a href="apply-progress.php"><i class="fa fa-circle-o"></i> 进件进度查询</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>信审管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../xinshen/xinshen.html"><i class="fa fa-circle-o"></i> 信审进度查询</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>财务管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../finance/accout.query.html"><i class="fa fa-circle-o"></i> 客户终审查询</a></li>
                <li><a href="../finance/faxi-message.html"><i class="fa fa-circle-o"></i> 客户罚息信息</a></li>
                <li><a href="../finance/sub-repayment.html"><i class="fa fa-circle-o"></i> 客户还款查询</a></li>
                <li><a href="../finance/sub-list.html"><i class="fa fa-circle-o"></i> 客户结清查询</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i><span>系统管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> 个人设置</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i> 密码修改</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            客户信息
          </h1>
          <ol class="breadcrumb">
            <li><a href="client-list.php"><i class="fa fa-dashboard"></i>home</a></li>
            <li class="active"></li>
          </ol>
        </section>

       <!-- Main content -->
        <section class="content">
          <div class="row">
           <!-- 右边列表 -->
            <div style="margin:0 30px;">
              <!-- general form elements disabled -->
              <!-- 客户信息 -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">客户信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal" method="post">
                    <div class="box-body">
                      <div class="form-group">
                      <label class="col-sm-2 control-label">证件类型:</label>
                        <div class="col-sm-2">
                          <select class="form-control" id="idType" onchange="selectIdType()">
                            <option value="0">身份证</option>
                            <option value="1">户口簿</option>
                            <option value="2">护照</option>
                            <option value="3">军官证</option>
                            <option value="4">士兵证</option>
                            <option value="5">港澳居民来往内地通行证</option>
                            <option value="6">台湾同胞来往内地通行证</option>
                            <option value="7">临时身份证</option>
                            <option value="8">外国人居留证</option>
                            <option value="9">警官证</option>
                            <option value="A">香港身份证</option>
                            <option value="B">澳门身份证</option>
                            <option value="C">台湾身份证</option>
                            <option value="X">其他证件</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">证件号码:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="18188775614"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">姓名:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control " id="inputEmail3" value="徐巧茹"  >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">手机号1:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="18188775614"  >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">手机号2:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="18188775614"  >
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">性别:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">男</option>
                            <option value="">女</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">出身日期:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="2018-45-152"  >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">住宅电话:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="0598-15454441"  >
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.box-body -->
              </div><!-- 客户信息 -->

              <!-- 个人信息 -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">个人信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">最高学历:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">研究生</option>
                            <option value="">本科</option>
                            <option value="">专科</option>
                            <option value="">中专</option>
                            <option value="">技校</option>
                            <option value="">高中</option>
                            <option value="">初中</option>
                            <option value="">小学</option>
                            <option value="">文盲</option>
                          </select>
                        </div>
                         <label for="inputEmail3" class="col-sm-1 control-label">最高学位:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">研究生</option>
                            <option value="">本科</option>
                            <option value="">专科</option>
                            <option value="">中专</option>
                            <option value="">技校</option>
                            <option value="">高中</option>
                            <option value="">初中</option>
                            <option value="">小学</option>
                            <option value="">文盲</option>
                          </select>
                        </div>
                         <label for="inputEmail3" class="col-sm-1 control-label">电子邮箱:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="1544148484@163.com" >
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label ">婚姻状况:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">未婚</option>
                            <option value="">已婚</option>
                            <option value="">再婚</option>
                            <option value="">复婚</option>
                            <option value="">丧偶</option>
                            <option value="">离婚</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">配偶姓名:</label>
                        <div class="col-sm-2">
                         <input type="text" class="form-control" id="inputEmail3" value="陈咚咚" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">配偶联系电话:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="1544148484" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">配偶证件类型:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">租房</option>
                            <option value="">集体宿舍</option>
                            <option value="">亲属楼宇</option>
                            <option value="">按揭</option>
                            <option value="">自置</option>
                            <option value="">共有住宅</option>
                            <option value="">其他</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">配偶证件号码:</label>
                        <div class="col-sm-2">
                         <input type="text" class="form-control" id="inputEmail3" value="45154145151515" >
                        </div>
                        
                        <label for="inputEmail3" class="col-sm-1 control-label   ">配偶工作单位:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">有</option>
                            <option value="">无</option>
                          </select>
                        </div>
                      </div>
                     <div class="form-group">
                         <label for="inputEmail3" class="col-sm-2 control-label ">通讯地址:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">福建省，福州市，台江区</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">通讯地址邮政编码:</label>
                        <div class="col-sm-2">
                         <input type="text" class="form-control" id="inputEmail3" value="351146" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">户籍地址:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="福建省，福州市，台江区" >
                        </div>
                      </div>
                       <div class="form-group">
                         <label for="inputEmail3" class="col-sm-2 control-label ">居住地址:</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="福建省，福州市，台江区" >
                         
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">居住地址邮政编码:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">354416</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label ">居住状况:</label>
                        <div class="col-sm-2">
                           <select class="form-control">
                            <option value="">有</option>
                            <option value="">无</option>
                          </select>
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.box-body -->
              </div><!-- 个人信息 -->

               <!-- 联系人信息 -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">联系人信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">联系人1:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="徐巧茹"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">电话:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="18188775614"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">关系:</label>
                      <div class="col-sm-2">
                        <select class="form-control">
                          <option value="">父亲</option>
                          <option value="">母亲</option>
                          <option value="">配偶</option>
                          <option value="">子女</option>
                          <option value="">兄妹</option>
                          <option value="">姐妹</option>
                          <option value="">兄弟</option>
                          <option value="">其他亲属</option>
                          <option value="">其他</option>
                        </select>
                      </div>
                    </div>
                       <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">联系人2:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="刘家秀"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">电话:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="14588775614"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">关系:</label>
                      <div class="col-sm-2">
                        <select class="form-control">
                          <option value="">父亲</option>
                          <option value="">母亲</option>
                          <option value="">配偶</option>
                          <option value="">子女</option>
                          <option value="">兄妹</option>
                          <option value="">姐妹</option>
                          <option value="">兄弟</option>
                          <option value="">其他亲属</option>
                          <option value="">其他</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">联系人3:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="徐巧茹"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">电话:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="18188775614"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">关系:</label>
                      <div class="col-sm-2">
                        <select class="form-control">
                          <option value="">父亲</option>
                          <option value="">母亲</option>
                          <option value="">配偶</option>
                          <option value="">子女</option>
                          <option value="">兄妹</option>
                          <option value="">姐妹</option>
                          <option value="">兄弟</option>
                          <option value="">其他亲属</option>
                          <option value="">其他</option>
                        </select>
                      </div>
                    </div>
                       <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">联系人4:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputEmail3" value="刘家秀"  >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">电话:</label>
                      <div class="col-sm-2 input">
                        <input type="text" class="form-control" id="inputEmail3" value="14588775614" >
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">关系:</label>
                      <div class="col-sm-2">
                        <select class="form-control">
                          <option value="">父亲</option>
                          <option value="">母亲</option>
                          <option value="">配偶</option>
                          <option value="">子女</option>
                          <option value="">兄妹</option>
                          <option value="">姐妹</option>
                          <option value="">兄弟</option>
                          <option value="">其他亲属</option>
                          <option value="">其他</option>
                        </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!--联系人信息 -->

              <!-- 单位信息 -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">单位信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">单位名称:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="福建小微时贷金融信息公司" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">单位电话:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="0755-89987979" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">单位所属行业:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">金融行业</option>
                            <option value="">其他</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label   ">职业:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="员工">
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">职务:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                          </div>
                          <label for="inputEmail3" class="col-sm-1 control-label   ">职称:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                          </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">月薪:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="5000~8000" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">年收入:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                          </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">发薪渠道:</label>
                        <div class="col-sm-2">
                          <select name="" id="" class="form-control">
                            <option value="">网银</option>
                            <option value="">现金</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">发薪日:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="" value="15">
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label   ">入职时间:</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">单位性质:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">机关单位</option>
                            <option value="">国有单位</option>
                            <option value="">外资</option>
                            <option value="">合资</option>
                            <option value="">民营</option>
                            <option value="">私企</option>
                            <option value="">个体</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                     
                        <label for="inputEmail3" class="col-sm-2 control-label   ">所在部门:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">技术部</option>
                          </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">单位地址:</label>
                        <div class="col-sm-2">
                         <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                        </div>
                         <label for="inputEmail3" class="col-sm-1 control-label   ">单位地址邮政编码:</label>
                        <div class="col-sm-2">
                          <select class="form-control">
                            <option value="">技术部</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label   ">本单位起始工作年份:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="2014-11-10" >
                        </div> 
                      </div>  
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.box-body -->
              </div><!-- 个人信息 -->
          </div>   <!-- 右边列表 -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="/jjtong/home/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/jjtong/home/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/jjtong/home/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/jjtong/home/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/jjtong/home/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- page script -->
    <script>
    function selectIdType(){
        var option = $('#idType option:selected').val();
        // alert(option);

        $.ajax({

            type:'post',
            url:'client-add-action.php',
            data:{
                idType:option,
            },
            datatype:'json',
            success:function(data){

            },


         });
    }
    
    </script>
  </body>
</html>

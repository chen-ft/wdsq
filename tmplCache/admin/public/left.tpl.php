<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $_SESSION['user']['strOperationImg']?>" class="img-circle" alt="User Image">
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
            <li class="treeview active">
                <a href="/admin.php">
                    <i class="fa fa-dashboard"></i> <span>我的桌面</span></i>
                </a>
            </li>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>申请件管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin.php?module=user&action=index"><i class="fa fa-circle-o"></i> 客户信息管理</a></li>
                    <li><a href="/admin.php?module=user&action=apply"><i class="fa fa-circle-o"></i> 申请信息管理</a></li>
                    <li><a href="/admin.php?module=user&action=media"><i class="fa fa-circle-o"></i> 影像件管理</a></li>
                </ul>
            </li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>信审管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin.php?module=work&action=index"><i class="fa fa-circle-o"></i> 信审进度查询</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>财务管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> 客户终审查询</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 客户罚息信息</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 客户还款详情</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 客户结清查询</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i><span>系统管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> 系统管理</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> 个人设置</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> 密码修改</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
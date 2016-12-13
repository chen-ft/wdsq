<div class="aw-top-menu-wrap">
		<div class="container">
			<!-- logo -->
			<div class="aw-logo hidden-xs">
				<a href=""></a>
			</div>
			<!-- end logo -->
			<!-- 搜索框 -->
			<div class="aw-search-box  hidden-xs hidden-sm">
				<input class="form-control search-query" type="text" placeholder="搜索问题、话题或人" autocomplete="off" name="q" id="aw-search-query" />
				<span title="搜索" id="global_search_btns"><i class="icon icon-search"></i></span>
				<div class="aw-dropdown">
					<div class="mod-body">
						<p class="title" style="display: none;">没有找到相关结果</p>
						<ul class="aw-dropdown-list" style="display: none;"></ul>
					</div>
				</div>
			</div>
			<!-- end 搜索框 -->
			<!-- 导航 -->
			<div class="aw-top-nav navbar">
				<div class="navbar-header">
			      <button  class="navbar-toggle pull-left">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
				<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
			      <ul class="nav navbar-nav">
			      	 <li><a href="/index.php?module=index&action=index" class=<?php if(ACTION_NAME == 'index') echo "active" ?>><i class="icon icon-home"></i> 动态</a></li>
					 <li><a href="/index.php?module=index&action=topic" class=<?php if(ACTION_NAME == 'topic') echo "active" ?>><i class="icon icon-topic"></i> 话题</a></li>
					 <li>
						<a href="javascript:void(0)"><i class="icon icon-bell"></i> 通知</a>
						<span class="badge badge-important" style="display:none" id="notifications_unread">0</span>
						<div class="aw-dropdown pull-right hidden-xs">
							<div class="mod-body">
								<ul id="header_notification_list">
								    <p class="aw-padding10" align="center">没有未读通知</p>
								</ul>
							</div>
							<div class="mod-footer">
								<a href="http://wenda.bootcss.com/notifications/">查看全部</a>
							</div>
						</div>
					 </li>
				  </ul>
			    </nav>
			</div>
			<!-- end 导航 -->
			<!-- 用户栏 -->
			<div class="aw-user-nav">
				<!-- 登陆&注册栏 -->
				<a href="http://wenda.bootcss.com/people/_TimChen" class="aw-user-nav-dropdown">
						<img alt="_TimChen" src="http://wenda.bootcss.com/static/common/avatar-mid-img.png" />
						<span style="color: #fff"><?=$_SESSION['login']['strName']?></span>
						
					</a>
					<div class="aw-dropdown dropdown-list pull-right">
						<ul class="aw-dropdown-list">
							<li><a href="http://wenda.bootcss.com/inbox/"><i class="icon icon-inbox"></i> 私信<span class="badge badge-important hide" id="inbox_unread">0</span></a></li>
							<li class="hidden-xs"><a href="/index.php?module=user&action=profile"><i class="icon icon-setting"></i> 设置</a>
							</li>
							<li><a href="/index.php?module=sql&action=logOut"><i class="icon icon-logout"></i> 退出</a></li>
						</ul>
					</div>
				<!-- end 登陆&注册栏 -->
			</div>
			<!-- end 用户栏 -->
			<div class="aw-publish-btn">
				<a class="btn-primary" onclick="AWS.dialog('askModal')"><i class="icon icon-ask"></i>提问</a>
			</div>
		</div>
	</div>

	<script type="text/html" id="dropdownList">
		<div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown">
			<ul class="aw-dropdown-list">
			{{#items}}
				<li><a data-value="{{id}}">{{title}}</a></li>
			{{/items}}
			</ul>
		</div>
	</script>

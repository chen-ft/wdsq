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
				 <li><a href="/index.php?module=topic&action=allTopic" class=<?php if(ACTION_NAME == 'allTopic') echo "active" ?>><i class="icon icon-topic"></i> 话题</a></li>
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
			<a href="/index.php?module=user&action=people&userId=<?=$_SESSION['login']['strUserId']?>" class="aw-user-nav-dropdown">
					<img alt="_TimChen" src="home/userImg/user-<?=$_SESSION['login']['strUserId']?>.jpg" />
					<span style="color: #fff"><?=$_SESSION['login']['strName']?></span>
					
				</a>
				<div class="aw-dropdown dropdown-list pull-right">
					<ul class="aw-dropdown-list">
						<li><a href="javascript:void(0)"><i class="icon icon-inbox"></i> 私信<span class="badge badge-important hide" id="inbox_unread">0</span></a></li>
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

<!-- 提问 modal -->
<div class="modal fade" id="askModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#5bbf5a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">提问</h4>
      </div>
      <div class="modal-body">
        <form id="askForm">
            <div class="form-group" >
                <textarea class="form-control" style="height:60px;" cols="1" placeholder="写下你的问题" id="qsTitle" ></textarea>
            </div>
            <div class="form-group" >
                <label style="margin-bottom:4px">问题内容 :</label>
                <div class="summernote" id="qsContent"></div>
            </div>
            <div class="form-group">
                <label style="margin-bottom:4px">选择话题 :</label><br>
                <select class="form-control select2 select2-hidden-accessible" data-placeholder="选择一个话题" multiple=""  style="width: 100%;" tabindex="-1" aria-hidden="true" id="qsTopic">
                <option value="10001">电影</option>
                <option value="10002">IOS</option>
                <option value="10003">互联网</option>
                <option value="10004">创业</option>
                <option value="10005">法律</option>
                <option value="10006">时尚</option>
                <option value="10007">美食</option>
                <option value="10008">心理学</option>
                <option value="10009">旅行</option>
                <option value="10010">设计</option>
                <option value="10011">汽车</option>
                <option value="10012">健身</option>
                <option value="10013">软件开发</option>
                <option value="10014">环境</option>
                <option value="10015">教育</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-success" onclick="AWS.ajax_post('publish')">发布</button>
      </div>
    </div>
  </div>
</div>
<!-- end 提问 modal -->



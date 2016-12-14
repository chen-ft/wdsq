<!DOCTYPE html> <html lang="en">
<head>
<meta charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>问答社区</title>
<?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
<link href="home/lunt/css/user.css" rel="stylesheet">

</head>
<body>
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/nav.tpl.php"); ?>
	<div class="aw-container-wrap">
    <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                <div class="col-sm-12 col-md-12 aw-main-content">
                    <!-- 用户数据内容 -->
                    <div class="aw-mod aw-user-detail-box">
                        <div class="mod-head">
                            <img src="http://wenda.bootcss.com/uploads/avatar/000/00/32/36_avatar_max.jpg" alt="_TimChen">
                            <span class="pull-right operate">
                                <a href="/index.php?module=user&action=profile" class="btn btn-mini btn-success">编辑</a>
                            </span>
                            <h1>_TimChen </h1>
                            <p class="text-color-999"></p>
                            <p class="aw-user-flag">
							 	我就是小强
                            </p>
                        </div>
                        <div class="mod-footer">
                            <ul class="nav nav-tabs aw-nav-tabs hidden-xs">
                                <li class="active"><a href="#questions" id="page_questions" data-toggle="tab">发问<span class="badge">2</span></a></li>
                                <li class=""><a href="#answers" id="page_answers" data-toggle="tab">回复<span class="badge">3</span></a></li>
                                <li class=""><a href="#articles" id="page_articles" data-toggle="tab">文章</a></li>
                                <li class=""><a href="#focus" id="page_focus" data-toggle="tab">关注</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end 用户数据内容 -->

                    <div class="aw-user-center-tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="questions">
                                <div class="aw-mod">
                                    <div class="mod-head">
                                        <h3>发问</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div class="aw-profile-publish-list" id="contents_user_actions_questions">	
											<div class="aw-item">
												<div class="aw-mod">
													<div class="mod-head">
														<h4 class="aw-hide-txt">
															<a href="http://wenda.bootcss.com/question/2384">人迷茫的是该干什么</a>
														</h4>
													</div>
													<div class="mod-body">
														<span class="aw-border-radius-5 count pull-left"><i class="icon icon-reply"></i>1</span>
														<p class="text-color-999">102 次浏览 • 1 个关注</p>
														<p class="text-color-999">2016-12-01 15:54</p>
													</div>
												</div>
											</div>
											<div class="aw-item">
												<div class="aw-mod">
													<div class="mod-head">
														<h4 class="aw-hide-txt">
															<a href="http://wenda.bootcss.com/question/2381">我是博斯特</a>
														</h4>
													</div>
													<div class="mod-body">
														<span class="aw-border-radius-5 count pull-left"><i class="icon icon-reply"></i>0</span>
														<p class="text-color-999">94 次浏览 • 1 个关注</p>
														<p class="text-color-999">2016-11-26 23:22</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="answers">
                                <div class="aw-mod">
                                    <div class="mod-head">
                                        <h3>回复</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div class="aw-profile-answer-list" id="contents_user_actions_answers">	
											<div class="aw-item">
												<div class="aw-mod">
													<div class="mod-head">
														<h4 class="aw-hide-txt">
															<a href="http://wenda.bootcss.com/question/2341">请问，如何用less修改bootstrap的css样式</a>
														</h4>
													</div>
													<div class="mod-body">
														<span class="aw-border-radius-5 count pull-left"><i class="icon icon-agree"></i>0</span>
														<p class="text-color-999">test</p>
														<p class="text-color-999">2016-12-04 23:06</p>
													</div>
												</div>
											</div>
											<div class="aw-item">
												<div class="aw-mod">
													<div class="mod-head">
														<h4 class="aw-hide-txt">
															<a href="http://wenda.bootcss.com/question/2384">人迷茫的是该干什么</a>
														</h4>
													</div>
													<div class="mod-body">
														<span class="aw-border-radius-5 count pull-left"><i class="icon icon-agree"></i>0</span>
														<p class="text-color-999">test</p>
														<p class="text-color-999">2016-12-04 23:05</p>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="articles">
                                <div class="aw-mod">
                                    <div class="mod-head">
                                        <h3>文章</h3>
                                    </div>
                                    <div class="mod-body">
                                        <div class="aw-profile-publish-list" id="contents_user_actions_articles"><p style="padding: 15px 0" align="center">没有内容</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="focus">
                                <!-- 自定义切换 -->
                                <div class="aw-mod">
                                    <div class="aw-tabs text-center">
                                        <ul>
                                            <li class="active"><a>关注的人</a></li>
                                            <li><a>关注者</a></li>
                                            <li><a>关注的话题</a></li>
                                        </ul>
                                    </div>
                                    <div class="mod-body">
                                        <div class="aw-tab-content">
                                            <div class="aw-mod aw-user-center-follow-mod">
                                                <div class="mod-body">
                                                    <ul id="contents_user_follows" class="clearfix"><p style="padding: 15px 0" align="center">没有内容</p></ul>
                                                </div>
                                            </div>
                                            <div class="aw-mod aw-user-center-follow-mod hide">
                                                <div class="mod-body">
                                                    <ul class="clearfix" id="contents_user_fans"><p style="padding: 15px 0" align="center">没有内容</p></ul>
                                                </div>
                                            </div>
                                            <div class="aw-mod aw-user-center-follow-mod hide">
                                                <div class="mod-body">
                                                    <ul id="contents_user_topics" class="clearfix">
														<li>
															<div class="mod-head">
																<a class="aw-topic-img pull-left aw-border-radius-5" data-id="446" href="http://wenda.bootcss.com/topic/boostrap+validator">
																	<img src="http://wenda.bootcss.com/static/common/topic-mid-img.png" alt="boostrap validator">
																</a>
																<p><a class="aw-topic-name" data-id="446" href="http://wenda.bootcss.com/topic/boostrap+validator"><span>boostrap validator</span></a></p>
															</div>
															<div class="mod-footer">
																<p class="aw-user-center-follow-meta">
																	3 个讨论			 • 
																	2 个关注		
																</p>
															</div>
														</li>
													</ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end 自定义切换 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
	<script>
		
	</script>
</body>
</html>
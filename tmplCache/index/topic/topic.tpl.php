<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>问答社区</title>
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
  </head>
  <body>
    <!-- start navigation -->
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/nav.tpl.php"); ?>
    <!--container -->
	<div class="aw-container-wrap">
		<div class="container">
			<div class="row">
				<div class="aw-content-wrap clearfix" id="content">
				  	<script type="text/html" id="sub">
					<div class="col-sm-12 col-md-9 aw-main-content">
						<div class="aw-mod aw-topic-detail-title">
							<div class="mod-body">
								<img src="home/topicImg/topicImg_<?=$_GET['tpId']?>.jpg" alt="问题" style="width: 50px;height: 50px;">
								<h2 class="pull-left">{{topic['tpName']}}</h2>
								<div class="aw-topic-operate text-color-999" data-id=<?=$_GET['tpId']?>>
									<a href="javascript:;" onclick="AWS.User.follow($(this), 'topic','<?=$_GET['tpId']?>');" class="follow btn btn-normal btn-success"><span>关注</span></a>
								</div>
							</div>
						</div>

						<div class="aw-mod aw-topic-list-mod">
							<div class="mod-head">
								<div class="tabbable">
									<!-- tab 切换 -->
									<ul class="nav nav-tabs aw-nav-tabs hidden-xs">
										<li class="active"><a href="#all" data-toggle="tab">全部内容</a></li>
										<li><a href="#best_answers" data-toggle="tab">精华</a></li>
										<li><a href="#recommend" data-toggle="tab">推荐</a></li>
										<li><a href="#articles" data-toggle="tab">文章</a></li>
									</ul>
									<!-- end tab 切换 -->
								</div>
							</div>
							<div class="mod-body">
								<!-- tab 切换内容 -->
								<div class="tab-content">
									<div class="tab-pane active" id="all">
										<!-- 推荐问题 -->
										<div class="aw-mod">
											<div class="mod-body">
												<div class="aw-common-list" id="c_all_list">
													{{each questions as item i}}
													<div class="aw-item" data-topic-id="156,">
														<a class="aw-user-name hidden-xs" data-id="3349" href="/index.php?module=user&action=people&id={{item['strUserId']}}" rel="nofollow">
														  <img src="home/userImg/user-{{item['strUserId']}}.jpg" alt="">
														</a>	
														<div class="aw-question-content">
															<h4>
																<a href="/index.php?module=question&action=question&id={{item['qsId']}}">
																	{{item['qsTitle']}}
																</a>
															</h4>
																	<a href="/index.php?module=question&action=question&id={{item['qsId']}}" class="pull-right text-color-999">回复</a>
															<p>
																<a href="/index.php?module=user&action=people&id={{item['strUserId']}}" class="aw-user-name">{{item['strName']}}</a> 
																<span class="text-color-999">发起了问题 • 1 人关注 • 10 个回复 • {{item['qsCreateTime']}} 
																</span>
															</p>
														</div>
													</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane" id="best_answers">
										<div class="aw-feed-list" id="c_best_question_list">
											<div class="mod-body">
											</div>
										</div>
									</div>

									<div class="tab-pane" id="recommend">
										<div class="aw-mod">
											<div class="mod-body">
												<div class="aw-common-list" id="c_recommend_list">
											    </div>
											</div>
										</div>
									</div>

									<div class="tab-pane" id="articles">
										<!-- 动态首页&话题精华模块 -->
										<div class="aw-mod">
											<div class="mod-body">
												<div class="aw-common-list" id="c_articles_list">
												</div>
											</div>
										</div>
										<!-- end 动态首页&话题精华模块 -->
									</div>
								</div>
								<!-- end tab 切换内容 -->
							</div>
						</div>
					</div>

					<!-- 侧边栏 -->
					<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs">
						<!-- 话题描述 -->
						<div class="aw-mod aw-text-align-justify">
							<div class="mod-head">
								<h3>话题描述</h3>
							</div>
							<div class="mod-body">
								{{topic['tpDetail']}}
							</div>
						</div>
						<!-- end 话题描述 -->

						<!-- xx人关注该话题 -->
						<div class="aw-mod topic-status">
							<div class="mod-head">
								<h3>关注该话题用户</h3>
							</div>
							<div class="mod-body">
								<div id="focus_users" class="aw-border-radius-5">
									<a href="#">
									<img src="http://wenda.bootcss.com/static/common/avatar-mid-img.png" alt="joebnb"></a>
								    <a href="#">
								    <img src="http://wenda.bootcss.com/static/common/avatar-mid-img.png" alt="zhou"></a> 
								    <a href="#">
								    <img src="http://wenda.bootcss.com/uploads/avatar/000/00/17/87_avatar_mid.jpg" alt="小郁闷儿">
								    </a> 
							    </div>
							</div>
						</div>
						<!-- end xx人关注该话题 -->
					</div>
					<!-- end 侧边栏 -->
					</script>
				</div>
			</div>
		</div>
	</div>
	<!--end container -->
	<!-- foot -->
	<footer style="margin-top: 70px;margin-bottom: 30px">
	   <div class="container">
		  <div class="row footer-bottom">
		      <ul class="list-inline text-center">
		        <li>© 2016问答社区</a></li><li>陈飞艇 • 社区指南 • 联系我们</li>
		      </ul>
	      </div>
	   </div>
	</footer>
    <!-- foot -->
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
    	$(document).ready(function(){

    		$.post('/index.php?module=sql&action=topicQuestions&id=<?=$_GET['tpId']?>',function(result){
    			if (result != null) {
    				var data = {
    					questions:result.questions,
    					topic:result.topic
    				}
    				var html = template('sub',data);
    				$('#content').append(html);
    			}
    		    AWS.Init.init_focus_btn('.aw-topic-operate','topic');

    		},'json')
    		


        });
    </script>
  </body>
</html>

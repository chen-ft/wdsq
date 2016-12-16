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
	  <div class="container" >
	    <div class="row">
	      <div class="aw-content-wrap clearfix" >
	        <div class="col-sm-12 col-md-8 aw-main-content">
	          <div class="aw-mod clearfix">
		          <!-- tab切换 -->
		          <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
		          	<li><a href="#">写文章</a></li>
		          	<li><a href="/index.php?module=index&action=answer">回答</a></li>
		          	<h2 class="hidden-xs"><i class="fa fa-list-ul"></i> 动态</h2>
		          </ul>
		          <!-- end tab切换 -->
		          <!-- 问答列表 -->
		          <div class="mod-body aw-feed-list clearfix" id="main_contents">
	          			<script type="text/html" id="qList">
	          			   {{each list as item i}}
	          			    <div class="aw-item " data-history-id="">
	          			      	<div class="mod-head">
		          					<a data-id={{item['tpId']}}  class="aw-user-img aw-border-radius-5 pull-right" href="/index.php?module=topic&action=topic&tpId={{item['tpId']}}" rel="nofollow">
		          						<img src="home/topicImg/topicImg_{{item['tpId']}}.jpg"/>
		          					</a> 
		          					<p class="text-color-999">
		          						来自话题•  <a data-id={{item['tpId']}} class="
		          						aw-topic-name" href="/index.php?module=topic&action=topic&tpId={{item['tpId']}}">{{item['tpName']}}</a>
		          					    <span class="pull-right more-operate"><a class="text-color-999" href="javascript:;" onclick="AWS.User.noinstrest($(this))">不感兴趣</a></span>
		          					</p>
	          						<h4>
	          							<a href="/index.php?module=question&action=question&id={{item['qsId']}}">{{item['qsTitle']}}
	          							</a>
	          						</h4>
	          			      	</div>
	          			      	{{if item['strUserId']}}
	          			      	<div class="mod-body ">
	          			      		<span>
	          							<a class="text-user-name" data-id={{item['strUserId']}} href="/index.php?module=user&action=people&userId={{item['strUserId']}}" style="font-weight:bold;color:#222">{{item['strName']}}</a> •                  
	          							<small>{{item['strDetail']}}</small>
	          						</span>
	          						<div class="media" style="margin-top: 2px;" >
	          							{{if item['strAnsImg']}}
	          							<div class="media-left">
	          								<a href="#">
	          								<img style="width: 198px;height: 115px;border-radius: 3px; " class="media-object" src={{item['strAnsImg']}} alt="...">
	          								</a>
	          							</div>
	          							{{/if}}
	          							<div class="media-body">
	          							{{item['shutAnsContent']}}
	          							</div>
	          						</div>
	          			      	</div>
	          			      	{{/if}}
	          				</div>
	          			   {{/each}}
	          			</script>
		          </div>
		          <div class="mod-footer">
		          	<!-- 加载更多内容 -->
		          	<a id="bp_more" class="aw-load-more-content" data-page="2" onclick="AWS.add_more($(this),'fcQues')">
		          		<span>更多</span>
		          	</a>
		          	<!-- end 加载更多内容 -->
		          </div>
		          <!-- end 问答列表 -->
	          </div>
	        </div> <!--end main-content -->
	        <div class="col-md-1"></div>
	        <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
	            <div class="aw-mod side-nav">
	              <div class="mod-body">
					<ul>
						<li><a href="/index.php?module=question&action=focusQues" rel="all__focus"><i class="icon icon-check"></i>我关注的问题</a></li>
						<li><a href="/index.php?module=topic&action=focusTic" rel="focus_topic__focus"><i class="icon icon-mytopic"></i>我关注的话题</a></li>
						<li><a href="#" rel="invite_list__invite"><i class="icon icon-invite"></i>邀请我回复的问题</a></li>
					</ul>
				  </div>
                </div>
	        	<div class="aw-mod aw-text-align-justify">
	        		<div class="mod-head">
	        			<a href="/index.php?module=topic&action=allTopic" class="pull-right">更多 &gt;</a>
	        			<h3>热门话题</h3>
	        		</div>
	        		<div class="mod-body">
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="#"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="#" class="text" data-id="3">教育</a>
	        						</span>
	        					</p>
	        					<p><b>44</b> 个问题, <b>7</b> 人关注</p>
	        				</dd>
	        			</dl>
	        		</div>
	        	</div>
	         </div>
	      </div>
	    </div> 
	  </div>
	</div>
	<!--end container -->
	<?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php")?>
	
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
    	$('#main_contents').append('<p style="padding: 15px 0" align="center"><img src="home/lunt/css/img/loading_b.gif" alt="" /></p>');
	    $.ajax({
	          type     : 'post',
	          dataType : 'json',
	          url      : '/index.php?module=sql&action=loadData',
	          data     : {'page':'1'},
	          success  : function(data){
	                var content={
	                    list : data,
	                };
	                var html = template('qList',content);
	                template.config("escape", false);
	                $('#main_contents').html(html);
	            }
	     });
    </script>
  </body>
</html>

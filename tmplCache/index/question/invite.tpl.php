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
		          	<h2 class="hidden-xs"><i class="fa fa-list-ul"></i> 邀请我回复的问题</h2>
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
		          						邀请来自•  <a data-id={{item['strInviteId']}} class="
		          						aw-topic-name" href="javascript:void(0)">{{item['strName']}}</a>
		          					    <span class="pull-right more-operate"><a class="text-color-999" href="javascript:;" onclick="AWS.User.noinstrest($(this))">不感兴趣</a></span>
		          					</p>
	          						<h4>
	          							<a href="/index.php?module=question&action=question&id={{item['qsId']}}">{{item['qsTitle']}}
	          							</a>
	          						</h4>
	          			      	</div>
	          				</div>
	          			   {{/each}}
	          			</script>
		          </div>
		          <div class="mod-footer">
		          	<!-- 加载更多内容 -->
		          	<a id="bp_more" class="aw-load-more-content" data-page="2" onclick="AWS.add_more($(this),'invite')">
		          		<span>更多</span>
		          	</a>
		          	<!-- end 加载更多内容 -->
		          </div>
		          <!-- end 问答列表 -->
	          </div>
	        </div> <!--end main-content -->
	        <div class="col-md-1"></div>
	        <?php $this->loadTmplate(TEMPLATE_PATH . "public/right.tpl.php")?>
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
	          url      : '/index.php?module=sql&action=loadInvite',
	          data     : {'page':'1'},
	          success  : function(data){
	                var content={
	                    list : data,
	                };
	                var html = template('qList',content);
	                $('#main_contents').html(html);
	            }
	     });
    </script>

  </body>
</html>

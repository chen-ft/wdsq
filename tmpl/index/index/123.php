<?php
try {
	$pdo = new PDO('mysql:host=120.27.103.38;dbname=wdsq','xwsd','xwsdliu2016');
	$pdo->query('set names utf8');
	$rs = $pdo->prepare('select * from qs_content');
	$rs->execute();

	while ( $row = $rs->fetchAll(PDO::FETCH_NUM)) {
		$array  = $row;
	}

} catch (PDOException $e) {
	$e->getMessage();
}
foreach ($array as $key => $value) {
	$text = strip_tags($value['6']);
	$array[$key]['10'] = mb_substr($text,'0','130','utf-8').'...'; 
}
$dataJson = json_encode($array);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
	<div class="aw-container-wrap" >
	  <div class="container" >
	    <div class="row">
	      <div class="aw-content-wrap clearfix" >
	        <div class="col-sm-12 col-md-9 aw-main-content">
	          <!-- tab切换 -->
	          <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
	          	<li><a href="http://wenda.ghostchina.com/sort_type-unresponsive">写文章</a></li>
	          	<li><a href="/index.php?module=index&action=answer">回答</a></li>
	          	<li class=""><a href="">提问</a></li>
	          	<h2 class="hidden-xs"><i class="fa fa-list-ul"></i> 动态</h2>
	          </ul>
	          <!-- end tab切换 -->
	          <!-- 问答列表 -->
	          <div class="aw-mod aw-explore-list">
	          	<div class="mod-body">
	          		<div class="aw-common-list">
	          			<script type="text/html" id="qList">
	          			    {{each list as item i}}
	          			      <div class="aw-item " data-topic-id="">
	          					<a class="aw-user-name hidden-xs" data-id="457" href="#" rel="nofollow"><img src="http://wenda.ghostchina.com/uploads/avatar/000/00/04/57_avatar_max.jpg" data-toggle="popover" tit={{item['1']}} /></a> 
	          					<div class="aw-question-content">
	          						<span>来自话题•   <a tit={{item['1']}} class="aw-topic-name" href="#"  data-toggle="popover" >{{item['1']}}</a>
	          						</span>  
	          						<div class="pull-right aw-feed-list">
	          							<span class="operate">
	          								<a class="aw-add-comment">
	          									<i class="fa fa-thumbs-o-up " data-placement="right" title="" data-toggle="tooltip" data-original-title="赞同回复"></i>
	          									<b class="count">10</b>
	          								</a>
	          							</span>
	          						</div>
	          						<h4>
	          							<a href="http://wenda.ghostchina.com/question/208">{{item['2']}}</a>
	          						</h4>

	          						<p>
	          							<a href="http://wenda.ghostchina.com/people/ghostchina" class="aw-user-name" data-id="1309">{{item['3']}}</a> •                  
	          							<small>{{item['4']}}</small>
	          						</p>
	          						<div class="media">
	          							<div class="media-left">
	          								<a href="#">
	          								<img style="width: 198px;height: 115px;border-radius: 3px; " class="media-object" src={{item['5']}} alt="...">
	          								</a>
	          							</div>
	          							<div class="media-body">
	          							{{item['10']}}
	          								<a href="">显示全部</a>
	          							</div>
	          						</div>
	          						<p style="margin-top: 8px">
	          							<a data-id="208" data-type="question" class="aw-add-comment text-color-999" data-comment-count="0" data-first-click="hide"><i class="fa fa-plus"></i> 添加关注</a>
	          							•                  <a data-id="208" data-type="question" class="aw-add-comment text-color-999" data-comment-count="0" data-first-click="hide"><i class="fa fa-comment-o"></i>{{item['7']}}</a>
	          							<span class="text-color-999"> • 作者保留权利 </span>
	          						</p>
	          					</div>
	          				</div>
	          			    {{/each}}
	          			</script>
	          		</div>
	          	</div>
				<div class="mod-footer">
					<!-- 加载更多内容 -->
					<a id="bp_more" class="aw-load-more-content" data-page="2">
						<span>更多</span>
					</a>
					<!-- end 加载更多内容 -->
				</div>
	          </div>
	          <!-- end 问答列表 -->
	        </div> <!--end main-content -->
	        <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
	            <div class="aw-mod side-nav">
	              <div class="mod-body">
					<ul>
						<li><a href="http://wenda.bootcss.com/home/#draft_list__draft" rel="draft_list__draft"><i class="icon icon-draft"></i>我的草稿</a></li>
						<li><a href="http://wenda.bootcss.com/favorite/"><i class="icon icon-favor"></i>我的收藏</a></li>
						<li><a href="http://wenda.bootcss.com/home/#all__focus" rel="all__focus"><i class="icon icon-check"></i>我关注的问题</a></li>
						<li><a href="http://wenda.bootcss.com/home/#focus_topic__focus" rel="focus_topic__focus"><i class="icon icon-mytopic"></i>我关注的话题</a></li>
						<li><a href="http://wenda.bootcss.com/home/#invite_list__invite" rel="invite_list__invite"><i class="icon icon-invite"></i>邀请我回复的问题</a></li>
					</ul>
				  </div>
                </div>
	        	<div class="aw-mod aw-text-align-justify">
	        		<div class="mod-head">
	        			<a href="http://wenda.golaravel.com/topic/channel-hot" class="pull-right">更多 &gt;</a>
	        			<h3>热门话题</h3>
	        		</div>
	        		<div class="mod-body">
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="http://wenda.golaravel.com/topic/Laravel教程"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="http://wenda.golaravel.com/topic/Laravel教程" class="text" data-id="3">Laravel教程</a>
	        						</span>
	        					</p>
	        					<p><b>44</b> 个问题, <b>7</b> 人关注</p>
	        				</dd>
	        			</dl>
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="http://wenda.golaravel.com/topic/Composer"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="http://wenda.golaravel.com/topic/Composer" class="text" data-id="24">Composer</a>
	        						</span>
	        					</p>
	        					<p><b>63</b> 个问题, <b>11</b> 人关注</p>
	        				</dd>
	        			</dl>
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="http://wenda.golaravel.com/topic/laravel"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="http://wenda.golaravel.com/topic/laravel" class="text" data-id="57">laravel</a>
	        						</span>
	        					</p>
	        					<p><b>229</b> 个问题, <b>34</b> 人关注</p>
	        				</dd>
	        			</dl>
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="http://wenda.golaravel.com/topic/登录验证"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="http://wenda.golaravel.com/topic/登录验证" class="text" data-id="64">登录验证</a>
	        						</span>
	        					</p>
	        					<p><b>4</b> 个问题, <b>1</b> 人关注</p>
	        				</dd>
	        			</dl>
	        			<dl>
	        				<dt class="pull-left aw-border-radius-5">
	        					<a href="http://wenda.golaravel.com/topic/Guard"><img alt="" src="http://wenda.golaravel.com/static/common/topic-mid-img.png"></a>
	        				</dt>
	        				<dd class="pull-left">
	        					<p class="clearfix">
	        						<span class="topic-tag">
	        							<a href="http://wenda.golaravel.com/topic/Guard" class="text" data-id="1148">Guard</a>
	        						</span>
	        					</p>
	        					<p><b>1</b> 个问题, <b>1</b> 人关注</p>
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
    		$('.summernote').summernote({
    			  toolbar: [
				    ['style', ['bold', 'italic', 'underline']],
				    ['insert',['picture','video']],
				    ['fontsize', ['fontsize']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['music',['codeview','fullscreen']]
                  ]
    		});
    		$('.note-editable').focus(function(){
    			$('.note-editable span').empty();
    		});

    		$('.select2').select2();

	    	var content={

	    		list : <?=$dataJson?>,
	    	}
	    	var html = template('qList',content);
	    	$('.aw-common-list').html(html);

	    	$('[data-toggle="popover"]').each(function(){
	    		var obj = $(this);
	    		var tit = obj.attr('tit');
	    		obj.popover({
	    			html:'true',
	    		    placement:'bottom',
	    			trigger:'hover',
	    			title:'<div class="aw-common-list"><div class="aw-item"><a class="aw-user-name"><img src="http://wenda.ghostchina.com/uploads/avatar/000/00/04/57_avatar_max.jpg"/></a><div class="aw-question-content"><h4>'+tit+'</h4><span>	给大家介绍国内20几家可以住宿过夜的特色人文书店</span></div></div></div>',
	    			content:ContentMethod(),
	    			container:'body',
	    			delay: {show: 200}
	    		});
	    	});
	    	awe.show_card_box('.operate');
        });
    		function ContentMethod() {
				return '<div>'+
				       '<a style="padding-right:20px"><span style="positon:">问题: </span><span>186K</span></a>'+
				       '<a style="padding-right:20px"><span>关注者: </span><span>56M</span></a>'+
				       '<button class="btn btn-primary">关注</button>'+
		               '</div>';
		      }
		      var awe = {
		      	show_card_box:function(selector){
		      		$(document).on('click',selector,function(){
		      			 var _this = $(this);
		      			alert(_this.offset().top);
		      		})

		      }
		      }
		      
    </script>
  </body>
</html>

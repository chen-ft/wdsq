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
	<div class="aw-container-wrap">
	  <div class="container" >
	    <div class="row">
	      <div class="aw-content-wrap clearfix" >
	        <div class="col-sm-12 col-md-8 aw-main-content">
	          <div class="aw-mod clearfix">
		          <!-- tab切换 -->
		          <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
		          	<h2 class="hidden-xs"><i class="fa fa-list-ul"></i> 话题广场</h2>
		          </ul>
		          <!-- end tab切换 -->
		          <div class="aw-mod aw-topic-list">
		          	 <div class="mod-body clearfix" id="topic">
		          	 	<script type="text/html" id="sub">
		          	 		{{each list as item i}}
			          	 	<div class="aw-item">
	                            <!-- 话题图片 -->
	                            <a class="img aw-border-radius-5" href="/index.php?module=topic&action=topic&tpId={{item['tpId']}}" >
	                                <img src="home/topicImg/topicImg_{{item['tpId']}}.jpg" alt="" style="width: 55px;height: 55px;">
	                            </a>
	                            <!-- end 话题图片 -->
	                            <p class="clearfix">
	                                <!-- 话题内容 -->
	                                <span class="topic-tag" data-id="5">
	                                    <a class="text" href="#">{{item['tpName']}}</a>
	                                </span>
	                                <!-- end 话题内容 -->
	                            </p>
	                            <p class="text-color-999">
	                               {{item['stortDetail']}}                              
	                            </p>
	                        </div>
	                        {{/each}}
		          	 	</script>
		          	 </div>
		          </div>
	          </div>
	        </div> <!--end main-content -->
	        <div class="col-md-1"></div>
	        <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
	            <div class="aw-mod side-nav">
	              <div class="mod-body">
					<ul>
					<li><a href="index.php?module=question&action=focusQues"><i class="icon icon-check"></i>我关注的问题</a></li>
 					<li><a href="/index.php?module=topic&action=focusTic"><i class="icon icon-mytopic"></i>我关注的话题</a></li>
 					<li><a href="index.php?module=question&action=invite"><i class="icon icon-invite"></i>邀请我回复的问题</a></li>
					</ul>
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
    		$.post('/index.php?module=sql&action=allTopics',function(result){
    			console.log(result);
    			if (result != null) {
    				var data = {
    					list:result
    				}
    				var html = template('sub',data);
    				$('#topic').append(html);
    			}


    		},'json')
    		

        });
    </script>
  </body>
</html>

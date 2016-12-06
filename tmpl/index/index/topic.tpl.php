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
		          	 <div class="mod-body clearfix">
		          	 	<div class="aw-item">
                            <!-- 话题图片 -->
                            <a class="img aw-border-radius-5" href="http://wenda.bootcss.com/topic/bootstrap" data-id="5">
                                <img src="http://wenda.bootcss.com/uploads/avatar/000/00/27/36_avatar_mid.jpg" alt="">
                            </a>
                            <!-- end 话题图片 -->
                            <p class="clearfix">
                                <!-- 话题内容 -->
                                <span class="topic-tag" data-id="5">
                                    <a class="text" href="http://wenda.bootcss.com/topic/bootstrap">bootstrap</a>
                                </span>
                                <!-- end 话题内容 -->
                            </p>
                            <p class="text-color-999">
                               游戏 是一种基于物质满足之上的，在一种特定时间、空间范围内遵循…                               
                            </p>
                        </div>
                        <div class="aw-item">
                            <!-- 话题图片 -->
                            <a class="img aw-border-radius-5" href="http://wenda.bootcss.com/topic/bootstrap" data-id="5">
                                <img src="http://wenda.bootcss.com/uploads/avatar/000/00/27/36_avatar_mid.jpg" alt="">
                            </a>
                            <!-- end 话题图片 -->
                            <p class="clearfix">
                                <!-- 话题内容 -->
                                <span class="topic-tag" data-id="5">
                                    <a class="text" href="http://wenda.bootcss.com/topic/bootstrap">bootstrap</a>
                                </span>
                                <!-- end 话题内容 -->
                            </p>
                            <p class="text-color-999">
                               游戏 是一种基于物质满足之上的，在一种特定时间、空间范围内遵循…                               
                            </p>
                        </div>
                        <div class="aw-item">
                            <!-- 话题图片 -->
                            <a class="img aw-border-radius-5" href="http://wenda.bootcss.com/topic/bootstrap" data-id="5">
                                <img src="http://wenda.bootcss.com/uploads/avatar/000/00/27/36_avatar_mid.jpg" alt="">
                            </a>
                            <!-- end 话题图片 -->
                            <p class="clearfix">
                                <!-- 话题内容 -->
                                <span class="topic-tag" data-id="5">
                                    <a class="text" href="http://wenda.bootcss.com/topic/bootstrap">bootstrap</a>
                                </span>
                                <!-- end 话题内容 -->
                            </p>
                            <p class="text-color-999">
                               游戏 是一种基于物质满足之上的，在一种特定时间、空间范围内遵循…                               
                            </p>
                        </div>
		          	 </div>
		          </div>
	          </div>
	        </div> <!--end main-content -->
	        <div class="col-md-1"></div>
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
	        </div>
	      </div>
	    </div> 
	  </div>
	</div>
	<!--end container -->
	<!-- 弹出框 -->
	<div class="aw-ajax-box" id="aw-ajax-box">
		<div id="aw-card-tips" class="aw-card-tips aw-card-tips-user" style="left: 215.5px; top: 244px; display: none;">
			<div class="aw-mod">
				<div class="mod-head">
				    <a href="" class="img">
				    	<img src="http://wenda.bootcss.com/uploads/avatar/000/00/27/36_avatar_mid.jpg">
				    </a>
				    <p class="title clearfix" data-id="12345">
						<a href="" class="name pull-left">陈飞艇</a>
						<i class="pull-left"></i>
				    </p>
				    <p class="aw-user-center-follow-meta">
				    	<span>短租民宿分享预订平台</span>
				    </p>
				</div>
				<div class="mod-body"></div>
				<div class="mod-footer clearfix">
					<a onclick="" class="item">
						<span class="value">184K</span>
						<span class="key">问题</span>
					</a>
					<a onclick="" class="item">
						<span class="value">184K</span>
						<span class="key">问题</span>
					</a>
					<a class="btn btn-normal btn-success btn-sm follow pull-right">
						<span>关注</span>
						<em>|</em>
						<b>0</b>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- 弹出框 -->
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


	    	AWS.show_card_box('.aw-user-img','user');

	        //小卡片mouseover
		    $(document).on('mouseover', '#aw-card-tips', function ()
		    {
		        clearTimeout(AWS.G.card_box_hide_timer);
		        
		        $(this).show();
		    });

		    //小卡片mouseout
		    $(document).on('mouseout', '#aw-card-tips', function ()
		    {
		        $(this).hide();
		    });

        });
    		
		    var AWS = {
		      	show_card_box:function(selector,type,time){
		      		if(!time){
		      			var time = 300;
		      		}

		      		$(document).on('mouseover',selector,function(){
		      			var _this = $(this);
		      			clearTimeout(AWS.G.card_box_hide_timer);

		      			AWS.G.card_box_show_timer = setTimeout(function(){
		      				switch(type){
		      					case 'user':
		      						if (AWS.G.cashUserData.length == 0) {
		      							_getdata();
		      						}else{
		      							var flag = 0;
		      							_checkcash('user');
		      							if (flag == 0) {
		      								_getdata();

		      							}
		      						}
		      					break;

		      				}

		      				function _getdata(){ //获取数据
		      					if (type = 'user') {
		      						_init();
		      						AWS.G.cashUserData.push($('#aw-ajax-box').html());
		      					}

		      				}

		      				function _checkcash(type){  //检测缓存
		      					if (type == 'user') {
		      						$.each(AWS.G.cashUserData,function(i,obj){
		      							if (obj.match('data-id="'+12345+'"')) {
		      								$('#aw-ajax-box').html(obj);
		      								$('#aw-card-tips').removeAttr('style');
		      								_init();
		      								flag = 1;
		      							}
		      						});
		      					}
		      				}

				      		function _init(){ //初始化元素的位置
				      			var top = _this.offset().top + _this.height() + 5,
				      				left = _this.offset().left,
				      				nTop = _this.offset().top - $(window).scrollTop();

				      			// 判断下遍距离不足的情况
				      			if ( $(window).height() - nTop < $('#aw-card-tips').innerHeight()) {
				      				// 不足弹出框将浮在元素上方
				      				top = _this.offset().top - ($('#aw-card-tips').innerHeight()) -10;
				      			}
				      			// 判断右边距离不足
				      			if ( $(window).width() - left < $('#aw-card-tips').innerWidth()) {
				      				left = left - $('#aw-card-tips').innerWidth() + _this.innerWidth();
				      			}

				      			$('#aw-card-tips').css({left:left,top:top}).fadeIn(); 
				      		}
		      			},time);
		      			
		      		}); //mouseover

		      		$(document).on('mouseout',selector,function(){
		      			clearTimeout(AWS.G.card_box_show_timer);

		      		    AWS.G.card_box_hide_timer = setTimeout(function(){
		      				$('#aw-card-tips').fadeOut();
		      			},600);
		      			

		      		});


		      }
		    }
		     // 全局变量
			AWS.G =
			{
				cashUserData: [],
				cashTopicData: [],
				card_box_hide_timer: '',
				card_box_show_timer: '',
				dropdown_list_xhr: '',
				loading_timer: '',
				loading_bg_count: 12,
				loading_mini_bg_count: 9,
				notification_timer: ''
			}
		      
    </script>
  </body>
</html>

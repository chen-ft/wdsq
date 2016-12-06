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
    <meta charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>回答</title>
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
            <div class="col-sm-12 col-md-8 aw-main-content">
              <div class="aw-mod clearfix">
                  <ul class="nav nav-tabs aw-nav-tabs">
                    <li role="presentation" class="active"><a href="javascript:void(0)">为你推荐</a></li>
                    <li role="presentation"><a href="/index.php?module=index&action=hot">全站热门</a></li>
                    <li role="presentation"><a href="/index.php?module=index&action=invite">邀请回答</a></li>
                  </ul>
                  <div class="demo">     
                    <div class="plus-tag tagbtn clearfix" id="myTags" ></div>
                    <div class=" clearfix" style="height:40px;margin-bottom: 15px;" id="tag1">添加你擅长的话题，为你推荐可能感兴趣的问题
                    </div>
                    <div class="plus-tag-add">
                        <form id="" action="" class="login">
                            <ul class="Form FancyForm" style="margin-top: 10px;">
                                <li>
                                    <label style="left: 0"><select id="single" style="width: 200px;height: 49px"></select></label>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-success" style="font-size:14px;">添加话题</button>
                                </li>
                            </ul>
                        </form>
                    </div><!--plus-tag-add end-->
                </div>
                  <!-- 问答列表 -->
                  <div class="mod-body aw-feed-list clearfix" id="main_contents">
                        <script type="text/html" id="qList">
                           <hr>
                           {{each list as item i}}
                            <div class="aw-item" data-topic-id="">
                                <div class="mod-head" style="padding-left: 0">
                                    <p class="text-color-999">
                                        来自话题•   
                                       <a class="aw-topic-name" href="#" >{{item['1']}}</a>
                                       <span class="pull-right more-operate"><a class="text-color-999" href="javascript:;" onclick="">不感兴趣</a></span>
                                    </p>
                                    <h4>
                                        <a href="http://wenda.ghostchina.com/question/208">{{item['2']}}</a>
                                    </h4>
                                </div>
                                <div class="mod-body clearfix">
                                </div>
                                <div class="mod-footer" style="padding-left: 0">
                                    <div class="meta clearfix">
                                        <p>
                                           <a href="#" onclick="" class="text-color-999"> 3个回答
                                           </a> •    
                                           <a href="#" onclick="" class="text-color-999"> 11人关注
                                           </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                           {{/each}}
                           <div class="mod-footer">
                             <!-- 加载更多内容 -->
                             <a id="bp_more" class="aw-load-more-content" data-page="2">
                                <span>更多</span>
                             </a>
                             <!-- end 加载更多内容 -->
                          </div>
                        </script>
                   </div>
                  <!-- end 问答列表 -->
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
                <div class="aw-mod interest-user">
                    <div class="mod-head">
                    <a href="#" class="pull-right">换一换</a>
                        <h3>可能感兴趣的话题</h3>
                        </div>
                        <div class="mod-body">
                         <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/people/StaRealFeeling" data-id="2326" class="aw-user-name"><img alt="StaRealFeeling" src="http://wenda.bootcss.com/static/common/avatar-min-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="http://wenda.bootcss.com/people/StaRealFeeling" data-id="2326" class="aw-user-name"><span>StaRealFeeling</span></a>
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'user', 2326);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p class="signature"></p>
                                <p></p>
                            </dd>
                        </dl>
                                                <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/people/%E7%BE%9E%E8%8A%B1" data-id="3073" class="aw-user-name"><img alt="羞花" src="http://wenda.bootcss.com/static/common/avatar-min-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="http://wenda.bootcss.com/people/%E7%BE%9E%E8%8A%B1" data-id="3073" class="aw-user-name"><span>羞花</span></a>
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'user', 3073);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p class="signature"></p>
                                <p></p>
                            </dd>
                        </dl>
                                                <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/people/gangwan" data-id="3142" class="aw-user-name"><img alt="gangwan" src="http://wenda.bootcss.com/static/common/avatar-min-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="http://wenda.bootcss.com/people/gangwan" data-id="3142" class="aw-user-name"><span>gangwan</span></a>
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'user', 3142);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p class="signature"></p>
                                <p></p>
                            </dd>
                        </dl>
                                                <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/topic/touchspin%20vertical"><img alt="touchspin vertical" src="http://wenda.bootcss.com/static/common/topic-mid-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="http://wenda.bootcss.com/topic/touchspin%20vertical" class="text">touchspin ...</a>
                                </span>&nbsp;
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'topic', 1008);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p></p>
                            </dd>
                        </dl>
                                                <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/topic/modal%E8%A6%86%E5%B1%82%E9%81%AE%E7%9B%96"><img alt="modal覆层遮盖" src="http://wenda.bootcss.com/static/common/topic-mid-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="http://wenda.bootcss.com/topic/modal%E8%A6%86%E5%B1%82%E9%81%AE%E7%9B%96" class="text">modal覆层遮盖</a>
                                </span>&nbsp;
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'topic', 1002);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p></p>
                            </dd>
                        </dl>
                                                <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="http://wenda.bootcss.com/topic/%E5%A4%A9%E5%A4%A9"><img alt="天天" src="http://wenda.bootcss.com/static/common/topic-mid-img.png"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="http://wenda.bootcss.com/topic/%E5%A4%A9%E5%A4%A9" class="text">天天</a>
                                </span>&nbsp;
                                <a class="icon-inverse follow tooltips icon icon-plus" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="关注" onclick="AWS.User.follow($(this), 'topic', 996);AWS.ajax_request(G_BASE_URL + '/account/ajax/clean_user_recommend_cache/');"></a>
                                <p></p>
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
    		var data = [{ id: 0, text: '科学家' }, { id: 1, text: 'IT技术' }, { id: 2, text: '我们' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }, { id: 4, text: 'wontfix1' }, { id: 4, text: 'wontfix2' }, { id: 4, text: 'wontfix3' }, { id: 4, text: 'wontfix5' }, { id: 4, text: 'wontfix4' }, { id: 4, text: 'wontfix11' }, { id: 4, text: 'wontf1ix11' }, { id: 4, text: 'wont2fix11' }, { id: 4, text: 'wontf1ix11' }, { id: 4, text: '11' }];

    		$('#single').select2({
    			data: data,
 			    allowClear: true,
    		});

	    	var content={

	    		list : <?=$dataJson?>,
	    	}
	    	var html = template('qList',content);
	        $('#main_contents').html(html);
        });
    		
    </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
    <div class="aw-container-wrap">
        <div class="container">
            <div class="row">
                <div class="aw-content-wrap clearfix">
                    <div class="col-sm-12 col-md-9 aw-main-content">
                        <span id="main">
                        <script type="text/html" id="ques"> 
                        <!-- 话题bar -->
                        <div class="aw-mod aw-topic-bar" id="question_topic_editor" data-type="question">
                            <div class="tag-bar clearfix">
                                <span class="topic-tag" data-id="5">
                                    <a href="/index.php?module=topic&action=topic&tpId={{list['tpId']}}" class="text">{{list['tpName']}}</a>
                                </span>
                                
                            </div>
                        </div>
                        <!-- end 话题bar -->
                        <div class="aw-mod aw-question-detail aw-item" id="title">
                            <div class="mod-head">
                                <h1>
                                    {{list['qsTitle']}}                        
                                </h1>
                            </div>
                            <div class="mod-body">
                                <div class="content markitup-box">
                                    {{#list['qsContent']}} 
                                </div>
                            </div>
                            <div class="mod-footer">
                                <div class="meta">
                                    <span class="text-color-999">{{list['qsCreateTime']}}</span>

                                    <a data-id={{list['qsId']}} data-type="question" class="add-comment text-color-999 " data-comment-count="0"><i class="icon icon-comment"></i>添加评论</a>
                                    <a class="text-color-999 aw-invite-replay" >
                                      <i class="icon icon-invite"></i>
                                        邀请 
                                      <em class="badge badge-info">0</em>
                                    </a>
                                    <div class="pull-right more-operate">
                                        <a onclick="AWS.User.question_thanks($(this));" class="aw-icon-thank-tips text-color-999"><i class="icon icon-thank"></i>感谢</a>
                                        <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon icon-share"></i>分享                                   
                                        </a>
                                        <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                            <ul class="aw-dropdown-list">
                                                <li><a onclick="AWS.User.share_out('tsina','<?=$_SESSION['login']['strName']?>');"><i class="icon icon-weibo"></i> 新浪微博</a></li>
                                                <li><a onclick="AWS.User.share_out('qzone','<?=$_SESSION['login']['strName']?>');"><i class="icon icon-qzone"></i> QZONE</a></li>
                                                <li><a onclick="AWS.User.share_out('weixin','<?=$_SESSION['login']['strName']?>');"><i class="icon icon-wechat"></i> 微信</a></li>
                                            </ul>
                                        </div>
                                        <a class="text-color-999" onclick="AWS.dialog('report')"><i class="icon icon-report"></i>举报</a>                      
                                    </div>
                                </div>
                            </div>
                            <!-- 站内邀请 -->
                            <div class="aw-invite-box" style="display: none;">
                                <div class="mod-head clearfix">
                                    <div class="search-box pull-left">
                                        <input id="invite-input" class="form-control" type="text" placeholder="搜索你想邀请的人...">
                                        <div class="aw-dropdown">
                                            <p class="title">没有找到相关结果</p>
                                            <ul class="aw-dropdown-list"></ul>
                                        </div>
                                        <i class="icon icon-search"></i>
                                    </div>
                                    <div class="invite-list pull-left" style="display: none;">
                                        已邀请:
                                    </div>
                                </div>
                                <div class="mod-body clearfix" id="inviteGuy" data-id={{list['tpId']}}>
                                </div>
                                <div class="mod-footer">
                                    <a class="next pull-right">&gt;</a> <a class="prev active pull-right">&lt;</a>
                                </div>
                            </div>
                            <!-- end 站内邀请 -->
                        </div>
                        <!-- end 问题详细模块 -->
                        <div class="aw-mod aw-question-comment">
                            <div class="mod-head">
                                <ul class="nav nav-tabs aw-nav-tabs active">
                                    <h2 class="hidden-xs">{{ans}} 个回复</h2>
                                </ul>
                            </div>
                            <div class="mod-body aw-feed-list">
                                {{each qsComment as item i}}
                                <div class="aw-item" id="answer-{{item['strAnsId']}}">
                                    <div class="mod-head">
                                        <a class="anchor"></a>
                                        <a class="aw-user-img aw-border-radius-5 pull-right" href="#" data-id="">
                                            <img src="home/userImg/user-{{item['strUserId']}}.jpg" alt="">
                                        </a>
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="#" data-id="377">
                                                    {{item['strName']}}
                                                </a>
                                            </p>
                                            <p class="text-color-999 aw-agree-by">
                                                <span></span>
                                                {{item['strAnsAgree']}} 人赞同
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <div class="markitup-box">
                                           {{#item['strAnsContent']}}                                        
                                       </div>
                                   </div>
                                   <div class="mod-footer">
                                        <div class="meta btn-group" data-id={{item['strAnsId']}}>
                                            <a onclick="AWS.User.question_agree($(this))" class="aw-icon-agree-tips text-color-999" data-original-title="感谢热心的回复者" data-toggle="tooltip" title="" data-placement="bottom"><i class="icon icon-agree"></i>
                                                赞
                                            </a> &nbsp;&nbsp;
                                            <a class="text-color-999 add-comment" data-type="answer" data-id={{item['strAnsId']}}><i class="icon icon-comment"></i>
                                                评论
                                            </a> &nbsp;&nbsp;  
                                            <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon icon-share"></i> 分享                                                  </a>
                                            <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                                <ul class="aw-dropdown-list">
                                                    <li><a onclick="AWS.User.share_out('tsina', $(this).parents('.aw-item').find('.markitup-box').text());"><i class="icon icon-weibo"></i> 新浪微博</a></li>
                                                    <li><a onclick="AWS.User.share_out('qzone', $(this).parents('.aw-item').find('.markitup-box').text());"><i class="icon icon-qzone"></i> QZONE</a></li>
                                                    <li><a onclick="AWS.User.share_out('weixin', $(this).parents('.aw-item').find('.markitup-box').text());"><i class="icon icon-wechat"></i> 微信</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 {{/each}}
                            </div>
                            <div class="mod-footer">
                            </div>
                        </div>
                        <!-- end 问题详细模块 -->
                        </script>
                        </span>
                        <!-- 回复编辑器 -->
                        <div class="aw-mod aw-replay-box">
                            <form  onsubmit="return false;" method="post" id="answer_form">
                                <input type="hidden" name="post_hash" value="CC182456D700F977">
                                <input type="hidden" name="question_id" value="2374">
                                <input type="hidden" name="attach_access_key" value="f1f84eef080dae8a7b99a5063600aff1">
                                <div class="mod-head">
                                    <a href="http://wenda.bootcss.com/people/" class="aw-user-name"><img alt="无" src="home/userImg/user-<?=$_SESSION['login']['strUserId']?>.jpg"></a>
                                    <p>
                                        <?=$_SESSION['login']['strName']?>                           
                                    </p>
                                </div>
                                <div class="mod-body">
                                    <div class="mod-head">
                                        <div class="summer" id="answer">
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <span class="pull-right">
                                            <a type="button" onclick="AWS.ajax_post('replay',<?=$_GET['id']?>)"  class="btn btn-normal btn-success">回复</a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end 回复编辑器 -->
                    </div>
                    <!-- 侧边栏 -->
                    <div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
                        <div class="aw-mod">
                           <div class="operate clearfix">
                            <a href="javascript:;" onclick="AWS.User.follow($(this), 'question', <?=$_GET['id']?>);" class="follow btn btn-normal btn-success pull-left "><span>关注</span></a>
                            </div>
                        </div>
                        
                        <!-- 问题状态 -->
                        <div class="aw-mod question-status">
                            <div class="mod-head">
                                <h3>关注该话题用户</h3>
                            </div>
                            <div class="mod-body">
                                <ul>
                                    <li class="aw-border-radius-5" id="focus_users">
                                   	    <a href="#">
                                   	   	  <img src="http://wenda.bootcss.com/static/common/avatar-mid-img.png" class="aw-user-name" data-id="3225" alt="往事已成云烟">
                                        </a> 
                                        <a href="#">
                                   	   	  <img src="http://wenda.bootcss.com/static/common/avatar-mid-img.png" class="aw-user-name" data-id="3225" alt="往事已成云烟">
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end 问题状态 -->
                    </div>
                    <!-- end 侧边栏 -->
                     <!--end container -->
                </div>
            </div>
                 

        </div>
    </div>
    <script>
        window.QUESTION_ID = <?=$_GET['id']?>;
    </script>
   
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php")?>
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/index.php?module=sql&action=loadQuestion',
              data     : {'id':<?=$_GET['id'] ?>},
              success  : function(data){
                    var content={
                        list : data[0],
                        qsComment:data.questions,
                        ans:data.questions.length,

                    };
                    var html = template('ques',content);
                    $('#main').html(html);
                }
         });
   

        $('.summer').summernote({
          height:300,
          callbacks:{
             onImageUpload: function(files) {
                img = sendFile(files[0]); 
            }
          }
        });

        function sendFile(file) { 
            var data = new FormData();  
            data.append("file", file);
            $.ajax({  
                data: data,  
                type: 'post',  
                url: "/index.php?module=sql&action=imgUpload&qsId="+<?=$_GET['id'] ?>+"&userId="+<?=$_SESSION['login']['strUserId']?>,  
                cache: false,  
                contentType: false,  
                processData: false,  
                success: function(url) {  
                      $(".summer").summernote('insertImage', url, 'image name'); 
                }  
            });  
        }

        AWS.Init.init_focus_btn('.aw-side-bar','question');


    </script>

    <!-- 评论列表 -->
    <script type="text/html" id="commentList">
    	<ul>
	    	{{each list as item i}}
			<li>
			  <a class="aw-user-name" href="#" alt="">
			  	<img src="home/userImg/user-{{item['strUserId']}}.jpg" alt="">
			  </a>
			  <div>
			      <p class="clearfix">
			        <span class="pull-right"> 
			             <a href="javascript:;" onclick="AWS.operateReplay($(this))">回复</a>
			        </span>
			        <a href="#" class="aw-user-name author" data-id="{{item['strUserId']}}">{{item['strName']}}</a>
			      </p>
			  <p class="clearfix">{{item['strCmtContent']}}</p>
			  </div>
			</li>
			{{/each}}
		</ul>	      
    </script>

    <!-- 邀请列表 -->
    <script type="text/html" id="guyList">
        <ul>
            {{each list as item i}}
            <li style="display: list-item;">
                <a class="aw-user-img pull-left" href="/index.php?module=user&action=people$userId={{item['strUserId']}}">
                    <img class="img" alt="" src="home/userImg/user-{{item['strUserId']}}.jpg">
                </a>
                <div class="main">
                    <a class="pull-right btn btn-mini btn-success" data-qs=<?=$_GET['id']?> data-id={{item['strUserId']}} data-value={{item['strName']}} onclick="AWS.invite_user($(this),$(this).parents('li').find('img').attr('src'));">邀请</a>
                    <a class="aw-user-name" href="/index.php?module=user&action=people$userId={{item['strUserId']}}">{{item['strName']}}</a>
                    <p>
                       {{item['strDetail']}}
                    </p>
                </div>
            </li>
            {{/each}}
        </ul>
    </script>
    
    <!-- 评论框 -->
    <script type="text/html" id="commentBox">
    	 <div class="aw-comment-box" id={{comment_form_id}} style="display:none">
      		    <div class="aw-comment-list">
      			</div>
  				<form action={{comment_form_action}} method="post" onsubmit="return false">
  					<div class="aw-comment-box-main">
  						<div class="summernote">
	                    </div>
  						<textarea class="aw-comment-txt form-control" placeholder="评论一下..."  style="overflow: hidden; word-wrap: break-word; resize: none;">
  						</textarea>
  						<div class="aw-comment-box-btn">
  							<span class="pull-right">
  								<a href="javascript:;" class="btn btn-mini btn-success" onclick="AWS.form_submit($(this))">评论</a>
  								<a href="javascript:;" class="btn btn-mini btn-gray close-comment-box">取消</a>
  							</span>
  						</div>
  					</div>
  				</form>
      		</div>
    </script>
  
  </body>
</html>

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
    <div class="aw-container-wrap">
        <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 aw-main-content">
                    <span id="main">
                        
                    <script type="text/html" id="ques"> 
                    <!-- 话题bar -->
                    <div class="aw-mod aw-topic-bar" id="question_topic_editor" data-type="question" data-id="2374">
                        <div class="tag-bar clearfix">
                            <span class="topic-tag" data-id="5">
                                <a href="http://wenda.bootcss.com/topic/bootstrap" class="text">{{list['tpName']}}</a>
                            </span>
                            
                        </div>
                    </div>
                    <!-- end 话题bar -->
                    <div class="aw-mod aw-question-detail aw-item">
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

                                <a data-id="2374" data-type="question" class="aw-add-comment text-color-999 " data-comment-count="0"><i class="icon icon-comment"></i>添加评论</a>

                                <a class="text-color-999 aw-invite-replay"><i class="icon icon-invite"></i>邀请 </a>
                                
                                <div class="pull-right more-operate">
                                    <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="感谢提问者" onclick="AWS.User.question_thanks($(this), 2374);" class="aw-icon-thank-tips text-color-999"><i class="icon icon-thank"></i>感谢</a>
                                    <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon icon-share"></i>分享                                   
                                    </a>
                                    <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                        <ul class="aw-dropdown-list">
                                            <li><a onclick="AWS.User.share_out('tsina');"><i class="icon icon-weibo"></i> 新浪微博</a></li>
                                            <li><a onclick="AWS.User.share_out('qzone');"><i class="icon icon-qzone"></i> QZONE</a></li>
                                            <li><a onclick="AWS.User.share_out('weixin');"><i class="icon icon-wechat"></i> 微信</a></li>
                                        </ul>
                                    </div>
                                    <a href="javascript:;" class="text-color-999" onclick=""><i class="icon icon-report"></i>举报</a>                      
                                </div>
                            </div>
                        </div>
                        <!-- 站内邀请 -->
                        <div class="aw-invite-box " style="display: none;">
                            <div class="mod-head clearfix">
                                <div class="search-box pull-left">
                                    <input id="invite-input" class="form-control" type="text" placeholder="搜索你想邀请的人...">
                                    <div class="aw-dropdown">
                                        <p class="title">没有找到相关结果</p>
                                        <ul class="aw-dropdown-list"></ul>
                                    </div>
                                    <i class="icon icon-search"></i>
                                </div>
                                <div class="invite-list pull-left hide">
                                    已邀请:
                                </div>
                            </div>
                            <div class="mod-body clearfix">
                                <ul>
                                    <li style="display: list-item;">
                                        <a class="aw-user-img pull-left" data-id="367" href="http://wenda.bootcss.com/people/rex"><img class="img" alt="" src="http://wenda.bootcss.com/uploads/avatar/000/00/03/67_avatar_mid.jpg"></a>
                                        <div class="main">
                                            <a class="pull-right btn btn-mini btn-success" data-value="rew1011" data-id="367" onclick="AWS.User.invite_user($(this),$(this).parents('li').find('img').attr('src'));">邀请</a>
                                            
                                            <a class="aw-user-name" data-id="367" href="http://wenda.bootcss.com/people/rex">rew1011</a>
                                            <p>
                                                在 <span class="topic-tag"><a class="text" data-id="5" href="http://wenda.bootcss.com/topic/bootstrap">bootstrap</a></span> 话题下 获得 4 赞同
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mod-footer">
                                <a class="next pull-right">&gt;</a> <a class="prev active pull-right">&lt;</a>
                            </div>
                        </div>
                        <!-- end 站内邀请 -->
                        <!-- 相关链接 -->
                        <div class="aw-question-related-box hide" style="display: none;">
                            <form action="http://wenda.bootcss.com/publish/ajax/save_related_link/" method="post" onsubmit="return false" id="related_link_form">
                                <div class="mod-head">
                                    <h2>与内容相关的链接</h2>
                                </div>
                                <div class="mod-body clearfix">
                                    <input type="hidden" name="item_id" value="2374">
                                    <input type="text" class="form-control pull-left" name="link" value="http://">

                                    <a onclick="AWS.ajax_post($('#related_link_form'));" class="pull-left btn btn-success">提交</a>
                                </div>
                            </form>
                        </div>
                        <!-- end 相关链接 -->
                        </div>
                        <!-- end 问题详细模块 -->
                        <div class="aw-mod aw-question-comment">
                            <div class="mod-head">
                                <ul class="nav nav-tabs aw-nav-tabs active">
                                    <h2 class="hidden-xs">{{ans}} 个回复</h2>
                                </ul>
                            </div>
                            <div class="mod-body aw-feed-list">
                                {{each comment as item i}}
                                <div class="aw-item">
                                    <div class="mod-head">
                                        <a class="anchor" name="answer_165"></a>
                                        <a class="aw-user-img aw-border-radius-5 pull-right" href="#" data-id="">
                                            <img src="#" alt="">
                                        </a>
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="#" data-id="377">
                                                    {{item['strName']}}
                                                </a>
                                            </p>
                                            <p class="text-color-999 aw-agree-by">
                                                {{item['strAnsAttentions']}} 人赞同
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <div class="markitup-box">
                                           {{#item['strAnsContent']}}                                        
                                       </div>
                                   </div>
                                   <div class="mod-footer">
                                        <p>
                                            <a href="javascript:" onclick="" class="text-color-999 add-comment" datatype="answer"><i class="icon icon-comment"></i>
                                                1条评论
                                            </a> &nbsp;&nbsp;  
                                            <a href="javascript:" onclick="" class="text-color-999"><i class="icon icon-share"></i>
                                                分享
                                            </a> &nbsp;&nbsp; 
                                            <a href="javascript:;" onclick="AWS.User.answer_user_rate($(this), 'thanks', 1055);" class="aw-icon-thank-tips text-color-999" data-original-title="感谢热心的回复者" data-toggle="tooltip" title="" data-placement="bottom"><i class="icon icon-thank"></i>赞</a>
                                        </p>
                                    </div>
                                 </div>
                                 {{/each}}
                            </div>
                            <div class="mod-footer">
                                <div class="aw-load-more-content hide" id="load_uninterested_answers">
                                    <span class="text-color-999 aw-alert-box text-color-999" href="javascript:;" tabindex="-1" onclick="AWS.alert('被折叠的回复是被你或者被大多数用户认为没有帮助的回复');">为什么被折叠?</span>
                                    <a href="javascript:;" class="aw-load-more-content"><span class="hide_answers_count">0</span> 个回复被折叠</a>
                                </div>

                                <div class="hide aw-feed-list" id="uninterested_answers_list"></div>
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
                                    <a href="http://wenda.bootcss.com/people/" class="aw-user-name"><img alt="_TimChen" src="http://wenda.bootcss.com/static/common/avatar-mid-img.png"></a>
                                    <p>
                                        _TimChen                            
                                    </p>
                                </div>
                                <div class="mod-body">
                                    <div class="mod-head">
                                        <div class="summernote" id="answer">
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <span class="pull-right">
                                            <a type="button" onclick="AWS.ajax_post('answer_form')"  class="btn btn-normal btn-success">回复</a>
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
                        <a href="javascript:;" onclick="AWS.User.follow($(this), 'question', 2374);" class="follow btn btn-normal btn-success pull-left "><span>关注</span> <em>|</em> <b>1</b></a>
                        </div>
                    </div>

                    
                    <!-- 问题状态 -->
                    <div class="aw-mod question-status">
                        <div class="mod-head">
                            <h3>200人关注该问题</h3>
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
            </div>
        </div>
    </div>
</div>

    <!--end container -->
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/index.php?module=sql&action=loadQuestiton',
              data     : {'id':<?=$_GET['id'] ?>},
              success  : function(data){
                    var content={
                        list : data[0],
                        comment:data.questions,
                        ans:data.questions.length
                    };
                    var html = template('ques',content);
                    $('#main').html(html);
                }
         });


    </script>
  
  </body>
</html>

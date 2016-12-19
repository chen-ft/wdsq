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
                                <div class="aw-item" id={{item['strUserId']}} >
                                    <div class="mod-head" >
                                       <span class="pull-right more-operate"><a class="text-color-999" data-id={{item['strAnsId']}} onclick="delComment($(this))">删除</a></span>

                                        <a class="aw-user-img aw-border-radius-5 pull-right" href="javascript:void(0)" data-id="">
                                            <img src="home/userImg/user-{{item['strUserId']}}.jpg" alt="">
                                        </a>
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="javascript:void(0)">
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
                                 </div>
                                 {{/each}}
                            </div>
                        </div>
                        <!-- end 问题详细模块 -->
                        </script>
                        </span>
                </div>
                <!-- 侧边栏 -->
                <div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
                    <div class="aw-mod">
                       <div class="operate clearfix">
                        <a href="javascript:;" onclick="delQuestion()" class="follow btn btn-normal btn-danger pull-left "><span>删除</span></a>
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

    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
    $(function(){
        var ansId = '';
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/admin.php?module=ajax&action=editLoadQuestion',
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

    });

        function delQuestion(){
            $.post('/admin.php?module=ajax&action=delQuestion',{'id':<?=$_GET['id'] ?>},function(result){
                if (result == '0000') {
                    top.location.reload(); 
                }
            },'json');
        }

        function delComment(obj){
            var id = obj.attr('data-id');
            $.post('/admin.php?module=ajax&action=delComment',{'id':id},function(result){
                if (result == '0000') {
                    self.location.reload(); 
                }
            },'json')

        }

    </script>
  </body>
</html>

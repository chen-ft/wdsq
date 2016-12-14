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
    <div class="aw-container-wrap" >
      <div class="container" >
        <div class="row">
          <div class="aw-content-wrap clearfix" >
            <div class="col-sm-12 col-md-8 aw-main-content">
              <div class="aw-mod clearfix">
                  <ul class="nav nav-tabs aw-nav-tabs">
                    <li role="presentation" class="active"><a href="javascript:void(0)">为你推荐</a></li>
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
                           {{each list as item i}}
                            <div class="aw-item" data-topic-id="">
                                <div class="mod-head" style="padding-left: 0">
                                    <p class="text-color-999">
                                        来自话题 • <a href="/index.php?module=topic&action=topic&tpId={{item['tpId']}}">{{item['tpName']}}</a>
                                       <span class="pull-right more-operate"><a class="text-color-999" href="javascript:;" onclick="AWS.User.noinstrest($(this))">不感兴趣</a></span>
                                    </p>
                                    <h4>
                                        <a href="/index.php?module=question&action=question&id={{item['qsId']}}">{{item['qsTitle']}}</a>
                                    </h4>
                                </div>
                                <div class="mod-body clearfix">
                                </div>
                                <div class="mod-footer" style="padding-left: 0;margin-top: 4px">
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
                        <li><a href="#" rel="all__focus"><i class="icon icon-check"></i>我关注的问题</a></li>
                        <li><a href="#" rel="focus_topic__focus"><i class="icon icon-mytopic"></i>我关注的话题</a></li>
                        <li><a href="#" rel="invite_list__invite"><i class="icon icon-invite"></i>邀请我回复的问题</a></li>
                    </ul>
                  </div>
                </div>
                <div class="aw-mod interest-user">
                    <div class="mod-head">
                        <h3>可能感兴趣</h3>
                        </div>
                        <div class="mod-body">
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=topic&action=topic&tpId=10004"><img alt="" src="home/topicImg/topicImg_10004.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="/index.php?module=topic&action=topic&tpId=10004" class="text">创业</a>
                                </span>&nbsp;
                                <p></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=user&action=people&id=201001" class="aw-user-name"><img alt="小猪" src="home/userImg/user-201001.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="/index.php?module=user&action=people&id=201001" class="aw-user-name"><span>小猪</span></a>
                                <p>短租民宿分享预订平台</p>
                                <p></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=user&action=people&id=201004" class="aw-user-name"><img alt="黎明" src="home/userImg/user-201004.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="/index.php?module=user&action=people&id=201004" data-id="3142" class="aw-user-name"><span>黎明</span></a>
                                <p class="signature">我最强</p>
                                 <p></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=topic&action=topic&tpId=10001"><img alt="" src="home/topicImg/topicImg_10001.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="/index.php?module=topic&action=topic&tpId=10001" class="text">电影</a>
                                </span>&nbsp;
                                <p></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=topic&action=topic&tpId=10003"><img alt="" src="home/topicImg/topicImg_10003.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <span class="topic-tag">
                                    <a href="/index.php?module=topic&action=topic&tpId=10003" class="text">互联网</a>
                                </span>&nbsp;
                                <p></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pull-left aw-border-radius-5">
                                <a href="/index.php?module=user&action=people&id=201009" class="aw-user-name"><img alt="黎明" src="home/userImg/user-201009.jpg"></a>
                            </dt>
                            <dd class="pull-left">
                                <a href="/index.php?module=user&action=people&id=201009"  class="aw-user-name"><span>陈先生</span></a>
                                <p class="signature">呀，先生</p>
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
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php")?>
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
    	$(document).ready(function(){
    		var data = [{ id: 0, text: '电影' }, { id: 1, text: 'IOS' }, { id: 2, text: '互联网' }, { id: 3, text: '创业' }, { id: 4, text: '法律' }, { id: 4, text: '时尚' }, { id: 4, text: '美食' }, { id: 4, text: '心理学' }, { id: 4, text: '旅行' }, { id: 4, text: '设计' }, { id: 4, text: '汽车' }, { id: 4, text: '健身' }, { id: 4, text: '软件开发' }, { id: 4, text: '环境' }, { id: 4, text: '教育' }];

    		$('#single').select2({
    			data: data,
 			    allowClear: true,
    		});


            $(document).on('click','.btn-success,em',function(){
                $('#main_contents div').css('display','none');
                var arr = [];
                $('#myTags').find('span').each(function(index){
                    arr[index] = $(this).text();
                });
                $('#main_contents').append('<p style="padding: 15px 0" align="center"><img src="home/lunt/css/img/loading_b.gif" alt="" /></p>');
                $.post('/index.php?module=sql&action=selectQuestion',{data:arr},function(result){

                    if (result != null) {
                      var content={
                        list : result,
                      }
                      var html = template('qList',content);
                      $('#main_contents').html(html);
                    }
                },'json');
            });
            
        });
    		
    </script>
  </body>
        }
</html>

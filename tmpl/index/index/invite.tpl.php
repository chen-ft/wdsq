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
            <div class="col-sm-12 col-md-8 aw-main-content">
              <div class="aw-mod clearfix">
                  <ul class="nav nav-tabs aw-nav-tabs">
                    <li role="presentation" ><a href="/index.php?module=index&action=answer">为你推荐</a></li>
                    <li role="presentation" ><a href="/index.php?module=index&action=hot">全站热门</a></li>
                    <li role="presentation" class="active"><a href="javascript:void(0)">邀请回答</a></li>
                  </ul>
                  <!-- 问答列表 -->
                  <div class="mod-body aw-feed-list clearfix" id="main_contents">
                        <script type="text/html" id="qList">
                            <p style="margin-top: 20px">
                                <h4 style="display: inline;">邀请我回答的问题</h4>
                                <h5 style="display: inline;"` class="pull-right"><a href="">所有人</a> | <a href="#">我关注的人</a>  </h5> 
                            </p>
                            <hr style="margin-top: 2px">
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
            <div class="col-sm-1"></div>
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
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/footer.tpl.php")?>
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
  </body>
</html>

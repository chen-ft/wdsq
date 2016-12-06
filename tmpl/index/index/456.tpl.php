<!-- <?php
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

?> -->
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
    <!--container -->
     <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <!-- Static navbar -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="#">问答社区</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">动态</a></li>
                      <li><a href="#">话题</a></li>
                      <li><a href="#">发现</a></li> 
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right ">
                      <li style="margin-right: 50px"><button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#askModal">提问</button></li>
                      <li class="dropdown user user-menu">
                       <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">
                         <img src="home/dist/img/user2-160x160.jpg" style="width: 25px;height: 25px;" class="img-circle" alt="User Image">
                           陈飞艇
                       </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                    </ul>
                   
                  </div><!--/.nav-collapse -->
                </div>
              </nav>
              <!-- Static navbar -->
          </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="media well">
                    <a href="#" class="pull-left"><img src="home/dist/img/user3-128x128.jpg" class="media-object" style="width: 42px;height: 42px; border-radius: 5px;" data-toggle="popover" data-trigger="hover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?"/></a>
                    <div class="media-body">
                        <h5 class="media-heading">
                            <small>来自话题 •    <a class="" href="#">嵌入媒体</a></small>  
                        </h5> 
                        <a href="">2016年天使投资人打死也不投的创业黑名单</a>
                        <div class="media">
                            <a href="#" class="pull-left"><img src="home/dist/img/test.png" style="width: 198px;height: 110px; border-radius: 5px;" /></a>
                            <div class="media-body">
                                资本市场是充满机会与诱惑的“西部世界”，更是伴随考验与厮杀的“饥饿游戏”，物竞天择，适者生存。在2016年余额还剩一个月之际，以太资本综合30余位领域专精的投资经理，以及500多位早期投资人的票选、1万多位投资人的以太优选投资行为数据，以及500多位早期投资人的票选、1万多位投资人的以太优选投资行为数据，总结出了现今…
                                <a href="">显示全部</a>
                            </div>
                        </div>
                        <p style="margin-top: 8px">
                            
                            <a data-id="208" data-type="question" class="aw-add-comment text-color-999" data-comment-count="0" data-first-click="hide"><small><i class="fa fa-plus"></i></small> 添加关注</a>
                            •                  <a data-id="208" data-type="question" class="aw-add-comment text-color-999" data-comment-count="0" data-first-click="hide"><small><i class="fa fa-comment-o"></i></small>12</a>
                            <span class="text-color-999"> • 作者保留权利 </span>

                        </p>
                    </div>
                </div>
                <div class="pagination pull-right">
                    <li>
                        <a href="#">上一页</a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">下一页</a>
                    </li>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">
                <ul class="nav nav-list well">
                    <li>
                        <a href="#"><i class="fa fa-bookmark-o fa-lg"></i>  我的收藏</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-check-square-o fa-lg"></i> 我关注的问题</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-o fa-lg"></i>  邀请我回答的问题</a>
                    </li>
                    <hr/>
                    <li class="nav-header">
                        热门话题
                    </li>
                    <li>
                        <a href="#">资料</a>
                    </li>
                    <li>
                        <a href="#">设置</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">帮助</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
	<!--end container -->
    <!-- Bootstrap core JavaScript ================================================== -->
    <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
    <script>
    	$(document).ready(function(){
            $('[data-toggle="popover"]').popover();
    		$('.summernote').summernote({
    			  toolbar: [
				    // [groupName, [list of button]]
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

		// 选择话题
    	    $('.select2').select2();

    	//问题列表
        	var content={

        		list : <?=$dataJson?>,
        	}
        	var html = template('qList',content);
        	$('.aw-common-list').html(html);
        
});
        //popover
            function show(obj){
                obj.popover({title:'12'});
            }
    </script>
  </body>
</html>

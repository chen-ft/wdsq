
<!-- 举报 -->
<div class="modal fade" id="reportForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#5bbf5a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">举报问题</h4>
      </div>
      <form id="report_pb" method="post" action="/index.php">
           <input type="hidden" name="module" value="sql">
           <input type="hidden" name="action" value="report">
           <input type="hidden" name="strQsId" value=<?=$_GET['id']?>>
           <input type="hidden" name="strUserId" value=<?=$_SESSION['login']['strUserId']?>>

           <div class="modal-body">
               <textarea class="form-control" name="reason" rows="5" placeholder="请填写举报理由..."></textarea>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
               <button class="btn btn-success" onclick="AWS.form_report($('#report_pb'));return false;">提交</button>
           </div>
      </form>
    </div>
  </div>
</div>
<!-- end 举报 -->


<!-- 私信 -->
<div class="modal fade" id="privateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#5bbf5a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">新私信</h4>
      </div>
      <form id="report_pb" method="post" action="/index.php">
           <input type="hidden" name="module" value="sql">
           <input type="hidden" name="action" value="report">
           <input type="hidden" name="strQsId" value=<?=$_GET['id']?>>
           <input type="hidden" name="strUserId" value=<?=$_SESSION['login']['strUserId']?>>

          <div class="modal-body">
               <input id="invite-input" class="form-control" type="text" placeholder="搜索用户" name="recipient" value="Kahn">
               <div class="aw-dropdown">
                   <p class="title">没有找到相关结果</p>
                   <ul class="aw-dropdown-list"></ul>
               </div>
               <textarea class="form-control" name="message" rows="3" placeholder="私信内容..."></textarea>
          </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
               <button class="btn btn-success" onclick="AWS.form_report($('#report_pb'));return false;">提交</button>
           </div>
      </form>
    </div>
  </div>
</div>
<!-- end 私信 -->

<!-- 弹出框 -->
<div class="aw-ajax-box" id="aw-ajax-box"></div>
<!-- 弹出框 -->

<!-- 问题弹出卡片 -->
<script type="text/html" id="topicCard">
  <div id="aw-card-tips" class="aw-card-tips aw-card-tips-topic" data-id={{topic_id}}>
    <div class="aw-mod">
      <div class="mod-head">
        <a href="javascript:void(0)" class="img">
          <img src="home/topicImg/topicImg_{{topic_id}}.jpg" style="width:45px;height:45px"/>
        </a>
        <p class="title">
          <a href="javascript:void(0)" class="name">{{topic_title}}</a>
        </p>
        <p class="aw-user-center-follow-meta" style="font-size:10px">
          {{topic_detail}}
        </p>
      </div>
      <div class="mod-footer clearfix">
        <a href={{topic_id}} class="item">
          <span class="value">{{topic_questions}}</span>
          <span class="key">问题</span>
        </a>
        <a href={{topic_id}} class="item">
          <span class="value">{{topic_attemtions}}</span>
          <span class="key">关注者</span>
        </a>
        <a class="btn btn-normal btn-success btn-sm follow pull-right" onclick="AWS.User.follow($(this), 'topic', {{topic_id}})">
          <span>关注</span>
          <em>|</em><b>{{topic_attemtions}}</b>
        </a>
      </div>
    </div>
  </div>
</script>
<!-- 问题弹出卡片 -->

<!-- 用户弹出卡片 -->
<script type="text/html" id="userCard">
  <div id="aw-card-tips" class="aw-card-tips aw-card-tips-user" data-id={{user_id}}>
    <div class="aw-mod">
      <div class="mod-head">
        <a href="javascript:void(0)" class="img">
          <img src="home/userImg/user-{{user_id}}.jpg" style="width:45px;height:45px"/>
        </a>
        <p class="title">
          <a href="javascript:void(0)" class="name">{{user_title}}</a>
        </p>
        <p class="aw-user-center-follow-meta" style="font-size:10px">
          {{user_detail}}
        </p>
      </div>
      <div class="mod-footer clearfix">
        <a href={{user_id}} class="item">
          <span class="value">{{user_answers}}</span>
          <span class="key">回答</span>
        </a>
        <a href={{user_id}} class="item">
          <span class="value">{{user_attemtions}}</span>
          <span class="key">关注者</span>
        </a>
        <a class="btn btn-normal btn-success btn-sm follow pull-right" onclick="AWS.User.follow($(this), 'user', {{user_id}})">
          <span>关注</span>
          <em>|</em><b>{{user_attemtions}}</b>
        </a>
        <a class="text-color-999" style="margin-left: 50px;" onclick="AWS.dialog('inbox');"><i class="icon icon-inbox"></i></a>
      </div>
    </div>
  </div>
</script>
<!-- 用户弹出卡片 -->

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
  <!-- foot
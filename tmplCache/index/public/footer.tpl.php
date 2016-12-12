<!-- 提问 modal -->
<div class="modal fade" id="askModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#5bbf5a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">提问</h4>
      </div>
      <div class="modal-body">
        <form id="askForm">
            <div class="form-group" >
                <textarea class="form-control" style="height:60px;" cols="1" placeholder="写下你的问题" id="qsTitle" ></textarea>
            </div>
            <div class="form-group" >
                <label style="margin-bottom:4px">问题内容 :</label>
                <div class="summernote" id="qsContent"></div>
            </div>
            <div class="form-group">
                <label style="margin-bottom:4px">选择话题 :</label><br>
                <select class="form-control select2 select2-hidden-accessible" data-placeholder="至少选择一个话题" multiple=""  style="width: 100%;" tabindex="-1" aria-hidden="true" id="qsTopic">
                <option value="10001">电影</option>
                <option value="10002">IOS</option>
                <option value="10003">互联网</option>
                <option value="10004">创业</option>
                <option value="10005">法律</option>
                <option value="10006">时尚</option>
                <option value="10007">美食</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-success" onclick="AWS.ajax_post('publish')">发布</button>
      </div>
    </div>
  </div>
</div>
<!-- end 提问 modal -->

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

<!-- 弹出框 -->
<div class="aw-ajax-box" id="aw-ajax-box"></div>
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
  <!-- foot
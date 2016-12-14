
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
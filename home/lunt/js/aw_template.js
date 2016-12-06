var AW_TEMPLATE = {
	'topicCard' : 
			'<div id="aw-card-tips" class="aw-card-tips aw-card-tips-topic">'+
				'<div class="aw-mod">'+
					'<div class="mod-head">'+
						'<a href="javascript:void(0)" class="img">'+
							'<img src="home/topicImg/topicImg_{{topic_id}}.jpg" style="width:45px;height:45px"/>'+
						'</a>'+
						'<p class="title">'+
							'<a href="javascript:void(0)" class="name">{{topic_title}}</a>'+
						'</p>'+
						'<p class="aw-user-center-follow-meta" style="font-size:10px">'+
							'{{topic_detail}}'+
						'</p>'+
					'</div>'+
					'<div class="mod-footer clearfix">'+
						'<a href={{topic_id}} class="item">'+
							'<span class="value">{{topic_questions}}</span>'+
							'<span class="key">问题</span>'+
						'</a>'+
						'<a href={{topic_id}} class="item">'+
							'<span class="value">{{topic_attemtions}}</span>'+
							'<span class="key">关注者</span>'+
						'</a>'+
						'<a class="btn btn-normal btn-success btn-sm follow pull-right">'+
							'<span>关注</span>'+
						'</a>'+
					'</div>'+
				'</div>'+
			'</div>',

	'commentBox' : 
	        '<div class="aw-comment-box" id={{comment_form_id}} style="display:none">'+
      		    '<div class="aw-comment-list">'+
      			'</div>'+
  				'<form action={{comment_form_action}} method="post" onsubmit="return false">'+
  					'<div class="aw-comment-box-main">'+
  						'<div class="summernote">'+
	                    '</div>'+
  						'<textarea class="aw-comment-txt form-control" rows="2" name="message" placeholder="评论一下..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 34px;">'+
  						'</textarea>'+
  						'<div class="aw-comment-box-btn">'+
  							'<span class="pull-right">'+
  								'<a href="javascript:;" class="btn btn-mini btn-success" onclick="AWS.User.save_comment($(this));">'+'评论'+'</a>'+
  								'<a href="javascript:;" class="btn btn-mini btn-gray close-comment-box">'+'取消'+'</a>'+
  							'</span>'+
  						'</div>'+
  					'</div>'+
  				'</form>'+
      		'</div>',
      		
     'loadingBox':
		'<div id="aw-loading" class="hide">'+
			'<div id="aw-loading-box"></div>'+
		'</div>',




}

	  
	          			      		
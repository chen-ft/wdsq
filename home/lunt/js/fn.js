var AWS = 
{
  	show_card_box:function(selector,type,time)
    {
  		if(!time){
  			var time = 300;
  		}

  		$(document).on('mouseover',selector,function(){
  			var _this = $(this);
  			clearTimeout(AWS.G.card_box_hide_timer);

  			AWS.G.card_box_show_timer = setTimeout(function(){
  				switch(type){
  					case 'user':
  						if (AWS.G.cashUserData.length == 0) {
  							_getdata();
  						}else{
  							var flag = 0;
  							_checkcash('user');
  							if (flag == 0) {
  								_getdata();

  							}
  						}
  					break;

            case 'topic':
              if (AWS.G.cashUserData.length == 0) {
                _getdata();
              }else{
                var flag = 0;
                _checkcash('user');
                if (flag == 0) {
                  _getdata();

                }
              }
            break;

  				}

  				function _getdata(){ //获取数据
  					if (type == 'user') {

  						//动态插入

  						$('#aw-ajax-box').html();
  						_init();
  						AWS.G.cashUserData.push($('#aw-ajax-box').html());
  					}

            if (type == 'topic') {

              $.post('/index.php?module=sql&action=getTopic',{id:$(_this).attr('data-id')},function(result){
                      //动态插入
                      var data =　{
                          'topic_id': result['0'].tpId,
                          'topic_pic': result['0'].tpId,
                          'topic_title': result['0'].tpName,
                          'topic_detail': result['0'].tpDetail.substr(0,60)+"...",
                          'topic_questions': result['0'].tpQuestions,
                          'topic_attemtions': result['0'].tpAttentions
                      }

                      var html = template('topicCard',data);
                      $('#aw-ajax-box').html(html);
                      _init();
                      AWS.G.cashUserData.push($('#aw-ajax-box').html());

              },'json')

            }

  				}

  				function _checkcash(type){  //检测缓存
  					if (type == 'user') {
  						$.each(AWS.G.cashUserData,function(i,obj){
  							if (obj.match('data-id="'+12345+'"')) {
  								$('#aw-ajax-box').html(obj);
  								$('#aw-card-tips').removeAttr('style');
  								_init();
  								flag = 1;
  							}
  						});
  					}
            if (type == 'topic') {
              $.each(AWS.G.cashUserData,function(i,obj){
                if (obj.match('data-id="'+12345+'"')) {
                  $('#aw-ajax-box').html(obj);
                  $('#aw-card-tips').removeAttr('style');
                  _init();
                  flag = 1;
                }
              });
            }
  				}

	      	function _init(){ //初始化元素的位置
	      			var top  = _this.offset().top + _this.height() + 5,
	      			  	left = _this.offset().left,
	      			  	nTop = _this.offset().top - $(window).scrollTop();

	      			// 判断下遍距离不足的情况
	      			if ( $(window).height() - nTop < $('#aw-card-tips').innerHeight()) {
  	      				// 不足弹出框将浮在元素上方
  	      				top = _this.offset().top - ($('#aw-card-tips').innerHeight()) -10;
	      			}
	      			// 判断右边距离不足
	      			if ( $(window).width() - left < $('#aw-card-tips').innerWidth()) {
	      			  	left = left - $('#aw-card-tips').innerWidth() + _this.innerWidth();
	      			}

	      			$('#aw-card-tips').css({left:left,top:top}).fadeIn(); 
	      		}
  			},time);
  			
  		}); //mouseover

  		$(document).on('mouseout',selector,function(){
  			clearTimeout(AWS.G.card_box_show_timer);

  		    AWS.G.card_box_hide_timer = setTimeout(function(){
  				$('#aw-card-tips').fadeOut();
  			},600);
  			

  		});
    },

    /*弹窗*/
    dialog:function(type)
    {
      if (type == 'askModal') {
        $('#askModal').modal('show');
      }
      if (type == 'report') {
        $('#reportForm').modal('show');
      }
      
    },
    
    // 表单提交
    form_submit:function(selector)
    {
      var content = decodeURIComponent(selector.parents('form').find('textarea').val());
      AWS.ajax_post('commentBox',content,selector.parents('form')[0].action);
    },

    //举报
    form_report:function(selector)
    {
      selector.submit();
    },

    //保存
    form_set:function(selector)
    {
      selector.submit();
    },

    //回复@
    operateReplay:function(selector)
    {
      var text = selector.parents('li').find('.author').text();
      var box = selector.parents('.aw-comment-box').find('textarea');
      var html = "回复: "+text+" ";
      box.val(html);
    },

    // 邀请用户回答
    invite_user:function(selector,img)
    {
      $.post('/index.php?module=sql&action=inviterUser',
        {
           "ques_id":selector.attr('data-qs'),
           "user_id":selector.attr('data-id'),
        },function(result){
             if (result == '0000') {

              var html = ' <a class="text-color-999 invite-list-user" data-title='+selector.attr('data-value')+'><img src='+img+'></a>';
                  selector.parents('.aw-invite-box').find('.invite-list').append(html);
                  selector.addClass('active').attr('onclick','AWS.disinvite_user($(this))').text('取消邀请');
                  selector.parents('.aw-invite-box').find('.invite-list').show();
                  selector.parents('.aw-question-detail').find('.aw-invite-replay .badge').text(selector.parents('.aw-invite-box').find('.invite-list').children().length);

        }
      },'json');
    },

    //取消邀请
    disinvite_user:function(selector)
    {
      $.post('/index.php?module=sql&action=cancelInvite',
        {
           "ques_id":selector.attr('data-qs'),
           "user_id":selector.attr('data-id'),
        },function(result){
            if (result == '0000') {

              $.each($('.aw-question-detail .invite-list a'),function(i,e){
                 if ($(this).attr('data-title') == selector.parents('.main').find('.aw-user-name').text()) {
                    $(this).detach();
                 }

              });

              selector.removeClass('active').attr('onclick','AWS.invite_user($(this),$(this).parents(\'li\').find(\'img\').attr(\'src\'))').text('邀请');
              selector.parents('.aw-question-detail').find('.aw-invite-replay .badge').text(selector.parents('.aw-invite-box').find('.invite-list').children().length);
              if (selector.parents('.aw-invite-box').find('.invite-list').children().length == 0)
              {
                  selector.parents('.aw-invite-box').find('.invite-list').hide();
              }


           }
      },'json');

    },

    ajax_post:function(type,data,url)
    { 
      switch(type){
        case 'publish':
           AWS.G.num++;
           $.post('/index.php?module=sql&action=publish',
                {title:$('#qsTitle').val(),content:$('#qsContent').summernote('code'),topic:$('#qsTopic').select2('val'),qsId:AWS.G.num},
                function(data){
                  if (data == '0000') {alert('发布成功');location.reload();}else{alert('出现错误')}
           },'json');
        break;
        case 'bp_more':
           $page = $('#bp_more').attr('data-page');
           $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/index.php?module=sql&action=loadData',
              data     : {page:$page},
              success  : function(data){

                    if (Math.abs(data.length - $page*10)< 10) {
                        var content={
                          list : data,
                        };
                        var html = template('qList',content);
                        $('#main_contents').html(html);
                        $('#bp_more').removeClass('loading');

                    }else{

                        $('#bp_more').removeClass('loading');
                        $('#bp_more').find('span').html('没有更多了');

                    }

              },
              error    : function(){
                        $('#bp_more').removeClass('loading');
                        $('#bp_more').find('span').html('出现错误');
                        alert('1');
              }
           });
      break;
      case 'replay':
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/index.php?module=sql&action=replay',
              data     : {qsId:data,content:$('#answer').summernote('code')},
              success  : function(data){
                if (data == '0000') {
                  alert('回复成功');
                  location.reload();
                }
              },
              error    : function(){
                  alert('出现错误');
              }
          });

      break;
      case 'commentBox':
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : url,
              data     : {content:data},
              success  : function(data){
                if (data == '0000') {
                  alert('回复成功');
                  location.reload() 
                }
              },
              error    : function(){
                  alert('出现错误');
              }
          });
      break;
      case 'imgUpload':
        $.ajax({
              type     : 'post',
              dataType : 'json',
              url      : '/index.php?module=sql&action=imgUpload',
              data     : {name:data},
              success  : function(data){
                if (data == '0000') {
                  alert('回复成功');
                  location.reload() 
                }
              },
              error    : function(){
                  alert('出现错误');
              }
          });
        alert('1');
      break;

      }
    },

}
 // 全局变量
AWS.G =
{
	cashUserData: [],
	cashTopicData: [],
	card_box_hide_timer: '',
	card_box_show_timer: '',
	dropdown_list_xhr: '',
	loading_timer: '',
	loading_bg_count: 12,
	loading_mini_bg_count: 9,
	notification_timer: '',
  qsId: '100100',
  strUserId: '201000',
  strAnsId: '1000',
}

//初始化
AWS.Init =
{
	// 初始化评论框
	init_comment_box:function(selector)
  {
		$(document).on("click",selector,function()
    {

      
			var comment_box_id = '#aw-comment-box-answer-'+$(this).attr('data-id');

      $('.aw-question-detail .aw-invite-box, .aw-question-detail .aw-question-related-box').hide();
			if ($(comment_box_id).length) { //判断是否已经插入模版

        $(comment_box_id).slideToggle();

			}else{

         // 动态插入commentBox
         switch ($(this).attr('data-type'))
         {
            case 'question':
                var comment_form_action = '/index.php?module=sql&action=saveQsComment&ques_id=' + $(this).attr('data-id');
                var comment_data_url =  '/index.php?module=sql&action=getQsComment&ques_id=' + $(this).attr('data-id');
            break;

            case 'answer':
                var comment_form_action = '/index.php?module=sql&action=saveAnsComment&ques_id=' + $(this).attr('data-id');
                var comment_data_url = '/index.php?module=sql&action=getAnsComment&ques_id=' + $(this).attr('data-id');
            break;
          }

          var data = {
             'comment_form_id': comment_box_id.replace('#',''),
             'comment_form_action': comment_form_action,
          }
          var html = template('commentBox',data);
          $(this).parents(".aw-item").find(".mod-footer").append(html);

          $.post(comment_data_url,function(data){
                if (data == '1111') {
                   var result = '<div align="center" class="aw-padding10">' + '暂无评论' + '</div>';
                }else{
                   var comments = {
                        list:data,
                   }
                   var result = template('commentList',comments);
                }
                   $(comment_box_id).find('.aw-comment-list').html(result);


          },'json');

         $(comment_box_id).find('.aw-comment-txt').bind(
          {
              focus: function ()
              { 
                 $(this).css("height","80px");
              },
          });

          $(comment_box_id).slideDown();

        }
		})
	},

  init_invite_box:function(selector)
  { 

    $(document).on('click',selector,function(){
       $('.aw-question-detail .aw-comment-box, .aw-question-detail .aw-question-related-box').hide();
        if ($('.aw-question-detail .aw-invite-box').is(':visible'))
        {
          $('.aw-question-detail .aw-invite-box').slideUp();
        }
        else
        {  
           var id =  $('#inviteGuy').attr('data-id');
           $.post('/index.php?module=sql&action=getInvitor&id='+id,function(data){
             console.log(data['0']);
             var invitors = {
                  list:data
             }
             var html = template('guyList',invitors);
             $('#inviteGuy').html(html);

          },'json');
          $('.aw-question-detail .aw-invite-box').slideDown();
        }



    });


  }
}

AWS.User = 
{
  share_out:function(type,name)
  {
     var url = window.location.href;
     var title = '分享来自'+'@'+name+$('#title h1').text();
     shareURL = 'http://www.jiathis.com/send/?webid=' + type + '&url=' + url + '&title=' + title + '';
     window.open(shareURL);
  },

  //感谢
  question_thanks(selector)
  {
        selector.html('<i class="icon icon-thank"></i>已感谢');
  },

  // 赞
  question_agree(selector)
  {
      $.tipsBox({
            obj: selector,
            str: "<b style='font-family:Microsoft YaHei;'>+1</b>",
            callback: function () {
             
            }
      });
      selector.attr('onclick','AWS.User.question_agree_cancel($(this))').html('<i class="icon icon-agree" ></i>取消赞');
      selector.parents('.aw-item').find('.aw-agree-by span').html('我和');

  },
   //取消赞
  question_agree_cancel(selector)
  {
     selector.attr('onclick','AWS.User.question_agree($(this))').html('<i class="icon icon-agree"></i>赞');
     selector.parents('.aw-item').find('.aw-agree-by span').html('');
  },


  //添加关注
  // 关注
  follow: function(selector, type, data_id)
  {
    if (selector.html())
      {
          if (selector.hasClass('active'))
          {
            selector.find('span').html('关注');
            selector.removeClass('active');
            selector.find('b').html(parseInt(selector.find('b').html()) - 1);
          }
          else
          {
            selector.find('span').html('取消关注');
            selector.addClass('active');
            selector.find('b').html(parseInt(selector.find('b').html()) + 1);
          }
      }
      else
      {   
          if (selector.hasClass('active'))
          {
              selector.attr('data-original-title', '关注');
          }
          else
          {
              selector.attr('data-original-title', '取消关注');
          }
      }


      switch (type)
      {
        case 'question':
          var url = '/question/ajax/focus/question_id-';
          break;

        case 'topic':
          var url = '/topic/ajax/focus_topic/topic_id-';
          break;

        case 'user':
          var url = '/follow/ajax/follow_people/uid-';
        break;
      }

     /* $.get(G_BASE_URL + url + data_id, function (result)
      {
        if (result.errno == 1)
          {
              if (result.rsm.type == 'add')
              {
                  selector.addClass('active');
              }
              else
              {
                  selector.removeClass('active');
              }
          }
          else
          {
              if (result.err)
              {
                  AWS.alert(result.err);
              }

              if (result.rsm.url)
              {
                  window.location = decodeURIComponent(result.rsm.url);
              }
          }

          selector.removeClass('disabled');

      }, 'json');*/
  },

}

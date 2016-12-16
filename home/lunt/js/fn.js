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
                _checkcash('topic');
                if (flag == 0) {
                  _getdata();
                }
              }
            break;

  				}

  				function _getdata(){ //获取数据
  					if (type == 'user') {

              $.post('/index.php?module=sql&action=getUser',{id:_this.attr('data-id')},function(result){
                      //动态插入
                      var data =　{
                          'user_id': result.strUserId,
                          'user_title': result.strName,
                          'user_detail': result.strDetail.substr(0,60)+"...",
                          'user_answers': result.usNum,
                          'user_attemtions': result.fcNum
                      }

                      var html = template('userCard',data);
                      $('#aw-ajax-box').html(html);
                      _init();
                      AWS.G.cashUserData.push($('#aw-ajax-box').html());

                  },'json')
  					}

            if (type == 'topic') {

              $.post('/index.php?module=sql&action=getTopic',{id:_this.attr('data-id')},function(result){
                      //动态插入
                      var data =　{
                          'topic_id': result.tpId,
                          'topic_title': result.tpName,
                          'topic_detail': result.tpDetail.substr(0,60)+"...",
                          'topic_questions': result.qsNum,
                          'topic_attemtions': result.fcNum
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
  							if (obj.match('data-id="'+_this.attr('data-id')+'"')) {
  								$('#aw-ajax-box').html(obj);
  								$('#aw-card-tips').removeAttr('style');
  								_init();
  								flag = 1;
  							}
  						});
  					}
            if (type == 'topic') {
              $.each(AWS.G.cashUserData,function(i,obj){
                if (obj.match('data-id="'+_this.attr('data-id')+'"')) {
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
           "ques_id":window.QUESTION_ID,
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

    add_more:function(selector,type){

       $(selector).addClass('loading');
       $page = $(selector).attr('data-page');

       if(type == 'data'){
         url = '/index.php?module=sql&action=loadData';
       }else if(type == 'fcQues'){
         url = '/index.php?module=sql&action=loadFocusQues';
       }

       switch(type)
       {
        case 'data':
          url = '/index.php?module=sql&action=loadData';
        break;
        case 'fcQues':
          url = '/index.php?module=sql&action=loadFocusQues';
        break;
        case 'invite':
          url = '/index.php?module=sql&action=loadInvite';
        break;
        case 'fcTic':
          url = '/index.php?module=sql&action=loadFocusTopics';
        break;
       }

       $.ajax({
          type     : 'post',
          dataType : 'json',
          url      : url,
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
          }
       });


       $(selector).attr('data-page',parseInt($(selector).attr('data-page'))+1);

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
      case 'questionUp':
        var data = new FormData();  
        data.append("file", data);
        $.ajax({  
            data: data,  
            type: 'post',  
            url: url,  
            cache: false,  
            contentType: false,  
            processData: false,  
            success: function(url) {  
                  $(".summernote").summernote('insertImage', url, 'image name'); 
            }  
        });  
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
             var invitors = {
                  list:data
             }
             var html = template('guyList',invitors);
             $('#inviteGuy').html(html);

          },'json');
          $('.aw-question-detail .aw-invite-box').slideDown();

          //邀请用户下拉绑定
          AWS.Dropdown.bind_dropdown_list($('.aw-invite-box #invite-input'), 'invite');

        }



    });
  },

  init_focus_btn:function(selector,type){
    //初始化关注按钮
    switch(type){
      case 'question':
        url = "/index.php?module=sql&action=initInvite&qsId="+window.QUESTION_ID+"&type="+type;    
      break;
      case 'user':
        url = "/index.php?module=sql&action=initInvite&userId="+$(selector).attr('data-id')+"&type="+type;    
      break;
    }
    $.get(url,function(result){
        if (result == '0000') {
           $(selector).children('btn').find('span').html('取消关注');
           $(selector).children('btn').addClass('active');
        }
    },'json');
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


  // 关注
  follow: function(selector, type, data_id)
  { 
   
    var addUrl = '/index.php?module=sql&action=focus&id='+data_id+'&type='+type;
    var delUrl = '/index.php?module=sql&action=delFocus&id='+data_id;

    if (selector.html())
      {
          if (selector.hasClass('active'))
          {
            $.get(delUrl,function(result){
              if (result == '0000') {
                selector.find('span').html('关注');
                selector.removeClass('active');
                selector.find('b').html(parseInt(selector.find('b').html()) - 1);
                
              }
            },'json');
          }
          else
          {
            $.get(addUrl,function(result){
               if (result == '0000') {
                selector.find('span').html('取消关注');
                selector.addClass('active');
                selector.find('b').html(parseInt(selector.find('b').html()) + 1);
              }
            },'json');
          }
      }

     /*$.get(getUrl, function (result)
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

  //不感兴趣
  noinstrest:function(selector){

    selector.parents('.aw-item').fadeOut();

  }
}

AWS.Dropdown = 
{
  // 下拉菜单功能绑定
  bind_dropdown_list: function(selector,type)
  {
    $(selector).keyup(function(e)
    {

      if($(selector).val().length >= 1)
      {
         if (e.which != 38 && e.which != 40 && e.which != 13)
         {
           AWS.Dropdown.get_dropdown_list($(this), type, $(selector).val());
         } 
      }
      else
      {
          $(selector).parent().find('.aw-dropdown').hide();
      }

      var list = $(selector).parent().find('.aw-dropdown-list li');

      //键盘向下
      if (e.which == 40 && list.is(':visible'))
      {
        var _index;
        if (!list.hasClass('active')) { //如果没有选中，第一个为选中
          list.eq(0).addClass('active');
        }
        else
        {
          $.each(list,function(i,e){
              if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                if ($(this).index() == list.length -1) {
                  _index = 0;
                }else{
                  _index = $(this).index() + 1;
                }
              }            
          });
          list.eq(_index).addClass('active');
        }
      }

      //键盘向上
      if (e.which == 38 && list.is(':visible'))
      {
        var _index;
        if (!list.hasClass('active')) { //如果没有选中，第一个为选中
          list.eq(list.length -1).addClass('active');
        }
        else
        {
          $.each(list,function(i,e){
              if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                if ($(this).index() == 0) {
                  _index = list.length -1;
                }else{
                  _index = $(this).index() - 1;
                }
              }            
          });
          list.eq(_index).addClass('active');
        }
      }

      if (e.which == 13) {
        $(selector).parent().find('.aw-dropdown-list .active').click();
      }



    });

    $(selector).blur(function()
    {
      $(selector).parent().find('.aw-dropdown').delay(500).fadeOut(300);
    });
  },

  //下拉菜单获取数据
  get_dropdown_list:function(selector,type,data)
  {
    if (AWS.G.dropdown_list_xhr != '')
    { 
       AWS.G.dropdown_list_xhr.abort(); // 中止上一次ajax请求
    }

    var url = '';
    switch(type)
    {
      case 'search':
        url = '/index.php?module=sql&action=searchData&q='+encodeURIComponent(data)+'&limit=10';
      break;
      case 'invite':
        url = '/index.php?module=sql&action=searchInvite&q='+encodeURIComponent(data)+'&limit=10';
      break;
    }

    AWS.G.dropdown_list_xhr = $.get(url,function(result)
    {
      if (result != null && AWS.G.dropdown_list_xhr != undefined) 
      {
        $(selector).parent().find('.aw-dropdown-list').html(''); // 清空内容
        switch(type)
        {
          case 'search':
              $.each(result, function (i, a)
              {
                  switch (a.type)
                  {
                      case 'questions':
                          $(selector).parent().find('.aw-dropdown-list').append('<li class=" question clearfix"><i class="icon icon-bestbg pull-left"></i><a class="aw-hide-txt pull-left" href="/index.php?module=question&action=question&id='+a.qsId+'">'+a.qsTitle+'</a><span class="pull-right text-color-999">1 个回复</span></li>');
                          break;

                      case 'topics':
                          $(selector).parent().find('.aw-dropdown-list').append('<li class="topic clearfix"><span class="topic-tag" data-id='+a.tpId+'><a href="/index.php?module=topic&action=topic&tpId='+a.tpId+'" class="text">'+a.tpName+'</a></span> <span class="pull-right text-color-999">6 ' + '个讨论' + '</span></li>');
                          break;

                      case 'users':
                          if (a.strDetail == '') {
                             var signature = '暂无介绍';
                          }else{
                            var signature = a.strDetail;
                          }
                           var imgUrl = 'home/userImg/user-'+a.strUserId+'.jpg';
                          $(selector).parent().find('.aw-dropdown-list').append('<li class="user clearfix"><a href="/index.php?module=user&action=people&userId='+a.strUserId+'"><img src='+imgUrl+' />'+a.strName+'<span class="aw-hide-txt">'+signature+'</span></a></li>');
                          break;
                  }
              });
              break;

          case 'invite':

              $.each(result,function (i,a)
              {
                 if (a.strDetail == '') {
                   var signature = '暂无介绍';
                 }else{
                   var signature = a.strDetail;
                 }
                 var imgUrl = 'home/userImg/user-'+a.strUserId+'.jpg';
                 $(selector).parent().find('.aw-dropdown-list').append('<li class="user"><a data-id='+a.strUserId+' data-value='+a.strName+'><img class="img" src='+imgUrl+' />'+a.strName+'<span class="aw-hide-txt">'+signature+'</span></a></li>');
              });
           
              break;
        }
          $(selector).parent().find('.aw-dropdown-list').show();
          $(selector).parent().find('.aw-dropdown').show();
          $(selector).parent().find('.aw-dropdown').find('.title').hide();
      }else{
          $(selector).parent().find('.aw-dropdown').show().end().find('.title').html('没有找到相关结果').show();
          $(selector).parent().find('.aw-dropdown-list').hide();
      }
    },'json')
  }
}


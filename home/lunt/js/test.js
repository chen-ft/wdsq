var AWS = 
{
  
  	show_card_box:function(selector,type,time)
    {
  		if(!time){
  			var time = 300;
  		}

  		$(document).on('mouseover',selector,function(){
  			var _this = $(this);
        console.log(_this);
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
                console.log('1');
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
  						$('#aw-ajax-box').html(Hogan.compile(AW_TEMPLATE.topicCard).render(
  						{
    							'topic_id': '4123',
                  'topic_pic': '121',
                  'topic_title': '132123',
                  'topic_description': '12',
                  'discuss_count': '54654',
                  'focus_count': '1515',
                  'focus': '15415',
                  'focusTxt': '54654',
                  'url' : '123123',
                  'fansCount': '4545'
  						
  						}));
  						_init();
  						AWS.G.cashUserData.push($('#aw-ajax-box').html());
  					}

            if (type == 'topic') {

              $.post('/index.php?module=sql&action=getTopic',{id:$(_this).attr('data-id')},function(result){
                      //动态插入
                      $('#aw-ajax-box').html(Hogan.compile(AW_TEMPLATE.topicCard).render(
                      {
                          'topic_id': result['0'].tpId,
                          'topic_pic': result['0'].tpId,
                          'topic_title': result['0'].tpName,
                          'topic_detail': result['0'].tpDetail.substr(0,60)+"...",
                          'topic_questions': result['0'].tpQuestions,
                          'topic_attemtions': result['0'].tpAttentions
                      
                      }));
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
      
      $('#askModal').modal('show');
    },

    ajax_post:function(type)
    {
      switch(type){
        case 'publish':
           $.post('/index.php?module=sql&action=publish',
                {title:$('#qsTitle').val(),content:$('#qsContent').summernote('code'),topic:$('#qsTopic').select2('val')},
                function(data){
                  if (data == '0000') {alert('发布成功')}else{alert('出现错误')}
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

      }

    }
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
	notification_timer: ''
}

//初始化
AWS.Init =
{
	// 初始化评论框
	init_comment_box:function(selector){
		$(document).on("click",selector,function(){

			var comment_box_id = '#aw-comment-box-answer-12';

			if ($(comment_box_id).length) { //判断是否已经插入模版

				if ($(comment_box_id).css('display') == 'none') {

					$(comment_box_id).fadeIn();
				}else{

					$(comment_box_id).fadeOut();
				}

			}else{

				$(this).parents(".aw-item").find(".mod-footer").append(Hogan.compile(AW_TEMPLATE.commentBox).render({
					'comment_form_id': comment_box_id.replace('#',''),
					'comment_form_action': 'http://www.baidu.com',
				}));

	            var result = '<div align="center" class="aw-padding10">' + '暂无评论' + '</div>';
	            $('.aw-comment-list').html(result);

	            $(comment_box_id).find('aw-comment-txt').bind({
	            	focus:function(){
	            		$(comment_box_id).find('.aw-comment-box-btn').show();
	            	},
	            	blur:function(){
	            	    $(comment_box_id).find('.aw-comment-box-btn').hide();
	            	}
	            });


	            $(comment_box_id).fadeIn();



			}

			


			
		})

	}
}
	      
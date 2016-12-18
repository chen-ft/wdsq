$(function(){
    
	$('.summernote').summernote({
		  height:150,
		  placeholder: '问题背景、条件等详细信息',
          callbacks:{
             onImageUpload: function(files) {
                img = sendQuestion(files[0]); 
            }
          },
	});

   function sendQuestion(file) {  
        var data = new FormData();  
        data.append("file", file);
        $.ajax({  
            data: data,  
            type: 'post',  
            url: "/index.php?module=sql&action=questionImg",  
            cache: false,  
            contentType: false,  
            processData: false,  
            success: function(url) {  
                  $(".summernote").summernote('insertImage', url, 'image name'); 
            }  
        });  
    }

	$('.select2').select2();


	//详情提示框
    AWS.show_card_box('.aw-user-img, .aw-topic-name','topic');
	AWS.show_card_box('.text-user-name','user');

	//评论框
	AWS.Init.init_comment_box('.add-comment');

    //邀请框
    AWS.Init.init_invite_box('.aw-invite-replay');

    //搜索下拉框
    AWS.Dropdown.bind_dropdown_list('#aw-search-query','search');

    //邀请用户回答点击事件
    $(document).on('click', '.aw-invite-box .aw-dropdown-list a', function () {
        AWS.invite_user($(this),$(this).find('img').attr('src'));
    });


    //小卡片mouseover
    $(document).on('mouseover', '#aw-card-tips', function ()
    {
        clearTimeout(AWS.G.card_box_hide_timer);
        
        $(this).show();
    });

    //小卡片mouseout
    $(document).on('mouseout', '#aw-card-tips', function ()
    {
        $(this).hide();
    });

  




});

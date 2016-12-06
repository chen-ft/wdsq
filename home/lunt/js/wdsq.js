$(function(){
   
	$('.summernote').summernote({
		  height:100,
		  placeholder: '问题背景、条件等详细信息',
		  toolbar: [
		    ['style', ['bold', 'italic', 'underline']],
		    ['insert',['picture','video']],
		    ['fontsize', ['fontsize']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['music',['codeview','fullscreen']]
          ],

	});

    $('#main_contents').append('<p style="padding: 15px 0" align="center"><img src="home/lunt/css/img/loading_b.gif" alt="" /></p>');
    $.ajax({
          type     : 'post',
          dataType : 'json',
          url      : '/index.php?module=sql&action=loadData',
          data     : {'page':'1'},
          success  : function(data){
                var content={
                    list : data,
                };
                var html = template('qList',content);
                $('#main_contents').html(html);
  
        }

     });

	$('.select2').select2();

		 /* ajax: {

                url     : "/index.php?module=sql&action=topic",//请求的API地址
                delay   : 250,
                dataType: 'json',//数据类型
                data    : function(params){
                    return {
                        q   : params.term//此处是最终传递给API的参数
                    }
                },
                id : function(rs) {  
	            	console.log(rs);
			        return rs.tpId;  
			    },
            },
            
		    results : function(data){ return data;}, 
            templateResult: formatState//模板化*/
		




	//详情提示框
	AWS.show_card_box('.aw-user-img, .aw-topic-name','topic');

	//评论框
	AWS.Init.init_comment_box('.add-comment');

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

    // 加载更多
    $('#bp_more').click(function(){
        $(this).addClass('loading');
        AWS.ajax_post('bp_more');
        $(this).attr('data-page',parseInt($(this).attr('data-page'))+1);
    });



});

function formatState (state) {
    if (!state.tpId) { return state.tpName; }//未找到结果时直接跳出函数

    var $state = $(
    		'<option value='+state.tpId+'>'+state.tpName+'</option>'

    );//将API返回的结果转换为模板
    return $state;
}
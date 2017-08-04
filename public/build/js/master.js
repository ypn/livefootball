$(document).ready(function(){
  $('.link-form-delete').click(function(){
    var _a = $(this);
    $('#dialog-confirm').dialog({
				resizable:false,
				height:'auto',
				width:400,
				modal: true,
			    buttons: {
			        "Yes":function(){
              _a.find('form').submit();
			        	$(this).dialog("close");
			        },
			        "No": function() {
			          	$( this ).dialog( "close" );
			        }
			    }

			});
  })


  $('.open-reply-box').click(function(){
    let $REPLY_BOX = $('#reply-box');
    $REPLY_BOX.slideDown(250);
  });

  $('.close-reply-box').click(function(){
    let $REPLY_BOX = $('#reply-box');
    $REPLY_BOX.slideUp(250);
  })
});

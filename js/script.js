$(document).on('click','.close-chat', function(event){
  event.preventDefault();
   var user_id= $(this).closest('.chat-box').attr('user-id');
   $.get('ajax/openChatBox.php', {remove : user_id}, function(res){
      // $('.chat-container').html(res);
      // console.log(res);
      $(this).closest('.chat-box').remove();
  });

});

var minimize=  false;

$(document).on('click','.panel-heading', function(event){
  event.preventDefault();

  if(minimize==true){
    $(this).closest('.chat-box .panel').removeClass("minimize");
    $(this).closest('.chat-box').css('margin-top','-200px');
    $(this).closest('.chat-box .panel').css('margin-top','-200px');
    minimize = false;
  }
  else if(minimize==false){
    minimize = true;
    $(this).closest('.chat-box').css('margin-top','156px');
    // $(this),closest('.chat-box .panel').css('margin-top','156px');
  }
});

$(function(){
  var chat_body = $('.panel-body');

  chat_body.each(function(index,el) {
    var chat_height = $(this).height() * 99999999999;
    $(this).animate({
      scrollTop: chat_height,
    },
      100);
  });
});

$(document).on('click','.namesclick',function(event){

  event.preventDefault();

  var user_id= $(this).attr('user-id');
  if($('.chat-user-' + user_id).length<1){
    var count_chat_box = $('.chat-box').length;

    if (count_chat_box < 2) {
      $.get('ajax/openChatBox.php', {id: user_id}, function(res){
        $('.chat-container').append(res);
      });
    }
  }

});

$(document).on('keyup','.send-message',function(event){

  var user_id= $(this).closest('.chat-box').attr('user-id');
  var message = $(this).val();
  var el = $(this);
  if(event.keyCode == 13){
      $.post('ajax/sendMessage.php', {to: user_id, message:message}, function(res){
        $('.chat-user-' + user_id).append(res);
        el.val('');

      });
  }


});

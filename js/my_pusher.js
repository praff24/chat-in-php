Pusher.logToConsole = false;

  var pusher = new Pusher('16118eb1440f8b51d212', {

    encrypted: true
  });

  var channel = pusher.subscribe('chats');
  channel.bind('my-event', function(data) {
    var to = data.to;
    var from_id = data.from;
    var auth_id = $('html').attr('auth');

    if(to == auth_id){
      $.get('ajax/openChatBox.php', {id: from_id}, function(res){
        if($('.chat-user-' + from_id).length < 1){
            $('.chat-container').append(res);
        }
  });
      var chat_height = $('.chat-user-' + to).height() * 99999999999;
      $('.chat-user-' + from_id).append('<div class="alert alert-success">'+
          data.name_from+': ' +data.message+ '</div>');
      $('.chat-user-' + to).animate({
        scrollTop: chat_height,
      },
        100);

    }
    else if (from_id == auth_id) {
      $.get('ajax/openChatBox.php', {id: to}, function(res){
        if($('.chat-user-' + to).length < 1){
            $('.chat-container').append(res);
        }

      });
      var chat_height = $('.chat-user-' + to).height() * 99999999999;
      $('.chat-user-' + to).append('<div class="alert alert-info">'+
        data.name_from+': '  +data.message +
      '</div>');
      $('.chat-user-' + to).animate({
        scrollTop: chat_height,
      },
        100);
    }
  });

//     var channel = pusher.subscribe('show_chat_box');
//
//     channel.bind('my-event', function(data) {
//
//
//        var to = data.to;
//        var from_id = data.from;
//        var auth_id = $('html').attr('auth');
//
//        if(to == auth_id){
//          if($('.chat-user-' + data.from_id).length<1){
//            var count_chat_box = $('.chat-box').length;
//
//            if (count_chat_box < 2) {
//              $.get('ajax/openChatBox.php', {id: data.from_id}, function(res){
//                $('.chat-container').append(res);
//              });
//            }
//          }
//        }else if (from_id == auth_id) {
//          if($('.chat-user-' + data.to).length<1){
//            var count_chat_box = $('.chat-box').length;
//
//            if (count_chat_box < 2) {
//              $.get('ajax/openChatBox.php', {id: data.to}, function(res){
//                $('.chat-container').append(res);
//              });
//            }
//          }
// }
//     });

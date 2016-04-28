
/* 回复评论 */
$(function() {
  $('[name=msg_reply]').on('click', function() {
    var message_id = $(this).find('[name=message_id]').val();
    var receive_id = $(this).find('[name=userid]').val();
    $('#my-prompt').modal({
      relatedTarget: this,
      onConfirm: function(e) {
        var data = { message_id: message_id, content: e.data, receive_id: receive_id };
        $.post( reply_url, data, function( msg ) {
            if ( msg['status'] )
            {
                var info = msg['info'];
                var reply_html = add_reply( info['username'], info['receive_name'], info['content'] );
                $( '#reply_' + message_id ).before( reply_html );
            }
        }, 'json' );
      },
      onCancel: function(e) {
        // alert('不想说!');
      }
    });
  });
});

/* 添加留言 */
$(function() {
    $('#submit_msg').click( function() {
        var url = "<?php echo get_url( 'Message/add_msg' ); ?>";
        var content = $('#msg_content').val().trim();
        var data = { 'content': content };
        var avatar = "<?php echo session( 'user.avatar' ); ?>";
        var username = "<?php echo session( 'user.username' ); ?>";
        var datetime = "<?php echo date( 'Y-m-d H:i', NOW_TIME ); ?>";
        $.ajax({
            'url': url,
            'type': 'post',
            'data': data,
            'dataType': 'json',
            success: function ( msg ) {
                am_alert( '', msg['info'] );
                if ( msg['status'] )
                {
                    /* TODO 追加html */
                    var msg_html = add_msg( avatar, username, datetime, content );
                    $('#ul_msglist > li:first').before( msg_html );
                    $('#msg_content').val( '' );
                }
            },
            error: function () {
                alert( '网络错误' );
            }
        });
    });
});    
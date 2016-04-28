
/**
 * Amaze alert
 * @author Yusure  http://yusure.cn
 * @date   2016-04-05
 * @param  [param]
 * @param  {[type]}   title [description]
 * @param  {[type]}   info  [description]
 * @return {[type]}         [description]
 */
function am_alert( title, info )
{
    var html = '';
    html += '<div class="am-modal am-modal-alert am-modal-active" tabindex="-1" id="my-alert" style="display: block; margin-top: -66px;">';
    html += '<div class="am-modal-dialog">';
    html += '<div class="am-modal-hd">'+ title +'</div>';
    html += '<div class="am-modal-bd">'+ info +'</div>';
    html += '<div class="am-modal-footer">';
    html += "<span class='am-modal-btn' onclick='$(\"#am_alert\").html(\"\");' >确定</span>";
    html += '</div></div></div>';
    html += '<div class="am-dimmer am-active" data-am-dimmer="" style="display: block;"></div>';
    $('#am_alert').html( html );
}


/**
 * AJAX留言成功无刷新增加留言
 * @author Yusure  http://yusure.cn
 * @date   2016-04-05
 * @param  [param]
 */
function add_msg( avatar, username, datetime, content )
{
    var msg_html = '';
    msg_html += '<li class="am-comment"><a href="#link-to-user-home"><img src="'+ avatar +'" alt="" class="am-comment-avatar" width="48" height="48"></a>';
    msg_html += '<div class="am-comment-main">';
    msg_html += '<header class="am-comment-hd">';
    msg_html += '<div class="am-comment-meta">';
    msg_html += '<a href="#link-to-user" class="am-comment-author">'+ username +'</a> 发表留言';
    msg_html += '<time datetime="'+ datetime +'" title="'+ datetime +'">'+ datetime +'</time>'
    msg_html += '</div></header>';
    msg_html += '<div class="am-comment-bd">';
    msg_html += '<p>'+ content +'</p></div>';
    msg_html += '<footer class="am-comment-footer">';
    msg_html += '<div class="am-comment-actions">';  
    msg_html += '<a href=""><i class="am-icon-reply"></i>回复</a>';
    msg_html += '</div></footer></div></li>';                  
    return msg_html;       
}

/**
 * 无刷新增加回复
 * @author Yusure  http://yusure.cn
 * @date   2016-04-28
 * @param  [param]
 */
function add_reply( username, receive_name, content )
{
    var reply_html = '';
    reply_html += '<blockquote>';
    reply_html += '<a href="#link-to-user" class="am-comment-author">' + username + '</a>';
    reply_html += '<a href="#lin-to-user">@' + receive_name + '</a>';
    reply_html += ' ' + content + ' ';
    reply_html += '<a href=""><i class="am-icon-reply"></i>回复</a>';
    reply_html += '</blockquote>';          
    return reply_html;
}
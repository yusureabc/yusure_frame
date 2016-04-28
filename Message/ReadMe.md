
1、页面用 amaze 框架  http://amazeui.org/?_ver=2.x

2、上传插件 uploadfiy

3、弹框 artdialog  好像amaze也有弹框的插件



需求   登陆 注册  发布留言，回复留言 (ajax)

msg_user

    userid      用户ID
    username    用户名
    password    密码
    head_pic    头像
    sex         性别  1男 2女


msg_message   主留言 表
    
    message_id  留言ID
    userid      发送用户ID
    username    发送用户名
    content     留言内容
    add_time    添加时间

msg_reply    留言评论 表

    reply_id      评论自增ID
    message_id    主留言ID  
    level         回复等级  1级直接回复留言，二级直接回复评论
    level_id      上级评论ID
    userid        发送用户ID
    username      发送用户名
    content       留言内容
    receive_id    接收者ID
    receive_name  接收者用户名
    status        状态  1、未读  2、已读
    add_time      添加时间



CSS  -> Comment 评论组件

JS插件 -> 模态窗口 -> 弹框
<?php

/**
 * 留言板模块
 */
class MessageController extends BaseUserController
{

    /**
     * 留言板列表
     * @author Yusure  http://yusure.cn
     * @date   2016-04-02
     * @param  [param]
     * @return [type]     [description]
     */
    public function msg_list()
    {
        $message_model = $this->LoadModel( 'message' );
        $user_model    = $this->LoadModel( 'user' );
        $msg_list = $message_model->get_msglist( array( 1 => 1 ), '*' );
        foreach ( $msg_list as $k => $v )
        {
            $msg_list[ $k ]['datetime'] = date( 'Y-m-d H:i', $v['add_time'] );
            $user_info = $user_model->get_userinfo( array( 'userid' => $v['userid'] ), 'avatar' );
            $msg_list[ $k ]['avatar'] = $user_info['avatar'];
        }

        $this->assign( 'msg_list', $msg_list );
        $this->assign( 'title', '欢迎来留言!' );
        $this->display();
    }

    /**
     * 添加留言
     * @author Yusure  http://yusure.cn
     * @date   2016-04-02
     * @param  [param]
     */
    public function add_msg()
    {
        $message_model = $this->LoadModel( 'message' );
        if ( ! IS_POST ) return;
        ! trim( $_POST['content'] ) && json_error( '请输入留言！' );
        $msg_data             = array();
        $msg_data['userid']   = session( 'user.userid' );
        $msg_data['username'] = session( 'user.username' );
        $msg_data['content']  = trim( $_POST['content'] );
        $msg_data['add_time'] = NOW_TIME;
        $add_res = $message_model->add_msg( $msg_data );
        if ( $add_res )
        {
            json_succ( '留言成功！' );
        }
        else
        {
            json_error( '操作失败！' );
        }
    }
}
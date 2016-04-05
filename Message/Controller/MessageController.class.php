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

    }
}
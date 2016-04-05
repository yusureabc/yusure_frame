<?php
/**
 * 留言模型
 */
class MessageModel extends Model
{

    public function __construct()
    {
        parent::__construct( 'message' );
    }

    /**
     * 添加留言
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     */
    public function add_msg( $data )
    {
        return $this->add( $data );
    }

    /**
     * 获取留言列表
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_msglist( $condition, $field )
    {
        return $this->get_list( $condition, $field );
    }
}
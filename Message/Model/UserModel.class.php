<?php

/**
 * 会员模型
 */
class UserModel extends Model
{

    public function __construct()
    {
        parent::__construct( 'user' );
    }

    /**
     * 会员注册
     * @author Yusure  http://yusure.cn
     * @date   2016-04-01
     * @param  [param]
     * @param  [type]     $data [description]
     */
    public function add_user( $data )
    {
        return $this->add( $data );
    }

    /**
     * 获取会员信息
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_userinfo( $conditon, $field = '*' )
    {
        return $this->get_info( $conditon, $field );
    }
}
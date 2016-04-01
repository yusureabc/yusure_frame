<?php

class RegisterController extends Controller
{

    /**
     * 注册模块
     * @author Yusure  http://yusure.cn
     * @date   2016-03-26
     * @param  [param]
     * @return [type]     [description]
     */
    public function reg()
    {
        $this->assign( 'title', '用户注册' );
        $this->display();
    }
}
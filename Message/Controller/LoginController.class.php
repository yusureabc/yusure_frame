<?php

class LoginController extends Controller
{

    /**
     * 登陆模块
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function login()
    {
        if ( IS_POST )
        {

        }
        else
        {
            $this->assign( 'title', '登陆页面' );
            $this->display();
        }
    }

    /**
     * 产生验证码，生成session
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function validatecode()
    {
        import( 'ValidateCode' );
        $v_code = new ValidateCode();
        $v_code->doimg();
        session( 'v_code', $v_code->getCode() );
    }
}
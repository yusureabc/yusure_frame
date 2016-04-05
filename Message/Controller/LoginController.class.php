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
            import( 'Validate' );
            $obj_validate = new Validate();
            $obj_validate->validateparam = array( 
                array('input'=>$_POST['username'],'require'=>'true','message'=>'用户名不能为空'), 
                array('input'=>$_POST['password'],'require'=>'true','message'=>'密码不能为空'), 
                array('input'=>$_POST['v_code'], 'require'=>'true','message'=>'验证码不能为空'), 
            ); 
            $error = $obj_validate->validate(); 
            $error && $this->error($error);
            /* 验证验证码 */
            $this->check_v_code();
            /* 开始登陆 */
            $login_res = $this->to_login();
            if ( $login_res )
            {
                $this->success( '登陆成功！', get_url( 'Message/msg_list' ) );
            }
            else
            {
                $this->error( '密码错误！' );
            }
        }
        else
        {
            $this->assign( 'title', '登陆页面' );
            $this->display();
        }
    }

    /**
     * 执行登陆过程
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    private function to_login()
    {
        $user_model = $this->LoadModel( 'user' );
        $condition = array();
        $condition['username'] = trim($_POST['username']);
        $user_info = $user_model->get_info( $condition, '*' );
        if ( $user_info['password'] != md5( $_POST['password'] ) )
        {
            return false;
        }
        unset( $user_info['password'] );
        session( 'user', $user_info );
        return true;
    }

    /**
     * 验证码检查
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    private function check_v_code()
    {
        $v_code = strtolower( trim( $_POST['v_code'] ) );
        if ( session( 'v_code' ) != $v_code )
        {
            $this->error( '验证码错误！' );
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
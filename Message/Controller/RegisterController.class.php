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
        /* 实例化user模型 */
        $user_model = $this->LoadModel( 'user' );
        get_url( 'Register/reg', array( 'yu' => '123' ) );
        if ( IS_POST )
        {
            $data = array();
            $data['username'] = trim( $_POST['username'] );
            $data['password'] = md5( $_POST['password'] );
            $data['sex']      = intval( $_POST['sex'] );
            $data['avatar']   = trim( $_POST['avatar_path'] );
            $user_res = $user_model->add_user( $data );
            if ( $user_res )
            {
                unset( $data['password'] );
                /* 产生用户session */
                session( 'user', $data );
                $this->success( '操作成功！', get_url( 'Message/msg_list' ) );
            }
            else
            {
                $this->error( '' );
            }
        }
        else
        {
            $this->assign( 'title', '用户注册' );
            $this->display();
        }        
    }

    /**
     * 上传头像
     * @author Yusure  http://yusure.cn
     * @date   2016-04-02
     * @param  [param]
     * @return [type]     [description]
     */
    public function upload_pic()
    {
        import( 'File' );
        $file_class = new file();
        $avatar_name = 'avatar_' . md5( $_FILES['Filedata']['name'] ) . '.' . extname($_FILES['Filedata']['name']);
        $avatar_path = AVATAR_PATH . $avatar_name;
        $upload_res = $file_class->uploadfile( $_FILES['Filedata'], $avatar_path, 1024*5 );
        if ( $upload_res['result'] )
        {
            echo __PUBLIC__ . '/upload/avatar/' . $avatar_name;
        }
    }
}
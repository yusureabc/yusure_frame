<?php


class Index extends Controller
{
    /**
     * 默认页面
     * @author Yusure  http://yusure.cn
     * @date   2016-03-04
     * @param  [param]
     * @return [type]     [description]
     */
    public function index()
    {
        $test_model = $this->LoadModel( 'test' );
        echo ( 'This is Index' );
    }

    /**
     * Yusure
     * @author Yusure  http://yusure.cn
     * @date   2016-03-04
     * @param  [param]
     * @return [type]     [description]
     */
    public function yusure()
    {
        die( 'yusure' );
    }
}
<?php

/**
 * 默认控制器 Index
 */
class IndexController extends Controller
{

    public function index()
    {
        $test_model = $this->LoadModel( 'Index' );

        $this->assign( 'title', '默认页面' );
        $this->assign( 'msg', 'Hello World！' );
        $this->display();
    }

}
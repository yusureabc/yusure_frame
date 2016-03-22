<?php

class Welcome extends Controller
{

    public function index()
    {

        $this->assign( 'title', 'Hello World 你好时间xxxxxxx' );
        $this->assign( 'body', 'Yusure 大大大大大大' );
        $this->display( 'index' );
    }



}
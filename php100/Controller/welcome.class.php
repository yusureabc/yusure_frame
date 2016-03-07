<?php

class Welcome extends Controller
{

    public function index()
    {
        $this->assign( 'title', 'Hello World' );
        $this->assign( 'body', 'Yusure 大大大大大大' );
        $this->display( 'index' );
    }



}
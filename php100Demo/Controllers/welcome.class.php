<?php
class Welcome extends Controller
{
	public function index()
	{
        $this->assign('title', 'Hello World');
        $this->assign('body', '小恺教你写一个属于自己的MVC框架');
        $this->display('index');
	}
}
?>
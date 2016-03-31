<?php
/**
	this is system auto create controller, you can modify it anyway
*/
class IndexAction extends Action
{
	public function index()
	{
		$this->set('val', 'hello world');
		$this->set('tarr', array('框架追求安全', '框架追求可扩展', '框架最求简单', '框架追求高效'));
		$this->display();
	}
}
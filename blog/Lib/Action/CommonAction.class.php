<?php
class CommonAction extends Action{
	//自动验证
	public function _initialize(){
		if(!isset($_SESSION['username'])){
			$this->redirect('Admin/Admin/login');
		}
	}
}
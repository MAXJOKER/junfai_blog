<?php
//后台
class IndexAction extends CommonAction{
	public function index(){
		$this->display();
	}
	//登出
	public function logout(){
		session_unset();
		session_destroy();

		$this->redirect('Admin/Admin/login');
	} 
}
/*
	文章：增加，删除，修改，草稿
	用户：资料修改，增加，删除
	评论管理
	数据图表
	功能管理
*/
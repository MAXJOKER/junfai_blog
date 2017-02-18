<?php
class UploadAction extends CommentAction{
	//上传显示页
	public function upload(){
		$this->display();
	}
	//上传处理
	public function uploadFile(){
		dump($_POST);
	}
	//图片管理页
	public function mPic(){
		$this->display();
	}
	//删除
	public function delete(){

	}
}
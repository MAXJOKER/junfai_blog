<?php
class AdminAction extends Action{
	public function login(){
		$this->display();
	}

	public function verify(){
		import('@.ORG.Image');
		Image::buildImageVerify();
	}

	public function checkLogin(){
		if(!IS_POST) halt('404');
		if(I('verify','','md5')!=session('verify')){
			$this->error('验证码错误');
		}

		$userid=I('username');
		$pwd=I('password','','md5');
		$user=M('User')->where(array('userid'=>$userid))->find();

		if(!$user||$user['password']!=$pwd){
			$this->error('账号或密码错误');
		}
		if($user['status']==0){
			$this->error('账号被锁定');
		}
		$data=array(
			'id'		=> $user['id'],
			'logintime'	=> date('Y-m-d H:i:s',time()),
			'loginip'	=> get_client_ip(),
			'logincount'=> $user['logincount']+1,
		);
		M('User')->save($data);

		session('username',$user['username']);
		session('logintime',$user['logintime']);
		session('loginip',$user['loginip']);

		$this->redirect('Admin/Index/index');
	}
}
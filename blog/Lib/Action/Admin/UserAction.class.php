<?php
class UserAction extends CommonAction{
	//显示用户
	public function users(){
		$users=M('User')->select();
		$this->assign('users',$users);
		$this->display();
	}
	//删除用户
	public function deleteAll(){
		if($_POST['selectaction']==1){
			foreach($_POST['check'] as $key => $value){
				M('User')->delete($value);
			}
		}
		$this->redirect(U('Admin/User/users'));
	}
	//设置用户状态
	public function setStatus(){
		$status=$this->_get('status');
		$id=$this->_get('id');

		if($status==1){
			$data['status']=0;
			M('User')->where(array('id'=>$id))->data($data)->save();
			
		}else{
			$data['status']=1;
			M('User')->where(array('id'=>$id))->data($data)->save();
			
		}
		$this->redirect(U('Admin/User/users'));
	}
	//编辑用户资料,页面
	public function updateUserInfo(){
		$id=$this->_get('id');
		$users=M('User')->where(array('id'=>$id))->select();
		$this->assign('users',$users);
		$this->display();
	}
	//处理用户提交的修改数据
	public function handleUserInfo(){
		//dump($_POST);die;
		$id=$this->_get('id');
		if($_POST['username']==''||$_POST['email']==''){
			$this->error('用户名或邮箱不能为空');
		}else{
			$data['username']	=$this->_post('username');
			$data['email']	 	=$this->_post('email');
			$data['introduce']	=$this->_post('introduce');
			$psw=M('User')->where(array('id'=>$id))->getField('password');
			if($_POST['oldpassword']==''){
				M('User')->where(array('id'=>$id))->data($data)->save();
				$this->redirect(U('Admin/User/updateUserInfo',array('id'=>$id)));
			}else{
				if(md5($_POST['oldpassword'])!=$psw){
					$this->error('密码不正确');
				}else{
					if($_POST['newpassword']!=$_POST['cpassword']){
						$this->error('两次输入的密码不一致');
					}else{
						$data['password']=md5($this->_post('newpassword'));
						M('User')->where(array('id'=>$id))->data($data)->save();
						$this->redirect(U('Admin/User/updateUserInfo',array('id'=>$id)));
					}
				}
			}
		}
	}
}
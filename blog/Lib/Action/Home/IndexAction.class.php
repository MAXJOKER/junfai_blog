<?php
class IndexAction extends Action {

    public function index(){

    	$article=M('article')->limit(5)->select();//获取数据库中article表的信息
    	foreach($article as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$article[$key]=$value;
		}
  		//$me=C('BLOG_NAME');
		// $this->assign('me',$me);
		//$me['name']='关于钧辉的一切';
		//$this->assign('me',$me);
		$this->assign('article',$article);
		$user=M('User')->where(array('id'=>1))->select();
		$this->assign('user',$user);
		$this->display();	
	}

	public function aboutMe(){
		// $me=C('BLOG_NAME');
		$this->assign('me',$me);
		$this->display();
	}
	//照片墙
	public function picture(){
		$this->display();
	}
}
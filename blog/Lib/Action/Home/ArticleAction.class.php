<?php
class ArticleAction extends Action{
	//随笔
	public function essay(){
		//$me['name']='关于钧辉的一切';
		// $me=C('BLOG_NAME');
		// $this->assign('me',$me);
		$article=M('Article')->where(array('articletypeid'=>1))->limit(5)->select();
		foreach($article as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$article[$key]=$value;
		}
		$this->assign('article',$article);
		$this->display();
	}

	//笔记
	public function note(){
		//$me['name']='关于钧辉的一切';
		// $me=C('BLOG_NAME');
		// $this->assign('me',$me);
		$article=M('Article')->where(array('articletypeid'=>2))->limit(5)->select();
		foreach($article as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$article[$key]=$value;
		}
		$this->assign('article',$article);
		$this->display();
	}
	//查看单篇文章
	public function singleArticle(){
		$id=$this->_get('id');
		$article=M('Article')->where(array('id'=>$id))->select();
		foreach($article as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$article[$key]=$value;
		}
		$this->assign('article',$article);
		// $comments=M('Comment')->where(array('articleid'=>$id,'pid'=>0))->order('id asc')->select();
		// $innercomments=M('Comment')->where(array('articleid'=>$id))->order('id asc')->select();
		// $count=count($innercomments);
		// $this->assign('count',$count);
		// $this->assign('comments',$comments);
		// $this->assign('innercomments',$innercomments);
		$comments=M('Comment')->where(array('articleid'=>$id))->order('id asc')->select();
		$count=count($comments);
		$this->assign('count',$count);
		$this->assign('comments',$comments);
		$this->display();
	}
	//评论
	public function comments(){
		// dump($this->_get('id'));
		// dump($_POST);die;
		$id=$this->_get('id');
		$data['articletitle']=M('Article')->where(array('id'=>$id))->getField('title');
		$data['articleid']=$id;
		$data['name']=$this->_post('name');
		$data['email']=$this->_post('mail');
		$data['ccontent']=$this->_post('ccontent');
		$data['ctime']=date('Y-m-d H:i:s',time());
		$data['cip']=get_client_ip();

		if(M('comment')->data($data)->add()){
			$data1['commentcount']=count(M('comment')->where(array('articleid'=>$id))->select());
			M('Article')->where(array('id'=>$id))->data($data1)->save();
			//echo M('Article')->getLastSql();die;
			$this->redirect(U('Home/Article/singleArticle',array('id'=>$id)));
		}else{
			$this->redirect(U('Home/Article/singleArticle'));
		}	
	}
	//回复评论
	public function innerComments(){
		$id=$this->_get('id');
		$pid=$this->_get('pid');
		$pidname=M('comment')->where(array('id'=>$pid))->getField('name');
		// dump($pid);
		// dump($_POST);die;
		$data['pid']=$pid;
		$data['pidname']=$pidname;
		$data['articletitle']=M('Article')->where(array('id'=>$id))->getField('title');
		$data['articleid']=$id;
		$data['name']=$this->_post('name');
		$data['email']=$this->_post('mail');
		$data['ccontent']=$this->_post('ccontent');
		$data['ctime']=date('Y-m-d H:i:s',time());
		$data['cip']=get_client_ip();

		if(M('comment')->data($data)->add()){
			$data1['commentcount']=count(M('comment')->where(array('articleid'=>$id))->select());
			M('Article')->where(array('id'=>$id))->data($data1)->save();
			//echo M('Article')->getLastSql();die;
			$this->redirect(U('Home/Article/singleArticle',array('id'=>$id)));
		}else{
			$this->redirect(U('Home/Article/singleArticle'));
		}	
	}
	//点击作者显示其所有文章
	public function author(){
		$author=$this->_get('author');
		$aArticle=M('Article')->where(array('author'=>$author))->select();
		foreach($aArticle as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$aArticle[$key]=$value;
		}
		$this->assign('aArticle',$aArticle);
		$this->display();
	}
	//点击标签显示相应的文章
	public function tags(){
		$tag=$this->_get('tag');
		$tag=json_encode($tag);
		$tag=preg_replace('/\\\/','\\\\\\\\\\\\\\', $tag);//不知道为什么要这样来匹配才查询成功
		
		$tagarticle=M('Article')->where('tags like '."'%$tag%'")->select();
		
		foreach($tagarticle as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$tagarticle[$key]=$value;
		}
		$count=count($tagarticle);
		$this->assign('count',$count);
		$this->assign('tagarticle',$tagarticle);
		$this->display();
	}
	
}
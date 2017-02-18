<?php 
class ArticleAction extends CommonAction{
	//文章概况
	public function article(){
		$article=M('Article')->select();
		// $article[2]['content']=htmlspecialchars_decode($article[2]['content']);
		// dump($article[2]['content']);die;
		foreach($article as $key => $value){
			// if($value=='tags'){
			// 	$article[$key]=json_decode($value);
			// 	dump($value);
			// 	//dump($article[$key]);
			// }
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$article[$key]=$value;
			//dump($key);dump($value);
		}
		//$article[2]['tags']=json_decode($article[2]['tags'],true);
		//dump($article[2]['tags']);die;
		//dump($article);die;
		//die;
		$this->assign('count',count($article));
		$this->assign('article',$article);
		$this->display();
	}

	//增加文章
	public function addArticle(){
		$this->display();
	}
	//增加文章处理方法
	public function addArticleHandle(){
		$data['title']=$this->_post('title');
		$data['content']=$this->_post('content');
		$data['posttime']=date('Y-m-d H:i:s',time());
		$data['author']=$_SESSION['username'];
		$tags=$this->_post('tags');
		$tags=preg_replace('/(，)/',',', $tags);//将中文逗号统一替换为英文逗号
		$data['tags']=explode(',',$tags);
		$tag=explode(',',$tags);
		$data['tags']=json_encode($tag);
		$data['description']=$this->_post('description');
		$data['articletypeid']=$this->_post('atype');
		if(M('Article')->data($data)->add()){
			$this->success('发布成功',U('Admin/Article/article'));
		}else{
			$this->error('发布失败');
		}
	}
	//删除文章,同时要删除相对应的评论
	public function deleteArticle(){
		$id=$this->_get('id');
		if(M('Article')->delete($id)){
			M('Comment')->where(array('articleid'=>$id))->delete();
			$this->success('删除成功',U('Admin/Article/article'));
		}else{
			$this->error('删除失败',U('Admin/Article/article'));
		}
	}

	//修改文章
	public function updateArticle(){
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
		$this->display();
	}
	//修改文章的处理方法
	public function updateArticleHandle(){
		$id=$this->_get('id');
		$data['title']=$this->_post('title');
		$data['content']=$this->_post('content');
		$data['posttime']=date('Y-m-d H:i:s',time());
		$data['author']=$_SESSION['username'];
		$tags=$this->_post('tags');
		$tags=preg_replace('/(，)/',',', $tags);//将中文逗号统一替换为英文逗号
		$tag=explode(',',$tags);
		// foreach($tag as $key => $value){
		// 	//$data['tags']=$value;
		// 	//$tag[$key]=$value;
		// 	$data['tags'][$key]=$value;
		// }
		//dump($data);die;
		//$data['tags']=$tag;
		//dump($data['tags']);die;
		$data['tags']=json_encode($tag);
		//dump($data['tags']);die;
		$data['description']=$this->_post('description');
		$data['articletypeid']=$this->_post('atype');
		if(M('Article')->where(array('id'=>$id))->data($data)->save()){
			$this->success('编辑成功',U('Admin/Article/article'));
		}else{
			$this->error('编辑失败');
		}
	}

	//存草稿
	public function draft(){
		
	}
	//批量删除文章
	public function deleteAll(){
		//dump($_POST);
		if($_POST['selectaction']==1){
			foreach($_POST['check'] as $key => $value){
				//dump($value);
				/*if(M('Article')->delete($value)){
					$this->success('删除成功',U('Admin/Article/article'));
				}else{
					$this->error('删除失败');
				}*/
				M('Comment')->where(array('articleid'=>$value))->delete();
				M('Article')->delete($value);
			}
		}

		$this->redirect(U('Admin/Article/article'));
	}
	//通过作者查找文章
	public function findAuthor(){
		$author=$this->_get('author');
		$uarticle=M('Article')->where(array('author'=>$author))->select();
		$count=count($uarticle);
		$this->assign('count',$count);
		foreach($uarticle as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$uarticle[$key]=$value;
		}
		$this->assign('uarticle',$uarticle);
		$this->display('author');
	}
	//查找特定类型文章
	public function type(){
		$typeid=$this->_get('typeid');
		$tarticle=M('Article')->where(array('articletypeid'=>$typeid))->select();
		$count=count($tarticle);
		$this->assign('count',$count);
		foreach($tarticle as $key => $value){
			foreach($value as $k=>$v){
				if($k=='tags'){
					$value[$k]=json_decode($v);
				}
			}
			$tarticle[$key]=$value;
		}
		$this->assign('tarticle',$tarticle);
		$this->display();
	}
	//根据tag关键字查找相关文章
	public function tags(){
		$tag=$this->_get('tag');
		$tag=json_encode($tag);
		//dump($tag);
		$tag=preg_replace('/\\\/','\\\\\\\\\\\\\\', $tag);//不知道为什么要这样来匹配才查询成功
		//dump($tag);
		//$where['tags']=array('like','%'.$tag.'%');
		//$tagarticle=M('Article')->where($where)->select();
		$tagarticle=M('Article')->where('tags like '."'%$tag%'")->select();
		//$title='无';
		//$name=M('Article')->where('title like '."'%$title%'")->select();
		//dump($name);

		//echo M('Article')->getLastSql();
		//dump($tagarticle);die;
		//echo M('Article')->getLastSql();die;
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
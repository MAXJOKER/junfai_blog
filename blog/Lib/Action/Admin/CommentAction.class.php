<?php
class CommentAction extends CommonAction{
	//显示评论
	public function index(){
		$comments=M('comment')->order('id asc')->select();
		$count=count($comments);
		$this->assign('comments',$comments);
		$this->assign('count',$count);
		$this->display();
	}
	//删除评论
	public function delComment(){
		$id=$this->_get('id');
		$articleid=$this->_get('articleid');
		if(M('Comment')->delete($id)){
			$data1['commentcount']=count(M('comment')->where(array('articleid'=>$articleid))->select());
			M('Article')->where(array('id'=>$articleid))->data($data1)->save();
			$this->success('删除成功',U('Admin/Comment/index'));
		}else{
			$this->error('删除失败');
		}
	}	
	//删除全部评论
	public function deleteAll(){
		//dump($_POST);die;
		if($_POST['selectaction']==1){
			foreach($_POST['check'] as $key => $value){
				$ids=explode('_',$value);
				if(M('Comment')->delete($ids[0])){
					$data1['commentcount']=count(M('comment')->where(array('articleid'=>$ids[1]))->select());
					M('Article')->where(array('id'=>$ids[1]))->data($data1)->save();
				}
			}
		}
		$this->redirect(U('Admin/Comment/index'));
	}
	//查看先关文章的评论
	public function acomment(){
		$id=$this->_get('id');
		$acomment=M('Comment')->where(array('articleid'=>$id))->select();
		$count=count($acomment);
		$this->assign('count',$count);
		$this->assign('acomment',$acomment);
		//dump($acomment);die;
		$this->display();
	}
}
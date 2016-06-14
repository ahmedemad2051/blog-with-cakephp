<?php

namespace App\View\Cell;

use Cake\View\Cell;

class CommentsCell extends Cell
{
	public function replies($postId,$commentId)
	{
		$this->loadModel('Comments');
		$comments=$this->Comments->find('all')->where(['post_id'=>$postId,'parent'=>$commentId]);
		return $comments;
	}

	public function count($postId,$parent=null)
	{
		$this->loadModel('Comments');
		$comments_count=$this->Comments->find('all')->where(['post_id'=>$postId]);
		if($parent!=null)
		{
			$comments_count->where(['parent'=>$parent]);
		}
		$comments_count=$comments_count->count();
		return $comments_count;
	}
}
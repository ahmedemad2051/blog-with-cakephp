<?php
namespace App\Controller;

use App\Controller\AppController;

class CommentsController extends AppController
{
	public function add()
	{

		$user=$this->Auth->user();
		$this->request->data['user_id']=$this->Auth->user()['id'];
		$comment=$this->Comments->newEntity();
		$comment=$this->Comments->patchEntity($comment,$this->request->data);
		$this->Comments->save($comment);
		$comments=$this->Comments->find('all')->where(['post_id'=>$this->request->data['post_id'],'parent'=>0]);
		$post_id=$this->request->data['post_id'];
		$post=$this->loadModel('Posts')->get($post_id);
		$this->set(compact('comments','post','user'));
		$data=$this->render('/Element/comments')->body();

		 $this->response->body($data);
		 return $this->response;
	}
}
<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class PostsController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Upload');
		$this->loadComponent('Validator');
	}

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['view','show']);
	}

	public function index()
	{
		//$this->Auth->logout();
		$this->set('user',$this->Auth->user());
	}

	public function view($id)
	{
		$user=$this->Auth->user();
		$post=$this->Posts->get($id);
		$comments=$this->loadModel('Comments')->find('all')->where(['post_id'=>$id,'parent'=>0]);
		
		$this->set(compact('user','post','comments'));

	}


	public function show($id)
	{
		$user=$this->Auth->user();
		$posts=$this->Posts->find('all')->where(['user_id'=>$id]);
		$author=$this->loadModel('Users')->get($id)['name'];

		$this->set(compact('user','posts','author'));

	}



	public function edit($id)
	{
		$user=$this->Auth->user();
		$post=$this->Posts->get($id);
		$this->set(compact('user','post'));


		if($this->request->is(['post','put','patch']))
		{
			$errors=$this->Validator->validPost($this->request->data);
			if(empty($errors))
			{
				$file=$this->request->data['file'];
				$post=$this->loadModel('Posts')->get($id);
				$data=[
				'title'=>$this->request->data['title'],
				'content'=>$this->request->data['content'],
				'user_id'=>$user['id']
				];

				if($filename=$this->Upload->send($file,false))
				{
					$data['img_url']=$filename;
				}
				$post=$this->loadModel('Posts')->patchEntity($post,$data);
				if($this->loadModel('Posts')->save($post))
				{
					$this->Flash->success(__('post updated successfully'));
					return $this->redirect(['action'=>'view','id'=>$id]);
				}
			}
			else
			{
				$this->set('errors',$errors);
			}
		}
	}

	
	// delete posts

	public function delete($id)
	{
		if($this->request->is(['post','delete']))
		{
	
			$post=$this->Posts->get($id);
			$path=WWW_ROOT.'img'.DS.'uploads/'.$post['img_url'];
			if(file_exists($path))
			{
				
				if($this->Posts->delete($post))
				{
					unlink($path);
					$this->Flash->success(__('Data deleted successfully'));
					return $this->redirect(['controller'=>'Users','action'=>'home']);
				}
			}
		
			$this->Flash->error(__('Data failed to delete'));
			return $this->redirect(['controller'=>'Users','action'=>'home']);
			
		}
	}




}
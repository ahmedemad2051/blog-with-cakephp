<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
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
		$this->Auth->allow('register');
	}
	public function home()
	{
		$this->login();
		$user=$this->Auth->user();
		$data['limit']=6;
		if($user)
		{
			$data['conditions']=['user_id !='=>$user['id']];
		}
		$this->paginate=$data;
		$posts=$this->paginate('Posts');
		
	
		$this->set(compact('user','posts'));

	}


	public function profile()
	{

		$user=$this->Auth->user();
		
		$this->paginate=['limit'=>6,'conditions'=>['user_id'=>$user['id']]];
		$posts=$this->paginate('Posts');
		$this->set(compact('user','posts'));


		if($this->request->is('post'))
		{
			$errors=$this->Validator->validPost($this->request->data);
			if(empty($errors))
			{
				$file=$this->request->data['file'];
				if($filename=$this->Upload->send($file))
				{
					$post=$this->loadModel('Posts')->newEntity();
					$data=[
					'title'=>$this->request->data['title'],
					'content'=>$this->request->data['content'],
					'img_url'=>$filename,
					'user_id'=>$user['id']
					];
					$post=$this->loadModel('Posts')->patchEntity($post,$data);
					if($this->loadModel('Posts')->save($post))
					{
						$this->Flash->success(__('post added successfully'));
						return $this->redirect(['action'=>'profile']);
					}
				}
			}
			else
			{
				$this->set('errors',$errors);

			}
	
		}
	}

	public function register()
	{

		$user=$this->Auth->user();
		$this->set(compact('user'));

		
		if($this->request->is('post'))
		{
			$errors=$this->Validator->validRegister($this->request->data);
			if(empty($errors))
			{
				if($this->request->data['password']===$this->request->data['confirm'])
				{
					$file=$this->request->data['file'];
					if($filename=$this->Upload->send($file,true,'users'))
					{
						$this->request->data['img_url']=$filename;
						$user=$this->Users->newEntity();
						$user=$this->Users->patchEntity($user,$this->request->data);
						if($this->Users->save($user))
						{
							$this->Flash->success(__('User added successfully'));
							return $this->redirect(['action'=>'home']);
						}
					}
				}
				else
				{
					$this->Flash->error(__('password not match!'));
				}
		
			}
			else
			{
				$this->set('errors',$errors);
			}
		}

	}

	public function login()
	{
		if($this->request->is('post'))
		{

			$user=$this->Auth->identify();
			if($user)
			{
				$this->Auth->setUser($user);
			}
		}
	}

	public function logout()
	{
		$this->Auth->logout();
		return $this->redirect(['action'=>'home']);
	}


}
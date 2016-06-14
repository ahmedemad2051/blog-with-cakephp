<?php
namespace App\Controller;

use App\Controller\AppController;


class AdminsController extends AppController
{
	public function index()
	{
		$user=$this->Auth->user();
		$users=$this->loadModel('Users')->find('all')->where(['id !='=>$user['id']]);
		$this->set(compact('user','users'));
	}

// change user role (admin/user)
	public function changeRole($id)
	{
		if($this->request->is('post'))
		{
			
			$user=$this->loadModel('Users')->get($id);
			if($user['role']=='admin')
			{
				$data['role']='user';
			}
			else
			{
				$data['role']='admin';
			}
			$user=$this->loadModel('Users')->patchEntity($user,$data);
			if($this->loadModel('Users')->save($user))
			{
				$this->Flash->success('user role changed successfully');
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error('user role not changed ');
		}
	}

// delete user
	public function delete($id)
	{
		if($this->request->is('post'))
		{
			
			$user=$this->loadModel('Users')->get($id);
			$path=WWW_ROOT.'img'.DS.'users/'.$user['img_url'];
			if(file_exists($path))
			{
				if($this->loadModel('Users')->delete($user))
				{
					unlink($path);
					$this->Flash->success('user deleted successfully');
					return $this->redirect(['action'=>'index']);
				}
				
			}
			
		
			$this->Flash->error('user not deleted');
		}
	}
}
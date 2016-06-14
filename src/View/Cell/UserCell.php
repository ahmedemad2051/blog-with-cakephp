<?php

namespace App\View\Cell;

use Cake\View\Cell;

class UserCell extends Cell
{
	public function get($id)
	{
		$this->loadModel('Users');
		$user=$this->Users->get($id);
		return $user;
	}
}
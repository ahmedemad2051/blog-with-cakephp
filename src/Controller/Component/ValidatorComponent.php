<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Validation\Validator;

class ValidatorComponent extends Component
{
	public function validPost($data)
	{
		$validator=new Validator();
		$validator
		->requirePresence('title')
		->notEmpty('title','error! title field is empty')
		->requirePresence('content')
		->notEmpty('content','error! content field is empty')
		;
		$errors=$validator->errors($data);
		return $errors;
	}

	public function validRegister($data)
	{
		$validator=new Validator();
		$validator
		->requirePresence('name')
		->notEmpty('name','error! name field is empty')
		->requirePresence('email')
		->notEmpty('email','error! email field is empty')
		->add('email','validFormat',['rule'=>'email','message'=>'email must be valid'])
		//->add('email','unique',['rule'=>'validateUnique','provider'=>'UsersTable','message'=>'this email is already register before'])
		;
		$errors=$validator->errors($data);
		return $errors;
	}
}
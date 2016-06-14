<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
class UsersTable extends Table
{

	public function initialize(array $config)
	{
		$this->hasMany('Posts');
	}

	public function buildRules(RulesChecker $rules)
	{
		// make email is unique
		$rules->add($rules->isUnique(['email']));
		return $rules;
	}
}
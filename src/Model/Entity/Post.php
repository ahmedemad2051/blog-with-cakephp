<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity
{

	protected function _setTitle($title)
	{
		return htmlspecialchars($title);
	}

	protected function _setContent($comment)
	{
		return htmlspecialchars($comment);
	}


}
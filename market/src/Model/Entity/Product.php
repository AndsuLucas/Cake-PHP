<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
	public function getDiscount()
	{
		return $this->price * 0.9;
	}

}
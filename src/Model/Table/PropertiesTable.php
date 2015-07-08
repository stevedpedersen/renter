<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PropertiesTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
	}

	public function isOwnedBy($propertyId, $userId)
	{
	    return $this->exists(['id' => $propertyId, 'user_id' => $userId]);
	}
}
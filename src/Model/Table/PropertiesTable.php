<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PropertiesTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
	}
}
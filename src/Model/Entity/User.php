<?php

// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
	public $hasMany = array(
		'Property' => array(
			'className' => 'Property',
			'foreignKey' => 'id'
		)
	);

	public function get_id() { return $this->id; }
	public function get_first_name() { return $this->first_name; }
	public function get_username() { return $this->username; }

	public function set_id($v) { $this->id = $v; }

    // Make all fields mass assignable for now.
    protected $_accessible = ['*' => true];

    // ...

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    // ...
}
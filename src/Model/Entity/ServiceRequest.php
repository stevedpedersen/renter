<?php

// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class ServiceRequest extends Entity
{

    // Make all fields mass assignable for now.
    protected $_accessible = ['*' => true];

}
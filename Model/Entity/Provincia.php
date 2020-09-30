<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Provincia extends Entity
{
    protected $_accessible = [
        '*'             => true,
        'id'            => false,
        'nombre'        => false,
        'localidad_id'  => false,
    ];
}
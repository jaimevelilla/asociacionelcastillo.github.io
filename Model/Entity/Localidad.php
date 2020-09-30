<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Localidad extends Entity
{
    protected $_accessible = [
        '*'             => true,
        'id'            => false,
        'nombre'        => false,
        'comunidad_id'  => false,
    ];
}
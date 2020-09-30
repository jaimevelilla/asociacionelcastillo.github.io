<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CentroTipo extends Entity
{
    protected $_accessible = [
        '*'           => false,
        'id'          => true,
        'nombre'      => true,
    ];
}
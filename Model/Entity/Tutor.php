<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tutor extends Entity
{
    protected $_accessible = [
        '*'                 => false,
        'id'                => true,
        'nombre'            => true,
        'apellidos'         => true,
        'nif'               => true,
        'telefono'          => true,
        'email'             => true,
        'cursos'            => true,
        'prefijo'           => true,
        'observaciones'     => true,
        'centro_id'         => true,
    ];
}
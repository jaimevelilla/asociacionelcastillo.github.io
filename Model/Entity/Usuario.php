<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Usuario extends Entity
{
    protected $_accessible = [
        '*'           => false,
        'id'          => true,
        'nombre'      => true,
        'apellido'    => true,
        'username'    => true,
        'password'    => true,
        'comentarios' => true,
        'email'       => true,
        'centro_id'   => true,
        'rol_id'      => true,
    ];
}
<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Centro extends Entity
{
    protected $_accessible = [
        '*'                       => false,
        'id'                      => true,
        'nombre'                  => true,
        'nombre_corto'            => true,
        'nif'                     => true,
        'direccion'               => true,
        'telefono'                => true,
        'fax'                     => true,
        'email'                   => true,
        'contacto'                => true,
        'num_aulas'               => true,
        'descripcion'             => true,
        'comentarios'             => true,
        'tipo_id'                 => true,
        'provincia_id'            => true,
        'centro_plataforma_dato'  => true,
    ];
}
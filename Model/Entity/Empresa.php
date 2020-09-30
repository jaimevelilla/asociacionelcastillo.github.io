<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Empresa extends Entity
{
    protected $_accessible = [
        '*'                     => false,
        'id'                    => true,
        'nombre'                => true,
        'telefono'              => true,
        'contacto'              => true,
        'fax'                   => true,
        'cif'                   => true,
        'seguridad_social'      => true,
        'email'                 => true,
        'web'                   => true,
        'numero_trabajadores'   => true,
        'actividad_empresarial' => true,
        'direccion'             => true,
        'localidad_id'          => true,
        'codigo_postal'         => true,
    ];
}
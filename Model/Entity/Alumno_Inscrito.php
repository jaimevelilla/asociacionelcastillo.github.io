<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Alumno_Inscrito extends Entity
{
    protected $_accessible = [
        '*'                         => false,
        'id'                        => true,
        'nombre'                    => true,
        'apellidos'                 => true,
        'telefono'                  => true,
        'email'                     => true,
        'empresa_id'                => true,
        'cif'                       => true,
        'sector'                    => true,
        'nif'                       => true,
        'nss'                       => true,
        'fecha_nacimiento'          => true,
        'direccion'                 => true,
        'comunidad_id'              => true,
        'provincia_id'              => true,
        'localidad_id'              => true,
        'cp'                        => true,
        'trabajador'                => true,
        'comentarios'               => true,
        'fecha_creacion'            => true,
        'discapacitado'             => true,
        'pyme'                      => true,
        'larga'                     => true,
        'centro'                    => true,
        'numero_matricula'          => true,
        'confirmado_email'          => true,
        'telefono_empresa'          => true,
        'persona_empresa'           => true,
        'centro_origen'             => true,
    ];
}
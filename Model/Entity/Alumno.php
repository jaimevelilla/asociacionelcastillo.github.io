<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Alumno extends Entity
{
    protected $_accessible = [
        '*'                         => false,
        'id'                        => true,
        'nombre'                    => true,
        'apellidos'                 => true,
        'usuario'                   => true,
        'contrasenia'               => true,
        'telefono'                  => true,
        'email'                     => true,
        'skype'                     => true,
        'empresa_id'                => true,
        'nif'                       => true,
        'nacionalidad'              => true,
        'nss'                       => true,
        'fecha_nacimiento'          => true,
        'sexo'                      => true,
        'discapacitado'             => true,
        'direccion'                 => true,
        'cp'                        => true,
        'comunidad_id'              => true,
        'provincia_id'              => true,
        'localidad_id'              => true,
        'nivel_estudio_valores'     => true,
        'otra_titulacion'           => true,
        'area_funcional_valores'    => true,
   'categoria_profesional_valores'  => true,
        'situacion_laboral_valores' => true,
        'comentarios'               => true,
        'numero_matricula'          => true,
        'modificado_por'            => true,
        'borrado'                   => true,
        'centro_id'                 => true,
    ];
}
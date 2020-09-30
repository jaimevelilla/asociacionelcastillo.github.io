<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CentroPlataformaDato extends Entity
{
    protected $_accessible = [
        '*'                             => false,
        'id'                            => true,
        'centro_id'                     => true,
        'tecnico_email'                 => true,
        'tecnico_telefono'              => true,
        'admin_email'                   => true,
        'admin_telefono'                => true,
        'reclamaciones_email'           => true,
        'horario'                       => true,
        'preinscripcion_email'          => true,
        'preinscripcion_telefono'       => true,
        'plataforma_logo'               => true,
        'plataforma_url'                => true,
        'plataforma_admin_username'     => true,
        'plataforma_admin_password'     => true,
        'plataforma_tutor_username'     => true,
        'plataforma_tutor_password'     => true,
        'plataforma_alumno_username'    => true,
        'plataforma_alumno_password'    => true,
        'plataforma_estado'             => true,
        'webservice_url'                => true,
        'webservice_credenciales'       => true,
        'webservice_estado'             => true,
    ];
}
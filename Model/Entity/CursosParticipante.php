<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CursosParticipante extends Entity
{
    protected $_accessible = [
        '*'                        => false,
        'id'                       => true,
        'curso_id'                 => true,
        'participante_id'          => true,
        'role'                     => true,
        'nombre'                   => true,
        'apellidos'                => true,
        'telefono'                 => true,
        'email'                    => true,
        'email_contrasenia'        => true,
        'empresa'                  => true,
        'usuario'                  => true,
        'contrasenia'              => true,
        'envio_claves'             => true,
        'envio_mail'               => true,
        'envio_claves_sms'         => true,
        'fecha_creacion'           => true,
        'borrado'                  => true,
        'bonificada'               => true,
        'confirm_claves'           => true,
        'centro'                   => true,
        'cerrado'                  => true,
        'confirm_visita_virtual'   => true,
        'envio_mail_visita_virtual'=> true,
    ];
}
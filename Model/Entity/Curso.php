<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Curso extends Entity
{
    protected $_accessible = [
        '*'                     => false,
        'id'                    => true,
        'nombre_id'             => true,
        'nombre_texto'          => true,
        'grupo_oficial'         => true,
        'expediente'            => true,
        'accion_formativa'      => true,
        'bonificada'            => true,
        'inicio'                => true,
        'fin'                   => true,
        'hora_inicio'           => true,
        'hora_fin'              => true,
        'num_eval'              => true,
        'duracion'              => true,
        'solicitante'           => true,
        'ejecutor'              => true,
        'impartidor'            => true,
        'plataforma'            => true,
        'modalidad_id'          => true, 
        'factura'               => true,
        'curso_moodle_shortname'=> true,
        'curso_moodle_id'       => true, 
        'grupo_moodle'          => true,
        'observaciones'         => true,    
        'borrado'               => true,        
        'contenidos'            => true,        
        'certificado'           => true,        
        'centro_id'             => true,        
        'aviso'                 => true,        
    ];
}
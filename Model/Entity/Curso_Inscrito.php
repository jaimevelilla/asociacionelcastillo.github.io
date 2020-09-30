<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Curso_Inscrito extends Entity
{
    protected $_accessible = [
        '*'                         => false,
        'id'                        => true,
        'curso'                     => true,
        'alumno_id'                 => true,
        'certificado_id'            => true,
        'centro_id'                 => true,
    ];
}
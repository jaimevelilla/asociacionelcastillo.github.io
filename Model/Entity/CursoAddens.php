<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CursoAddens extends Entity
{
    protected $_accessible = [
        '*'                              => false,
        'id'                             => true,
        'nombre'                         => true,
        'area_id'                        => true,
        'duracion'                       => true,
        'centro_id'                      => true,
        'producido'                      => true,
        'modulos'                        => true,
        'temario'                        => true,
        'i_objetivos'                    => true,
    ];
}
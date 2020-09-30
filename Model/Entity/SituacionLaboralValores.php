<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class SituacionLaboralValores extends Entity
{
    protected $_accessible = [
        '*'                       => false,
        'id'                      => true,
        'valor'                  => true,
    ];
}
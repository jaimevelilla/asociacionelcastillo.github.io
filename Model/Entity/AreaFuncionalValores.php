<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class AreaFuncionalValores extends Entity
{
    protected $_accessible = [
        '*'                       => false,
        'id'                      => true,
        'valor'                  => true,
    ];
}
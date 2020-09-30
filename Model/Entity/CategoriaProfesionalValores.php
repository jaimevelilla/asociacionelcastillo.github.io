<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CategoriaProfesionalValores extends Entity
{
    protected $_accessible = [
        '*'                       => false,
        'id'                      => true,
        'valor'                  => true,
    ];
}
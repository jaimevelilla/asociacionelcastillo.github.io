<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CentrosTable extends Table
{
    public function initialize(array $config): void
    {
        //$this->addBehavior('Timestamp');
        $this->hasOne('CentroPlataformaDatos');
        $this->hasOne('CentroTipos');
    }
}
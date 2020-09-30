<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CentroPlataformaDatosTable extends Table
{
    public function initialize(array $config): void
    {
        //$this->addBehavior('Timestamp');
        $this->belongsTo('Centros');

        /*$this->addBehavior('Josegonzalez/Upload.Upload', [
            // You can configure as many upload fields as possible,
            // where the pattern is `field` => `config`
            //
            // Keep in mind that while this plugin does not have any limits in terms of
            // number of files uploaded per request, you should keep this down in order
            // to decrease the ability of your users to block other requests.
            'plataforma_logo' => [

            ]
        ]);*/
    }
}
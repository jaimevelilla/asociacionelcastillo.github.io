<?php

namespace App\Controller;

class LocalidadesController extends AppController
{
    
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        $this->loadModel('Localidades');
    }

    public function getLocalidadesByProvincia() {

        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {
            $comunidad_id = (int) $this->request->getData("id");
            //debug($comunidad_id);
        
            $provincias = $this->Provincias->findByComunidadId($comunidad_id)->all();
            //debug($this->request->getData("id"));
            //debug(json_decode($this->request->getData("id")));
            $provincia_id = (int) $this->request->getData("id");
            //debug($provincia_id);
        
            $localidades = $this->Localidades->findByProvinciaId($provincia_id)->all();
            //debug($localidades);
        
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode([
                //'provincias'  => $provincias,
                'localidades' => $localidades
            ]));

        }
    }

}

?>
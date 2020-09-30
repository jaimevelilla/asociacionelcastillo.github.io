<?php

namespace App\Controller;

class ProvinciasController extends AppController
{
    
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        $this->loadModel('Localidades');
    }

    public function getProvinciasByComunidad() {

        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {

            //debug($this->request->getData("id"));
            //debug(json_decode($this->request->getData("id")));
            $comunidad_id = (int) $this->request->getData("id");
            //debug($comunidad_id);
        
            $provincias = $this->Provincias->findByComunidadId($comunidad_id)->all();
            //debug($provincias);
        
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode([
                'provincias' => $provincias
            ]));

        }
    }

}

?>
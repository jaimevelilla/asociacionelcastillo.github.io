<?php

namespace App\Controller;

class EmpresasController extends AppController
{
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        $this->loadModel('Localidades');
    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();

        $empresas = $this->Paginator->paginate($this->Empresas->find());
        
        foreach ($empresas as $empresa) {
            //debug($empresa);
            $localidad = (int) $empresa->localidad_id;
            if ($localidad > 0) {
                $localidad = $this->Localidades->findById($localidad)->firstOrFail()->nombre;//->all()->toArray();
            } else {
                $localidad = "Desconocida";
            }
            $empresa->localidad = $localidad;
        }
        //$this->set(compact('localidades'));
        
        $this->set(compact('empresas'));

    }//fin index
    
    public function ver($id) 
    {
        $empresa = $this->Empresas->findById($id)->firstOrFail();
        $this->Authorization->authorize($empresa);
        $localidad_id = (int) $empresa->localidad_id;

        if ($localidad_id > 0) {
            $localidad = $this->Localidades->findById($localidad_id)->firstOrFail();
            $provincia_id = $localidad->provincia_id;
            $localidad_text = $localidad->nombre;
    
            $empresa->localidad = $localidad_text;
            
            $provincia = $this->Provincias->findById($provincia_id)->firstOrFail();
            $empresa->provincia = $provincia->nombre;

            $comunidad = $this->Comunidades->findById($provincia->comunidad_id)->firstOrFail();
            $empresa->comunidad = $comunidad->nombre;
        } else {
            $empresa->localidad = "Desconocida";
            $empresa->provincia = "Desconocida";
            $empresa->comunidad = "Desconocida";
        }
        
        $this->set(compact('empresa'));
    }//fin ver

    public function insertar() 
    {
        $nueva_empresa = $this->Empresas->newEmptyEntity();
        $this->Authorization->authorize($nueva_empresa);

        if($this->request->is('post')) {
           $nueva_empresa = $this->Empresas->patchEntity($nueva_empresa, $this->request->getData());
            
            //debug($nueva_empresa);
            //debug($this->request->getData());
            
            if ($this->Empresas->save($nueva_empresa)) {
                $this->Flash->success(__('La empresa ha sido añadida exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir la empresa.'));
        }

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
        
        $this->set('empresa', $nueva_empresa);
    }//fin insertar

    public function editar($id) {
        $empresa = $this->Empresas->findById($id)->firstOrFail();
        $this->Authorization->authorize($empresa);
        $this->set(compact('empresa'));

        if ($this->request->is(['post', 'put'])) {
            $this->Empresas->patchEntity($empresa, $this->request->getData());

            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__("La empresa ha sido editada exitosamente."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("No se ha podido editar la empresa."));
            
            if ($empresa->hasErrors()) {
                $errors = $empresa->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }
        
        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
    }//fin editar

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $empresa = $this->Empresas->findById($id)->firstOrFail();
        $this->Authorization->authorize($empresa);

        $empresa_deleted = $this->Empresas->delete($empresa);
        if ($empresa_deleted) {
            $this->Flash->success(__("La empresa ha sido eliminada exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }//fin eliminar
       

    public function search() {
        if (!isset($this->request->query['nombre'])) {
            throw new BadRequestException();
        }
        
        $results = $this->Empresas->findByKeywords($this->request->query['nombre']);

        $this->set('results', $results);
    }

}//fin class EmpresasController
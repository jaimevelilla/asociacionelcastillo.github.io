<?php

namespace App\Controller;

class TutoresController extends AppController
{
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('Centros');
    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();

        $tutores = $this->Paginator->paginate($this->Tutores->find());

        foreach ($tutores as $tutor) {
            //debug($empresa);
            $centro = (int) $tutor->centro_id;
            if ($centro > 0) {
                $centro = $this->Centros->findById($centro)->firstOrFail()->nombre_corto;//->all()->toArray();
            } else {
                $centro = "Desconocido";
            }
            $tutor->centro = $centro;
        }
        
        $this->set(compact('tutores'));

    }//fin index
    
    public function ver($id) 
    {
        $tutor = $this->Tutores->findById($id)->firstOrFail();
        $this->Authorization->authorize($tutor);

        $centro = (int) $tutor->centro_id;
        if ($centro > 0) {
            $centro = $this->Centros->findById($centro)->firstOrFail()->nombre_corto;//->all()->toArray();
        } else {
            $centro = "Desconocido";
        }
        $tutor->centro = $centro;
        $this->set(compact('tutor'));

    }//fin ver

    public function insertar() 
    {
        //$this->Authorization->skipAuthorization();
        
        $nuevo_tutor = $this->Tutores->newEmptyEntity();
        $this->Authorization->authorize($nuevo_tutor);

        if($this->request->is('post')) {
           $nuevo_tutor = $this->Tutores->patchEntity($nuevo_tutor, $this->request->getData());
            
           // debug($nuevo_tutor);
           // debug($this->request->getData());
            
            if ($this->Tutores->save($nuevo_tutor)) {
                $this->Flash->success(__('El tutor ha sido añadido exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir el tutor.'));
        }

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre_corto'];
        $centros = $this->Centros->find('list', $select_list)->all();
        $this->set(compact('centros'));
        
        $this->set('tutor', $nuevo_tutor);
    }//fin insertar

    public function editar($id) {
        $tutor = $this->Tutores->findById($id)->firstOrFail();
        //$this->Authorization->skipAuthorization();
        $this->Authorization->authorize($tutor);
        $this->set(compact('tutor'));

        if ($this->request->is(['post', 'put'])) {
            $this->Tutores->patchEntity($tutor, $this->request->getData());

            if ($this->Tutores->save($tutor)) {
                $this->Flash->success(__("El tutor ha sido editado exitosamente."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("No se ha podido editar el tutor."));
            
            if ($tutor->hasErrors()) {
                $errors = $tutor->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }
        
        $select_list = ['keyField' => 'id', 'valueField' => 'nombre_corto'];
        $centros = $this->Centros->find('list', $select_list)->all();
        $this->set(compact('centros'));
    }//fin editar

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $tutor = $this->Tutores->findById($id)->firstOrFail();
        //$this->Authorization->skipAuthorization();
        $this->Authorization->authorize($tutor);

        $tutor_deleted = $this->Tutores->delete($tutor);
        if ($tutor_deleted) {
            $this->Flash->success(__("El tutor ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }//fin eliminar

}//fin class EmpresasController
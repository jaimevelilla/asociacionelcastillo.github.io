<?php

namespace App\Controller;

class CursosController extends AppController
{
    public function initialize(): void 
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('Centros');
        $this->loadModel('CursosAddens');
        $this->loadModel('CursosParticipantes');
        $this->loadModel('Tutores');
        $this->loadModel('Alumnos');
    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();
        $cursos = $this->Paginator->paginate($this->Cursos->find());
        $this->set(compact('cursos'));
    }//fin index
    
    public function ver($id) 
    {
        $curso = $this->Cursos->findById($id)->firstOrFail();
        $this->Authorization->authorize($curso);
        
       /* $solicitante = $this->Centros->findById($centro->nombre_corto)->firstOrFail();
        $cursos->solicitante = $centro->nombre_corto; */
        
        $this->set(compact('curso')); 

    }//fin ver

    public function insertar() 
    {
        $nuevo_curso = $this->Cursos->newEmptyEntity();
        $this->Authorization->authorize($nuevo_curso);

        if($this->request->is('post')) {
           $nuevo_curso = $this->Cursos->patchEntity($nuevo_curso, $this->request->getData());
            
            if ($this->Cursos->save($nuevo_curso)) {
                $this->Flash->success(__('El curso ha sido añadida exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir el curso.'));
        }

        $this->set('curso', $nuevo_curso);
    }//fin insertar

    public function editar($id) {
        $curso = $this->Cursos->findById($id)->firstOrFail();
        $this->Authorization->authorize($curso);
        $this->set(compact('curso'));

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        
        $cursos_addens = $this->CursosAddens->find('list', $select_list)->all()->toArray();
        $this->set(compact('cursos_addens'));

        $solicitantes = $this->Centros->find('list', $select_list)->all()->toArray();
        $this->set(compact('solicitantes'));

        if ($this->request->is(['post', 'put'])) {
            $this->Cursos->patchEntity($curso, $this->request->getData());

            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__("El curso ha sido editada exitosamente."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("No se ha podido editar el curso."));
            
            if ($curso->hasErrors()) {
                $errors = $curso->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }
        
        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

    }//fin editar

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $curso = $this->Cursos->findById($id)->firstOrFail();
        $this->Authorization->authorize($curso);

        $curso_deleted = $this->Cursos->delete($curso);
        if ($curso_deleted) {
            $this->Flash->success(__("El curso ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }//fin eliminar


    public function participantes($id)
    {
        $curso = $this->Cursos->findById($id)->firstOrFail();
        $this->Authorization->authorize($curso);

        $participantes = $this->CursosParticipantes->find('all')->where(['curso_id =' => $curso->id])->all();
        $tutores = array();
        $alumnos = array();

        foreach ($participantes as $p) {
            $participante_id = $p->participante_id;
            $rol_id = $p->role;
            // para poder coger usuario y contrasenia en el index.php
            $usuario = $p->usuario;
            $contrasenia = $p->contrasenia;
            
            if ($rol_id == '4') {
                $participante = $this->Alumnos->findById($participante_id)->first();
                if (!empty($participante)) {
                    $participante->rol_id = $rol_id;
                    $participante->usuario = $usuario;
                    $participante->contrasenia = $contrasenia;      
                    $alumnos[] = $participante;
                }
            }
            else if ($rol_id == '2' || $rol_id == '3') {
                $participante = $this->Tutores->findById($participante_id)->first();
                if (!empty($participante)) {
                    $participante->rol_id = $rol_id;
                    $participante->usuario = $usuario;
                    $participante->contrasenia = $contrasenia;
                    $tutores[] = $participante;
                } 
            }
        }

        //debug($tutores);
        //debug($alumnos);
    
        $this->set(compact('curso'));
        $this->set(compact('tutores'));
        $this->set(compact('alumnos'));
        
    }


}//fin class CursosController
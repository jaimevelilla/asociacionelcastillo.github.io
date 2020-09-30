<?php

namespace App\Controller;

class AlumnosInscritosController extends AppController
{
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        $this->loadModel('Localidades');
       // $this->loadModel('NivelEstudiosValores');
       // $this->loadModel('SituacionLaboralValores');
       // $this->loadModel('CategoriaProfesionalValores');
       // $this->loadModel('AreaFuncionalValores');

    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();

        $alumnos_inscritos = $this->Paginator->paginate($this->AlumnosInscritos->find());
        
        $this->set(compact('alumnos_inscritos'));

    }//fin index
    
    public function ver($id) 
    {
    /*    $alumno_inscrito = $this->AlumnosInscritos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno);
       
        // Convertir el id de comunidad,provincia y localidad en texto (o en Desconocida si el valor es NULL).
        $localidad_id = $alumno_inscrito->localidad_id;
        if ($localidad_id > 0) {
            $localidad = $this->Localidades->findById($localidad_id)->firstOrFail();
            $provincia_id = $localidad->provincia_id;
            $localidad_text = $localidad->nombre;
    
            $alumno_inscrito->localidad = $localidad_text;
            
            $provincia = $this->Provincias->findById($provincia_id)->firstOrFail();
            $alumno_inscrito->provincia = $provincia->nombre;

            $comunidad = $this->Comunidades->findById($provincia->comunidad_id)->firstOrFail();
            $alumno_inscrito->comunidad = $comunidad->nombre;
        } else {
            $alumno_inscrito->localidad = "Desconocida";
            $alumno_inscrito->provincia = "Desconocida";
            $alumno_inscrito->comunidad = "Desconocida";
        }

        // Convertir el bit 0|1 en No|Si en discapacitado y borrado
        $discapacitado = (int) $alumno->discapacitado;
        if ($discapacitado == 0) {
            $alumno->discapacitado = "No";
        } elseif ($discapacitado == 1) {
        
            $alumno->discapacitado = "Sí";
        } 

        $borrado = (int) $alumno->borrado;
        if ($borrado == 0) {
            $alumno->borrado = "No";

        } elseif ($borrado == 1) {
        
            $alumno->borrado = "Sí";
        } 
        $this->set(compact('alumno'));
    */
    }//fin ver

    public function insertar() 
    {
    /*
        $nuevo_alumno_inscrito = $this->AlumnosInscritos->newEmptyEntity();
        $this->Authorization->authorize($nuevo_alumno_inscrito);

        if($this->request->is('post')) {
           $nuevo_alumno_inscrito = $this->AlumnosInscritos->patchEntity($nuevo_alumno_inscrito, $this->request->getData());
            
            //debug($nuevo_alumno);
            //debug($this->request->getData());
            
            if ($this->AlumnosInscritos->save($nuevo_alumno_inscrito)) {
                $this->Flash->success(__('El alumno ha sido añadida exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir el alumno.'));
        }

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
        
        $this->set('alumno_inscrito', $nuevo_alumno_inscrito);
    */
    }//fin insertar

    public function editar($id) {
    /*
        $alumno_inscrito = $this->AlumnosInscritos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno_inscrito);
        $this->set(compact('alumno_inscrito'));

        if ($this->request->is(['post', 'put'])) {
            $this->AlumnosInscritos->patchEntity($alumno_inscrito, $this->request->getData());

            if ($this->AlumnosInscritos->save($alumno_inscrito)) {
                $this->Flash->success(__("El alumno_inscrito ha sido editada exitosamente."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("No se ha podido editar el alumno."));
            
            if ($alumno_inscrito->hasErrors()) {
                $errors = $alumno_inscrito->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }
        
        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
        $provincias = $this->Provincias->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));  
        $localidades = $this->Localidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
    */
    }//fin editar

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $alumno_inscrito = $this->AlumnosInscritos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno_inscrito);
        $alumno_deleted = $this->AlumnosInscritos->delete($alumno_inscrito);

        if ($alumno_inscrito_deleted) {
            $this->Flash->success(__("El alumno ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    
    }//fin eliminar

}//fin class AlumnosController
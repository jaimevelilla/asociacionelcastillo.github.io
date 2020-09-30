<?php

namespace App\Controller;

class AlumnosController extends AppController
{
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        $this->loadModel('Localidades');
        $this->loadModel('NivelEstudiosValores');
        $this->loadModel('SituacionLaboralValores');
        $this->loadModel('CategoriaProfesionalValores');
        $this->loadModel('AreaFuncionalValores');

    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();

        $alumnos = $this->Paginator->paginate($this->Alumnos->find());
        
        $this->set(compact('alumnos'));

    }//fin index
    
    public function ver($id) 
    {
        $alumno = $this->Alumnos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno);
       
        // Convertir el id de comunidad,provincia y localidad en texto (o en Desconocida si el valor es NULL).
        $localidad_id = $alumno->localidad_id;
        if ($localidad_id > 0) {
            $localidad = $this->Localidades->findById($localidad_id)->firstOrFail();
            $provincia_id = $localidad->provincia_id;
            $localidad_text = $localidad->nombre;
    
            $alumno->localidad = $localidad_text;
            
            $provincia = $this->Provincias->findById($provincia_id)->firstOrFail();
            $alumno->provincia = $provincia->nombre;

            $comunidad = $this->Comunidades->findById($provincia->comunidad_id)->firstOrFail();
            $alumno->comunidad = $comunidad->nombre;
        } else {
            $alumno->localidad = "Desconocida";
            $alumno->provincia = "Desconocida";
            $alumno->comunidad = "Desconocida";
        }

        // nivel_estudio_valores en tabla alumnos es un id, esto lo convierte en texto 
        //según la columna valor de la tabla nivel_estudio_valores 
        $estudio = (int) $alumno->nivel_estudio_valores;
        if ($estudio > 0) {
            $estudio = $this->NivelEstudiosValores->findById($estudio)->firstOrFail()->valor;//->all()->toArray();
        } else {
            $estudio = "Desconocido";
        }
        $alumno->nivel_estudio_valores = $estudio;

        // lo mismo con situación laboral
        $sit_lab = (int) $alumno->situacion_laboral_valores;
        if ($sit_lab > 0) {
            $sit_lab = $this->SituacionLaboralValores->findById($sit_lab)->firstOrFail()->valor;//->all()->toArray();
        } else {
            $sit_lab = "Desconocido";
        }
        $alumno->situacion_laboral_valores = $sit_lab;
        
        // lo mismo con categoria_profesional_valores
        $cat_prof = (int) $alumno->categoria_profesional_valores;
        if ($cat_prof > 0) {
            $cat_prof = $this->CategoriaProfesionalValores->findById($cat_prof)->firstOrFail()->valor;//->all()->toArray();
        } else {
            $cat_prof = "Desconocido";
        }
        $alumno->categoria_profesional_valores = $cat_prof;

        // lo mismo con área funcional
        $area_func = (int) $alumno->area_funcional_valores;
        if ($area_func > 0) {
            $area_func = $this->AreaFuncionalValores->findById($area_func)->firstOrFail()->nombre;//->all()->toArray();
        } else {
            $area_func = "Desconocido";
        }
        $alumno->area_funcional_valores = $area_func;

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
    }//fin ver

    public function insertar() 
    {
        $nuevo_alumno = $this->Alumnos->newEmptyEntity();
        $this->Authorization->authorize($nuevo_alumno);

        if($this->request->is('post')) {
           $nuevo_alumno = $this->Alumnos->patchEntity($nuevo_alumno, $this->request->getData());
            
            //debug($nuevo_alumno);
            //debug($this->request->getData());
            
            if ($this->Alumnos->save($nuevo_alumno)) {
                $this->Flash->success(__('El alumno ha sido añadida exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir el alumno.'));
        }

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
        
        $this->set('alumno', $nuevo_alumno);
    }//fin insertar

    public function editar($id) {
        $alumno = $this->Alumnos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno);
        $this->set(compact('alumno'));

        if ($this->request->is(['post', 'put'])) {
            $this->Alumnos->patchEntity($alumno, $this->request->getData());

            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__("El alumno ha sido editada exitosamente."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("No se ha podido editar el alumno."));
            
            if ($alumno->hasErrors()) {
                $errors = $alumno->getErrors();
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
    }//fin editar

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $alumno = $this->Alumnos->findById($id)->firstOrFail();
        $this->Authorization->authorize($alumno);
        $alumno_deleted = $this->Alumnos->delete($alumno);

        if ($alumno_deleted) {
            $this->Flash->success(__("El alumno ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }//fin eliminar

    public function search() {
        if (!isset($this->request->query['nombre'])) {
            throw new BadRequestException();
        }
        
        $results = $this->Alumnos->findByKeywords($this->request->query['nombre']);

        $this->set('results', $results);
    }

}//fin class AlumnosController
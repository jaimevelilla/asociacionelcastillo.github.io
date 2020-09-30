<?php

namespace App\Controller;

class CursosInscritosController extends AppController
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
        $cursos_inscritos = $this->Paginator->paginate($this->CursosInscritos->find()->group(['curso']));

        foreach ($cursos_inscritos as $curso_inscrito) {
            $curso_inscrito->num_alumnos = $this->CursosInscritos->find()->where(['curso' => $curso_inscrito->curso])->count();
        }
        //debug($cursos_inscritos);
       
        $this->set(compact('cursos_inscritos'));

    }//fin index
    
    public function ver($id) { }

    public function insertar()  { }

    public function editar($id) { }

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $curso_inscrito = $this->CursosInscritos->findById($id)->firstOrFail();
        $this->Authorization->authorize($curso_inscrito);

        $curso_inscrito_deleted = $this->CursosInscritos->delete($curso_inscrito);
        if ($curso_inscrito_deleted) {
            $this->Flash->success(__("El curso ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }//fin eliminar

}//fin class CursosController
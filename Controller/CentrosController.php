<?php

namespace App\Controller;

class CentrosController extends AppController
{

    public $paginate = [
        'sortWhitelist' => [
            'id', 
            'nombre', 
            'nombre_corto', 
            'CentroTipos.nombre',
            'Provincias.nombre',
        ]
    ];
    
    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

        $this->loadModel('CentroTipos');
        $this->loadModel('CentroPlataformaDatos');
        $this->loadModel('Comunidades');
        $this->loadModel('Provincias');
        //$this->loadModel('Localidades');
    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();

        $centro_tipos = $this->CentroTipos->find();//->all()->toArray();
        $this->set(compact('centro_tipos'));

        $provincias = $this->Provincias->find();//->all()->toArray();
        $this->set(compact('provincias'));

        //$centros = $this->Centros->find();
        $centros = $this->Paginator->paginate($this->Centros->find());
        $this->set(compact('centros'));
    }

    public function ver($id) 
    {
        $centro = $this->Centros->findById($id)->firstOrFail();
        $this->Authorization->authorize($centro);

        $provincia = $this->Provincias->findById($centro->provincia_id)->firstOrFail();
        $centro->provincia = $provincia->nombre;

        $comunidad = $this->Comunidades->findById($provincia->comunidad_id)->firstOrFail();
        $centro->comunidad = $comunidad->nombre;

        $this->set(compact('centro'));

        $centro_plataforma_datos = $this->CentroPlataformaDatos->findByCentroId($id)->firstOrFail();
        $this->set(compact('centro_plataforma_datos'));
        
        $centro_tipo = $this->CentroTipos->findById($centro->tipo_id)->firstOrFail();
        $this->set(compact('centro_tipo'));

        
    }

    public function insertar() 
    {
        $nuevo_centro = $this->Centros->newEmptyEntity();
        $this->Authorization->authorize($nuevo_centro);

        if($this->request->is('post')) {
            $nuevo_centro = $this->Centros->patchEntity($nuevo_centro, $this->request->getData(), ['associated' => ['CentroPlataformaDatos']]);

            //debug($nuevo_centro);
            //debug($this->request->getData());
            
            if ($this->Centros->save($nuevo_centro)) {
                $this->Flash->success(__('El centro ha sido añadido exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('No se ha podido añadir el centro.'));
        }

        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $centro_tipos = $this->CentroTipos->find('list', $select_list)->all()->toArray();
        $this->set(compact('centro_tipos'));

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
        
        $this->set('centro', $nuevo_centro);
    }

    public function editar($id) {
        $centro = $this->Centros->findById($id)->contain(['CentroPlataformaDatos'])->firstOrFail();
        $this->Authorization->authorize($centro);
        $this->set(compact('centro'));

        $centro_plataforma_datos = $this->CentroPlataformaDatos->findByCentroId($id)->firstOrFail();
        $this->set(compact('centro_plataforma_datos'));

        if ($this->request->is(['post', 'put'])) {
            $this->Centros->patchEntity($centro, $this->request->getData(), ['associated' => ['CentroPlataformaDatos']]);

            $plataforma_logo = $this->request->getUploadedFile("centro_plataforma_dato.plataforma_logo");
            $plataforma_logo_filename = $plataforma_logo->getClientFilename();

            if (!empty($plataforma_logo_filename)) {
                $plataforma_logo->moveTo("img/logos_addens/{$plataforma_logo_filename}");
                $this->Centros->patchEntity($centro, ['centro_plataforma_dato' => ['plataforma_logo' => $plataforma_logo_filename]], ['associated' => ['CentroPlataformaDatos']]);
            } else {
                $centro->centro_plataforma_dato->setDirty('plataforma_logo', false);
            }

            if ($this->Centros->save($centro)) {
                $this->Flash->success(__("El centro ha sido editado exitosamente."));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__("No se ha podido editar el centro."));
            
            if ($centro->hasErrors()) {
                $errors = $centro->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }

        //$centro_plataforma_datos = $this->CentroPlataformaDatos->findByCentroId($id)->firstOrFail();
        //$this->set(compact('centro_plataforma_datos'));
        
        $select_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $centro_tipos = $this->CentroTipos->find('list', $select_list)->all()->toArray();
        $this->set(compact('centro_tipos'));

        $comunidades = $this->Comunidades->find('list', $select_list)->all()->toArray();
        $this->set(compact('comunidades'));
    }

    public function eliminar($id) {
        $this->request->allowMethod(['post', 'delete']);

        $centro = $this->Centros->findById($id)->firstOrFail();
        $centro_plataforma_datos = $this->CentroPlataformaDatos->findByCentroId($id)->firstOrFail();
        $this->Authorization->authorize($centro);
        //debug($centro);

        $datos_deleted = $this->CentroPlataformaDatos->delete($centro_plataforma_datos);
        $centro_deleted = $this->Centros->delete($centro);
        if ($centro_deleted && $datos_deleted) {
            $this->Flash->success(__("El centro ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }
}
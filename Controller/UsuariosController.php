<?php

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsuariosController extends AppController
{

    public function initialize(): void 
    {
        parent::initialize();
        $this->loadModel('Centros');
        $this->loadModel('Roles');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login() 
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            return $this->redirect('/');
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuario y/o contraseña inválido'));
        }
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Usuarios', 'action' => 'login']);
        }
    }

    public function index() 
    {
        $this->Authorization->skipAuthorization();
        $this->loadComponent('Paginator');

        $centros = $this->Centros->find();
        $this->set(compact('centros'));

        $roles = $this->Roles->find();
        $this->set(compact('roles'));

        $usuarios = $this->Paginator->paginate($this->Usuarios->find());
        $this->set(compact('usuarios'));
    }

    /*
    public function ver($id) 
    {

    }
    */

    public function insertar() 
    {
        $nuevo_usuario = $this->Usuarios->newEmptyEntity();
        $this->Authorization->authorize($nuevo_usuario);

        if($this->request->is('post')) {
            $nuevo_usuario = $this->Usuarios->patchEntity($nuevo_usuario, $this->request->getData());

            $nuevo_usuario->password = (new DefaultPasswordHasher())->hash($nuevo_usuario->password);
            
            if ($this->Usuarios->save($nuevo_usuario)) {
                $this->Flash->success(__('El usuario ha sido añadido exitosamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('No se ha podido añadir el usuario.'));

            $errors = $usuario->errors();
            if ($errors) {
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }

        $centros_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $centros_select = ['id', 'nombre'];
        $centros = $this->Centros->find('list', $centros_list)->select($centros_select)->toArray();
        $this->set(compact('centros'));

        $roles_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $roles = $this->Roles->find('list', $roles_list)->all()->toArray();
        $this->set(compact('roles'));

        $this->set('usuario', $nuevo_usuario);
    }

    public function editar($id) 
    {
        $usuario = $this->Usuarios->findById($id)->firstOrFail();
        $this->Authorization->authorize($usuario);
        $prevPassword = $usuario->password;

        if ($this->request->is(['post', 'put'])) {
            $this->Usuarios->patchEntity($usuario, $this->request->getData());
            
            $newPassword = $usuario->password;

            if (empty($newPassword)) {
                $usuario->setDirty('password', false);
            } else {
                $usuario->password = (new DefaultPasswordHasher())->hash($usuario->password);
            }

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__("El usuario ha sido editado exitosamente."));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__("No se ha podido editar el usuario."));
            
            if ($usuario->hasErrors()) {
                $errors = $usuario->getErrors();
                foreach ($errors as $error) {
                    $this->Flash->error(__($error));
                }
            }
        }

        $centros_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $centros_select = ['id', 'nombre'];
        $centros = $this->Centros->find('list', $centros_list)->select($centros_select)->toArray();
        $this->set(compact('centros'));

        $roles_list = ['keyField' => 'id', 'valueField' => 'nombre'];
        $roles = $this->Roles->find('list', $roles_list)->all()->toArray();
        $this->set(compact('roles'));

        $this->set(compact('usuario'));
    }

    public function eliminar($id) 
    {
        $this->request->allowMethod(['post', 'delete']);

        $usuario = $this->Usuarios->findById($id)->firstOrFail();
        $this->Authorization->authorize($usuario);

        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__("El usuario ha sido eliminado exitosamente."));
            return $this->redirect(['action' => 'index']);
        }
    }
}
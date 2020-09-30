<?php

namespace App\Controller;

class RolesController extends AppController
{
    public function index() {
        $this->loadComponent('Paginator');
        $curso_addens = $this->Paginator->paginate($this->CursosAddens->find());
        $this->set(compact('curso_addens'));
    }
    /*
    public function editar($id) {
        $roles = $this->Roles->find();
        $usuario = $this->Usuarios->findById($id)->firstOrFail();
        $this->set(compact('usuario'), compact('roles'));
    }

    public function eliminar($id) {
        $usuario = $this->Usuarios->findById($id)->firstOrFail();
        $this->set(compact('usuario'));
    }
    */
}
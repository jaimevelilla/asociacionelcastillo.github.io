<?php
namespace App\Policy;

use App\Model\Entity\Usuario;
use Authorization\IdentityInterface;

class UsuarioPolicy
{
    public function canInsertar(IdentityInterface $usuario, Usuario $usuarioAInsertar)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Usuario $usuarioAEditar)
    {
        return $this->admin($usuario);
    }

    public function canEliminar(IdentityInterface $usuario, Usuario $usuarioAEliminar)
    {
        return $this->admin($usuario) && $usuarioAEliminar->id != 1;
    }

    protected function admin(IdentityInterface $usuario)
    {
        return $usuario->rol_id === 1;
    }

    protected function editor(IdentityInterface $usuario)
    {
        return $usuario->rol_id === 2;
    }

    protected function visor(IdentityInterface $usuario)
    {
        return $usuario->rol_id === 3;
    }
}
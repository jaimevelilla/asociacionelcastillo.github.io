<?php
namespace App\Policy;

use App\Model\Entity\Centro;
use Authorization\IdentityInterface;

class CentroPolicy
{
    public function canVer(IdentityInterface $usuario, Centro $centro)
    {
        return $this->admin($usuario);
    }
    
    public function canInsertar(IdentityInterface $usuario, Centro $centro)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Centro $centro)
    {
        return $this->admin($usuario);
    }

    public function canEliminar(IdentityInterface $usuario, Centro $centro)
    {
        return $this->admin($usuario);
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
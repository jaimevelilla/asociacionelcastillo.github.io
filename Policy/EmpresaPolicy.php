<?php
namespace App\Policy;

use App\Model\Entity\Empresa;
use Authorization\IdentityInterface;

class EmpresaPolicy
{
    public function canVer(IdentityInterface $usuario, Empresa $empresa)
    {
        return $this->admin($usuario);
    }
    
    public function canInsertar(IdentityInterface $usuario, Empresa $empresa)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Empresa $empresa)
    {
        return $this->admin($usuario);
    }

    public function canEliminar(IdentityInterface $usuario, Empresa $empresa)
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
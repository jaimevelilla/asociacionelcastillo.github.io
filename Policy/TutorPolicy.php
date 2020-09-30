<?php
namespace App\Policy;

use App\Model\Entity\Tutor;
use Authorization\IdentityInterface;

class TutorPolicy
{
    public function canVer(IdentityInterface $usuario, Tutor $tutor)
    {
        return $this->admin($usuario);
    }
    
    public function canInsertar(IdentityInterface $usuario, Tutor $tutor)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Tutor $tutor)
    {
        return $this->admin($usuario);
    }

    public function canEliminar(IdentityInterface $usuario, Tutor $tutor)
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
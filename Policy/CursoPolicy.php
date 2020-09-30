<?php
namespace App\Policy;

use App\Model\Entity\Curso;
use Authorization\IdentityInterface;

class CursoPolicy
{
    public function canVer(IdentityInterface $usuario, Curso $curso)
    {
        return $this->admin($usuario);
    }
    
    public function canInsertar(IdentityInterface $usuario, Curso $curso)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Curso $curso)
    {
        return $this->admin($usuario);
    }

    public function canEliminar(IdentityInterface $usuario, Curso $curso)
    {
        return $this->admin($usuario);
    }

    public function canParticipantes(IdentityInterface $usuario, Curso $curso)
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
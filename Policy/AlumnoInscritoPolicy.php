<?php
namespace App\Policy;

use App\Model\Entity\AlumnoInscrito;
use Authorization\IdentityInterface;

class AlumnoInscritoPolicy
{
/*  public function canVer(IdentityInterface $usuario, Alumno $alumno_inscrito)
    {
        return $this->admin($usuario);
    }

    public function canInsertar(IdentityInterface $usuario, Alumno $alumno_inscrito)
    {
        return $this->admin($usuario);
    }

    public function canEditar(IdentityInterface $usuario, Alumno $alumno_inscrito)
    {
        return $this->admin($usuario);
    }
*/
    public function canEliminar(IdentityInterface $usuario, Alumno $alumno_inscrito)
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
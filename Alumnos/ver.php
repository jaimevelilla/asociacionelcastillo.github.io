<?php $this->assign('title', "Alumno: {$alumno->nombre}"); ?>

<h1>Alumno: <?= $alumno->nombre ?></h1>

<?=
$this->Html->link(
    '<i class="fa fa-edit"></i> Editar este alumno', 
    ['action' => 'editar', $alumno->id],
    ['escape' => false]
);
?>

<fieldset id="alumno">
    <legend>Datos Personales</legend>
    <p><b>Nombre:</b> <?= $alumno->nombre ?></p>
    <p><b>Apellidos:</b> <?= $alumno->apellidos ?></p>
    <p><b>Teléfono:</b> <?= $alumno->telefono ?></p>
    <p><b>E-mail:</b> <?= $alumno->email ?></p>
    <p><b>Skype:</b> <?= $alumno->skype ?></p>
    <p><b>Empresa:</b> <?= $alumno->empresa_id ?></p>
    <p><b>NIF:</b> <?= $alumno->nif ?></p>
    <p><b>Nacionalidad:</b> <?= $alumno->nacionalidad ?></p>
    <p><b>NSS:</b> <?= $alumno->nss ?></p>
    <p><b>Fecha Nacimiento:</b> <?= $alumno->fecha_nacimiento ?></p>
    <p><b>Sexo:</b> <?= $alumno->sexo ?></p>
</fieldset>

<fieldset id="alumno_usuario">
    <legend>Claves del Alumno</legend>
    <p><b>Usuario:</b> <?= $alumno->usuario ?></p>
    <p><b>Contraseña:</b> <?= $alumno->contrasenia ?></p>
</fieldset>

<fieldset id="alumno_domicilio">
    <legend>Domicilio</legend>
    <p><b>Dirección:</b> <?= $alumno->direccion ?></p>
    <p><b>Código Postal:</b> <?= $alumno->cp ?></p>
    <p><b>Comunidad:</b> <?= $alumno->comunidad ?></p>
    <p><b>Provincia:</b> <?= $alumno->provincia ?></p>
    <p><b>Localidad:</b> <?= $alumno->localidad ?></p>
</fieldset>

<fieldset id="alumno_datos">
    <legend>Otros Datos</legend>
    <p><b>Estudios:</b> <?= $alumno->nivel_estudio_valores ?></p>
    <p><b>Otra Titulación:</b> <?= $alumno->otra_titulacion ?></p>
    <p><b>Área Funcional:</b> <?= $alumno->area_funcional_valores ?></p>
    <p><b>Categoría Profesional:</b> <?= $alumno->categoria_profesional_valores ?></p>
    <p><b>Regimen S.Social:</b> <?= $alumno->situacion_laboral_valores ?></p>
    <p><b>Comentarios:</b> <?= $alumno->comentarios ?></p>
    <p><b>Nº Matrícula:</b> <?= $alumno->numero_matricula ?></p>
    <p><b>Modificado por:</b> <?= $alumno->modificado_por ?></p>
    <p><b>Fecha de modificación:</b> <?= $alumno->fecha_modificacion ?></p>
    <p><b>Borrado:</b> <?= $alumno->borrado ?></p>
    <p><b>Centro:</b> <?= $alumno->centro_id ?></p>
    <p><b>Discapacitado:</b> <?= $alumno->discapacitado ?></p>
</fieldset>

<?=
$this->Html->link('Volver', ['controller' => 'alumnos', 'action'=> 'index'], ['class' => 'button back-button']);
?>
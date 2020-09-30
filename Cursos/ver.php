<?php $this->assign('title', "Curso: {$curso->nombre_texto}"); ?>

<h1>Curso:</h1> <h2> <?= $curso->nombre_texto ?></h2>

<?=
$this->Html->link(
    '<i class="fa fa-edit"></i> Editar este curso', 
    ['action' => 'editar', $curso->id],
    ['escape' => false]
);
?>

<fieldset id="curso">
    <legend>Datos Curso: </legend>
    <p><b>ID:</b> <?= $curso->id ?></p>
    <p><b>Nombre:</b> <?= $curso->nombre_texto ?></p>
    <p><b>Claves de Gestor/Inspector:</b></p>  
    <p><b>Grupo:</b> <?= $curso->grupo_oficial ?></p>
    <p><b>Expediente:</b> <?= $curso->expediente ?></p>
    <p><b>Acción formativa:</b> <?= $curso->accion_formativa ?></p>
</fieldset>

<fieldset id="otros_datos">
    <legend>Otros Datos: </legend>
    <p><b>Fecha de Inicio:</b> <?= $curso->inicio ?></p>
    <p><b>Fecha de Fin:</b> <?= $curso->fin ?></p>
    <p><b>Hora Inicio:</b> <?= $curso->hora_inicio ?></p>
    <p><b>Hora Fin:</b> <?= $curso->hora_fin ?></p>
    <p><b>Duración:</b> <?= $curso->duracion ?></p>
    <p><b>Solicitante:</b> <?= $curso->solicitante ?></p>
    <p><b>Modalidad:</b> <?= $curso->modalidad_id ?></p>
</fieldset>

<fieldset id="observaciones">
    <p><b>Observaciones:</b> <?= $curso->observaciones ?></p>
</fieldset>

<?=
$this->Html->link('Volver', ['controller' => 'cursos', 'action'=> 'index'], ['class' => 'button back-button']);
?>
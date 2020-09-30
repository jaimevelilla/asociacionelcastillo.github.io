<?php $this->assign('title', "Tutor: {$tutor->nombre}"); ?>

<h1>Tutor: <?= $tutor->nombre ?></h1>

<?=
$this->Html->link(
    '<i class="fa fa-edit"></i> Editar este tutor', 
    ['action' => 'editar', $tutor->id],
    ['escape' => false]
);
?>

<fieldset id="tutor">
    <legend>Datos del Tutor</legend>

    <p><b>Nombre:</b> <?= $tutor->nombre ?></p>
    <p><b>Apellidos:</b> <?= $tutor->apellidos ?></p>
    <p><b>NIF:</b> <?= $tutor->nif ?></p>
    <p><b>Telefono:</b> <?= $tutor->telefono ?></p>
    <p><b>Email:</b> <?= $tutor->email ?></p>
    <p><b>Cursos:</b> <?= $tutor->cursos ?></p>
    <p><b>Prefijo:</b> <?= $tutor->prefijo ?></p>
    <p><b>Observaciones:</b> <?= $tutor->observaciones ?></p>
    <p><b>Centro:</b> <?= $tutor->centro ?></p>
</fieldset>

<?=
$this->Html->link('Volver', ['controller' => 'tutores', 'action'=> 'index'], ['class' => 'button back-button']);
?>
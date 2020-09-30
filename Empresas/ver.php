<?php $this->assign('title', "Empresa: {$empresa->nombre}"); ?>

<h1>Empresa: <?= $empresa->nombre ?></h1>

<?=
$this->Html->link(
    '<i class="fa fa-edit"></i> Editar esta empresa', 
    ['action' => 'editar', $empresa->id],
    ['escape' => false]
);
?>

<fieldset id="empresa">
    <legend>Datos de la empresa</legend>

    <p><b>Nombre:</b> <?= $empresa->nombre ?></p>
    <p><b>Telefono:</b> <?= $empresa->telefono ?></p>
    <p><b>Contacto:</b> <?= $empresa->contacto ?></p>
    <p><b>FAX:</b> <?= $empresa->fax ?></p>
    <p><b>CIF:</b> <?= $empresa->cif ?></p>
    <p><b>Nº Seguridad Social:</b> <?= $empresa->seguridad_social ?></p>
    <p><b>E-mail:</b> <?= $empresa->email ?></p>
    <p><b>Web:</b> <?= $empresa->web ?></p>
    <p><b>N° Trabajadores:</b> <?= $empresa->numero_trabajadores ?></p>
    <p><b>Activ.Empresarial:</b> <?= $empresa->actividad_empresarial ?></p>
    <p><b>Dirección:</b> <?= $empresa->direccion ?></p>
    <p><b>Localidad:</b> <?= $empresa->localidad ?></p>
    <p><b>Provincia:</b> <?= $empresa->provincia ?></p>
    <p><b>Comunidad:</b> <?= $empresa->comunidad ?></p>
    <p><b>Código Postal:</b> <?= $empresa->codigo_postal ?></p>
</fieldset>

<?=
$this->Html->link('Volver', ['controller' => 'empresas', 'action'=> 'index'], ['class' => 'button back-button']);
?>
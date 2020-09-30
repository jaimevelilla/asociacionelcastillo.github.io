<?php $this->assign('title', "Centro: {$centro->nombre}"); ?>

<h1>Centro: <?= $centro->nombre ?></h1>

<?=
$this->Html->link(
    '<i class="fa fa-edit"></i> Editar este centro', 
    ['action' => 'editar', $centro->id],
    ['escape' => false]
);
?>

<fieldset id="centro_datos">
    <legend>Datos del centro</legend>

    <p><b>Nombre completo:</b> <?= $centro->nombre ?></p>
    <p><b>Nombre corto:</b> <?= $centro->nombre_corto ?></p>
    <p><b>NIF:</b> <?= $centro->nif ?></p>
    <p><b>Teléfono:</b> <?= $centro->telefono ?></p>
    <p><b>Fax:</b> <?= $centro->fax ?></p>
    <p><b>E-mail:</b> <?= $centro->email ?></p>
    <p><b>Contacto:</b> <?= $centro->contacto ?></p>
    <p><b>Tipo:</b> <?= $centro_tipo->nombre ?></p>
    <p><b>N° de aulas:</b> <?= $centro->num_aulas ?></p>
    <p><b>Descripción:</b> <?= $centro->descripcion ?></p>
    <p><b>Comentarios:</b> <?= $centro->comentarios ?></p>
    <p><b>Dirección:</b> <?= $centro->direccion ?></p>
    <p><b>Provincia:</b> <?= $centro->provincia ?></p>
    <p><b>Comunidad:</b> <?= $centro->comunidad ?></p>
</fieldset>

<fieldset id="centro_datos_cau_plataforma">
    <legend>Datos CAU Plataforma</legend>

    <p><b>E-mail Técnico:</b> <?= $centro_plataforma_datos->tecnico_email ?></p>
    <p><b>Teléfono Técnico:</b> <?= $centro_plataforma_datos->tecnico_telefono ?></p>
    <p><b>E-mail Administración:</b> <?= $centro_plataforma_datos->admin_email ?></p>
    <p><b>Teléfono Administración:</b> <?= $centro_plataforma_datos->admin_telefono ?></p>
    <p><b>Horario:</b> <?= $centro_plataforma_datos->horario ?></p>
    <p><b>E-mail Reclamaciones:</b> <?= $centro_plataforma_datos->reclamaciones_email ?></p>
</fieldset>

<fieldset id="centro_datos_preinscripcion_plataforma">
    <legend>Datos de Preinscripción Plataforma</legend>

    <p><b>E-mail:</b> <?= $centro_plataforma_datos->preinscripcion_email ?></p>
    <p><b>Teléfono:</b> <?= $centro_plataforma_datos->preinscripcion_telefono ?></p>
</fieldset>

<fieldset id="centro_datos_plataforma">
    <legend>Datos Plataforma</legend>

    <p>
        <b>Logo:</b>
        <?php 
        $logo = $centro_plataforma_datos->plataforma_logo;
        if (!empty($logo)):
        ?>
        <br>
        <img src="../../webroot/img/logos_addens/<?= $logo ?>" width="280" height="120">
        <br>
        <?php 
        else: 
            echo "No se ha subido ningún logo.";
        endif;
        ?>
    </p>
    <p><b>URL Plataforma:</b> <?= $centro_plataforma_datos->plataforma_url ?></p>
    <p><b>Usuario plataforma (Admin):</b> <?= $centro_plataforma_datos->plataforma_admin_username ?></p>
    <p><b>Contraseña plataforma (Admin):</b> <?= $centro_plataforma_datos->plataforma_admin_password ?></p>
    <p><b>Usuario plataforma (Tutor):</b> <?= $centro_plataforma_datos->plataforma_tutor_username ?></p>
    <p><b>Contraseña plataforma (Tutor):</b> <?= $centro_plataforma_datos->plataforma_tutor_password ?></p>
    <p><b>Usuario plataforma (Alumno):</b> <?= $centro_plataforma_datos->plataforma_alumno_username ?></p>
    <p><b>Contraseña plataforma (Alumno):</b> <?= $centro_plataforma_datos->plataforma_alumno_password ?></p>
    <p>
        <b>Estado Plataforma:</b> 
        <?php 
        $plataforma_estado = (bool) $centro_plataforma_datos->plataforma_estado;
        if ($plataforma_estado) echo '<span style="color: green;">OK</span>';
        else echo '<span style="color: red;">En proceso</span>'; 
        ?>
    </p>
</fieldset>

<fieldset id="centro_datos_webservice">
    <legend>Datos Web Service</legend>

    <p><b>URL Web Service:</b> <?= $centro_plataforma_datos->webservice_url ?></p>
    <p><b>Credenciales Web Service:</b> <?= $centro_plataforma_datos->webservice_credenciales ?></p>
    <p>
        <b>Estado Web Service:</b>
        <?php 
        $webservice_estado = (bool) $centro_plataforma_datos->webservice_estado;
        if ($webservice_estado) echo '<span style="color: green;">OK</span>';
        else echo '<span style="color: red;">En proceso</span>'; 
        ?>
    </p>
</fieldset>
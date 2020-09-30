<?php $this->assign('title', "Curso: {$curso->nombre_texto}"); ?>

<h1>Curso:</h1> <h3> <?= $curso->nombre_texto ?></h3>

<style>
    .apoyo {color: green;}
    .tutor {color: darkred;}
    .alumno {color: black;}
</style>


<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Nombre</th> 
        <th>Apellidos</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Sit.Laboral</th>
        <th>CP</th>
        <th>Empresa</th>
    </tr>
    <?php foreach ($tutores as $tutor) : 
        if ($tutor->rol_id == '2') $style = 'class="tutor"';
        else if ($tutor->rol_id == '3') $style = 'class="apoyo"';
    ?>   
        <tr <?= $style ?>>
            <td>
                <?= $tutor->id ?>
            </td>
            <td>
                <?= $tutor->nombre ?>
            </td>
            <td>
                <?= $tutor->apellidos ?>
            </td> 
            <td>
                <?= $tutor->usuario ?>
            </td>
            <td>
                <?= $tutor->contrasenia ?>
            </td>
            <td>
                <?= $tutor->telefono ?>
            </td> 
            <td>
                <?= $tutor->email ?>
            </td> 
            <td>
                ***
            </td>
            <td>
                ***
            </td>
            <td>
                <?= $tutor->centro_id ?>
            </td>
            <td>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-eye'></i>",
                        [
                            'action' => '../tutores/ver',
                            $tutor->id
                        ],
                        [
                            'escape' => false
                        ]
                    );
                ?>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-edit'></i>",
                        [
                            'action' => '../tutores/editar',
                            $tutor->id
                        ],
                        [
                            'escape' => false
                        ]
                    );
                ?>
                <?=
                    $this->Form->postLink(
                        "<i class='fa fa-trash-alt'></i>",
                        [
                            'action' => '../tutores/eliminar',
                            $tutor->id
                        ],
                        [
                            'confirm' => '¿Está seguro?',
                            'escape' => false
                        ]
                    );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

    <?php foreach ($alumnos as $alumno) :   
        if ($alumno->rol_id == '4') $style = 'class="alumno"';       
    ?> 
        <tr <?= $style ?>>
            <td>
                <?= $alumno->id ?>
            </td>
            <td>
                <?= $alumno->nombre ?>
            </td>
            <td>
                <?= $alumno->apellidos ?>
            </td> <td>
                <?= $alumno->usuario ?>
            </td> <td>
                <?= $alumno->contrasenia ?>
            </td> <td>
                <?= $alumno->telefono ?>
            </td> <td>
                <?= $alumno->email ?>
            </td> <td>
                    <?= $alumno->situacion_laboral_valores?>
            </td> <td>
                <?= $alumno->cp ?>
            </td> <td>
                <?= $alumno->empresa_id ?>
            </td>
            <td>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-eye'></i>",
                        [
                            'action' => '../alumnos/ver',
                            $alumno->id
                        ],
                        [
                            'escape' => false
                        ]
                    );
                ?>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-edit'></i>",
                        [
                            'action' => '../alumnos/editar',
                            $alumno->id
                        ],
                        [
                            'escape' => false
                        ]
                    );
                ?>
                <?=
                    $this->Form->postLink(
                        "<i class='fa fa-trash-alt'></i>",
                        [
                            'action' => '../alumnos/eliminar',
                            $alumno->id
                        ],
                        [
                            'confirm' => '¿Está seguro?',
                            'escape' => false
                        ]
                    );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?=
$this->Html->link('Volver', ['controller' => 'cursos', 'action'=> 'index'], ['class' => 'button back-button']);
?>
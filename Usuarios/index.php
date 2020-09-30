<h1>Lista de Usuarios</h1>

<?=
$this->Html->link(
    "<i class='fa fa-plus'></i> Añadir nuevo usuario", 
    ['action' => 'insertar'],
    ['escape' => false]
);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Centro</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td>
            <?= $usuario->id ?>
        </td>
        <td>
            <?= $usuario->nombre ?>
        </td>
        <td>
            <?= $usuario->apellido ?>
        </td>
        <td>
            <?= $usuario->username ?>
        </td>
        <td>
            <?php foreach ($centros as $centro) {
                if ($usuario->centro_id == $centro->id) {
                    echo $centro->nombre;
                }
            } ?>
        </td>
        <td>
            <?php foreach ($roles as $rol) {
                if ($usuario->rol_id == $rol->id) {
                    echo $rol->nombre;
                }
            } ?>
        </td>
        <td>
            <?=
            $this->Html->link(
                '<i class="fa fa-edit"></i>', 
                ['action' => 'editar', $usuario->id],
                ['escape' => false]
            );
            ?>
            
            <?php if ($usuario->id != 1)
            echo $this->Form->postLink(
                '<i class="fa fa-trash-alt"></i>',
                ['action' => 'eliminar', $usuario->id],
                ['confirm' => '¿Está seguro?', 'escape' => false]
            );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
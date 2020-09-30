<h1>Listado de Centros</h1>

<?=
$this->Html->link(
    '<i class="fa fa-plus"></i> Añadir nuevo centro', 
    ['action' => 'insertar'],
    ['escape' => false]
);
?>

<ul id='paginator'>
    <?= $this->Paginator->first('<i class="fa fa-fast-backward"></i> ' . __('1ª Pag.'), ['escape' => false]); ?>
    <?= $this->Paginator->prev('<i class="fa fa-backward"></i> ' . __('Anterior'), ['escape' => false]); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next('<i class="fa fa-forward"></i> ' . __('Siguiente'), ['escape' => false]); ?>
    <?= $this->Paginator->last('<i class="fa fa-fast-forward"></i> '. __('Última Pag.'), ['escape' => false]); ?>
</ul>

<table>
    <tr>
        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
        <th><?= $this->Paginator->sort('nombre', 'Nombre') ?></th>
        <th><?= $this->Paginator->sort('nombre_corto', 'Nombre Corto') ?></th>
        <th><?= $this->Paginator->sort('tipo_id', 'Tipo') ?></th>
        <th><?= $this->Paginator->sort('provincia_id', 'Provincia') ?></th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($centros as $centro): ?>
    <tr>
        <td>
            <?= $centro->id ?>
        </td>
        <td>
            <?= $centro->nombre ?>
        </td>
        <td>
            <?= $centro->nombre_corto ?>
        </td>
        <td>
            <?= $centro->id_tipo ?>
            <?php foreach ($centro_tipos as $tipo) {
                if ($centro->tipo_id == $tipo->id) {
                    echo $tipo->nombre;
                }
            } ?>
        </td>
        <td>
            <?php foreach ($provincias as $provincia) {
                if ($centro->provincia_id == $provincia->id) {
                    echo $provincia->nombre;
                }
            } ?>
        </td>
        <td>
            <ul>
                <li>
                    <?=
                    $this->Html->link(
                        '<i class="fa fa-eye"></i> Ver', 
                        ['action' => 'ver', $centro->id],
                        ['escape' => false]
                    );
                    ?>
                </li>
                    
                <li>
                    <?=
                    $this->Html->link(
                        '<i class="fa fa-edit"></i> Editar', 
                        ['action' => 'editar', $centro->id],
                        ['escape' => false]
                    );
                    ?>
                </li>

                <li>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-trash-alt"></i> Eliminar',
                        ['action' => 'eliminar', $centro->id],
                        ['confirm' => '¿Está seguro?', 'escape' => false]
                    );
                    ?>
                </li>

                <li>
                    <?= $this->Html->link(
                        '<i class="fa fa-graduation-cap"></i> Certificados', 
                        ['action' => 'certificados', $centro->id],
                        ['escape' => false]
                    );
                    ?>
                </li>

                <li>
                    <?= $this->Html->link(
                        '<i class="fa fa-building"></i> Crear como empresa', 
                        ['action' => 'empresa', $centro->id],
                        ['escape' => false]
                    );
                    ?>
                </li>
            </ul>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<ul id='paginator'>
<?= $this->Paginator->first('<i class="fa fa-fast-backward"></i> ', ['escape' => false]); ?>
<?= $this->Paginator->prev('<i class="fa fa-backward"></i> ' . __('Anterior'), ['escape' => false]); ?>
<?= $this->Paginator->numbers(); ?>
<?= $this->Paginator->next('<i class="fa fa-forward"></i> ' . __('Siguiente'), ['escape' => false]); ?>
<?= $this->Paginator->last('<i class="fa fa-fast-forward"></i> ', ['escape' => false]); ?>
</ul>
<h1>Listado de Tutores</h1>

<?=
$this->Html->link(
    '<i class="fa fa-plus"></i> Añadir nuevo tutor', 
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
        <th><?= $this->Paginator->sort('apellidos', 'Apellidos') ?></th>
        <th><?= $this->Paginator->sort('telefono', 'Teléfono') ?></th>
        <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($tutores as $tutor): ?>
    <tr>
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
            <?= $tutor->telefono ?>
        </td>  
        <td>
            <?= $tutor->email ?>
        </td>
        <td>
            <?=
                $this->Html->link(
                    "<i class='fa fa-eye'></i>",
                    [
                        'action' => 'ver',
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
                        'action' => 'editar',
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
                        'action' => 'eliminar',
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
</table>
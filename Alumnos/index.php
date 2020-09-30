<h1>Listado de Alumnos</h1>

<ul id='paginator'>
    <?= $this->Paginator->first('<i class="fa fa-fast-backward"></i> ' . __('1ª Pag.'), ['escape' => false]); ?>
    <?= $this->Paginator->prev('<i class="fa fa-backward"></i> ' . __('Anterior'), ['escape' => false]); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next('<i class="fa fa-forward"></i> ' . __('Siguiente'), ['escape' => false]); ?>
    <?= $this->Paginator->last('<i class="fa fa-fast-forward"></i> '. __('Última Pag.'), ['escape' => false]); ?>
</ul>

<div id="top-options" style="width:100%; display:inline-block;" >
    <?=
        $this->Html->link(
            '<i class="fa fa-plus-square" aria-hidden="true"></i> Añadir Alumno',
            ['action' => 'insertar'],
            ['escape' => false]
        );
    ?>
   <?=
        $this->Html->link(
            '<i class="fa fa-search"></i> Buscar Alumno',
            ['action' => './search'],
            ['escape' => false]
        );
    ?>
    <?=
        $this->Html->link(
            '<i class="far fa-file-excel" aria-hidden="true"></i> Exportar Excel',
            ['action' => 'insertar'],
            ['escape' => false]
        );
    ?>
    <?=
        $this->Html->link(
            '<i class="far fa-address-book" aria-hidden="true"></i> Importar Alumnos',
            ['action' => 'insertar'],
            ['escape' => false]
        );
    ?>
</div>

<table>
    <tr>
        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
        <th><?= $this->Paginator->sort('nombre', 'Nombre') ?></th>
        <th><?= $this->Paginator->sort('nombre', 'Apellidos') ?></th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($alumnos as $alumno) : ?>
        <tr>
            <td>
                <?= $alumno->id ?>
            </td>
            <td>
                <?= $alumno->nombre ?>
            </td>
            <td>
                <?= $alumno->apellidos ?>
            </td>
            <td>
                <?= $alumno->telefono ?>
            </td>
            <td>
                <?= $alumno->email ?>
            </td>
            <td>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-eye'></i>",
                        [
                            'action' => 'ver',
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
                            'action' => 'editar',
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
                            'action' => 'eliminar',
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
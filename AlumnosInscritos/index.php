<h1>Listado de Alumnos Inscritos</h1>

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
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Fecha de Inscripción</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($alumnos_inscritos as $alumno_inscrito) : ?>
        <tr>
            <td>
                <?= $alumno_inscrito->id ?>
            </td>
            <td>
                <?= $alumno_inscrito->nombre ?>
            </td>
            <td>
                <?= $alumno_inscrito->apellidos ?>
            </td>
            <td>
                <?= $alumno_inscrito->telefono ?>
            </td>
            <td>
                <?= $alumno_inscrito->email ?>
            </td>
            <td>
                <?= $alumno_inscrito->fecha_creacion ?>
            </td>
            <td>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-eye'></i>",
                        [
                            'action' => 'ver',
                            $alumno_inscrito->id
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
                            $alumno_inscrito->id
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
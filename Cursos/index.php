<?php $this->assign('title', "Cursos"); ?>

<h1>Listado de Cursos</h1>

<?=
    $this->Html->link(
        '<i class="fa fa-plus"></i> Añadir nuevo curso',
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
        <th><?= $this->Paginator->sort('nombre_texto', 'Nombre') ?></th>
        <th><?= $this->Paginator->sort('grupo_oficial', 'Grupo') ?></th> 
        <th><?= $this->Paginator->sort('form', 'Acción Formativa.') ?></th> 
        <th><?= $this->Paginator->sort('duracion', 'Duracion') ?></th> 
        <th><?= $this->Paginator->sort('inicio', 'Inicio') ?></th> 
        <th><?= $this->Paginator->sort('fin', 'Fin') ?></th> 
        <th>Acciones</th>
    </tr>

    <?php foreach ($cursos as $curso) : ?>
        <tr>
            <td>
                <?= $curso->id ?>
            </td>
            <td>
                <?= $curso->nombre_texto ?>
            </td>
            <td>
                <?= $curso->grupo_oficial ?>
            </td>
            <td>
                <?= $curso->accion_formativa ?>
            </td>
            <td>
                <?= $curso->duracion ?>
            </td>
            <td>
                <?= $curso->inicio ?>
            </td>
            <td>
                <?= $curso->fin ?>
            </td>
            <td>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-users'></i>",
                        [
                            'action' => 'participantes',
                            $curso->id
                        ],
                        [
                            'escape' => false
                        ]
                    );
                ?>
                <?=
                    $this->Html->link(
                        "<i class='fa fa-eye'></i>",
                        [
                            'action' => 'ver',
                            $curso->id
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
                            $curso->id
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
                            $curso->id
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
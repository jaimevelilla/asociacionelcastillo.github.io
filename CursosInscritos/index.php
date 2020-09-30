<?php $this->assign('title', "CursosInscritos"); ?>

<h1>Listado de Cursos Inscritos</h1>

<ul id='paginator'>
    <?= $this->Paginator->first('<i class="fa fa-fast-backward"></i> ' . __('1ª Pag.'), ['escape' => false]); ?>
    <?= $this->Paginator->prev('<i class="fa fa-backward"></i> ' . __('Anterior'), ['escape' => false]); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next('<i class="fa fa-forward"></i> ' . __('Siguiente'), ['escape' => false]); ?>
    <?= $this->Paginator->last('<i class="fa fa-fast-forward"></i> '. __('Última Pag.'), ['escape' => false]); ?>
</ul>

<table>
    <tr>
        <th><?= $this->Paginator->sort('curso', 'Título del Curso') ?></th>> 
        <th>Nº de alumnos preinscritos</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($cursos_inscritos as $curso_inscrito): ?>
        <tr>
            <td>
                <?= $curso_inscrito->curso ?>
            </td>
            <td>
                <?= $curso_inscrito->num_alumnos ?>
            </td>
            <td>
                <?=
                    $this->Form->postLink(
                        "<i class='fa fa-trash-alt'></i>",
                        [
                            'action' => 'eliminar',
                            $curso_inscrito->id
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
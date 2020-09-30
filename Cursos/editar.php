<?php $this->assign('title', 'Editar Curso: ' . $curso->nombre_texto); ?>

<h1>Editar Curso: <?= $curso->nombre_texto ?></h1>

<?php

echo $this->Form->create($curso, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre_texto' => [
            'label' => 'Nombre:'
        ],
        'nombre_id' => [
            'label' => 'Nombre (código) en el catálogo general:',
            'options' => $cursos_addens,
            'empty' => [0 => 'Seleccione un curso del catálogo general...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'plataforma' => [
            'label' => 'En qué plataforma se va a impartir:'
        ],
        'clave' => [
            'label' => 'Generar claves de gestor/inspector: '
        ],
        'grupo_oficial' => [
            'label' => 'Grupo:'
        ],
        'expediente' => [
            'label' => 'Expediente:'
        ],
        'accion_formativa' => [
            'label' => 'Acción formativa:'
        ],
        'inicio' => [
            'label' => 'Inicio:'
        ],
        'fin' => [
            'label' => 'Fin:'
        ],
        'hora_inicio ' => [
            'label' => 'Hora Inicio:'
        ],
        'hora_fin' => [
            'label' => 'Hora Fin:'
        ],
        'duracion' => [
            'label' => 'Duración:'
        ],
        'solicitante' => [
            'label' => 'Solicitante:'
        ],
        'modalidad_id' => [
            'label' => 'Modalidad:'
        ],
        'observaciones' => [
            'label' => 'Observaciones:'
        ],
    ],
    [
        'legend' => 'Datos del curso',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->button(__('Editar Curso'));

echo $this->Html->link('Volver', ['controller' => 'cursos', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
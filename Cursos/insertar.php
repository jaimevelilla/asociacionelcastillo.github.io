<?php $this->assign('title', 'Añadir nuevo curso'); ?>

<h1>Añadir nuevo curso</Em></h1>

<?php

echo $this->Form->create($curso, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre' => [
            'label' => 'Nombre'
        ],
        'codigo' => [
            'label' => 'Nombre(código) en el catálogo general'
        ],
        'plataforma' => [
            'label' => 'En qué plataforma se va a impartir'
        ],
        'clave' => [
            'label' => 'Generar claves de gestor/inspector para'
        ],
        'expediente' => [
            'label' => 'Expediente'
        ],
        'form' => [
            'label' => 'Acción form.'
        ],
        'inicio' => [
            'label' => 'Inicio'
        ],
        'fin' => [
            'label' => 'Fin'
        ],
        'hora_inicio ' => [
            'label' => 'Hora Inicio'
        ],
        'hora_fin' => [
            'label' => 'Hora Fin'
        ],
        'duracion' => [
            'label' => 'Duración'
        ],
        'solicitante' => [
            'label' => 'Solicitante'
        ],
        'modalidad' => [
            'label' => 'Modalidad'
        ],
        'Observaciones' => [
            'label' => 'Observaciones'
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

echo $this->Form->button(__('Añadir Curso'));

echo $this->Html->link('Volver', ['controller' => 'cursos', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
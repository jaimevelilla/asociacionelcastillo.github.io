<?php $this->assign('title', 'Añadir nuevo tutor'); ?>

<h1>Añadir Nuevo Tutor</h1>

<?php

echo $this->Form->create($tutor, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre'=> [
            'label' => 'Nombre'
        ],
        'apellidos'=> [
            'label' => 'Apellidos'
        ],
        'nif' => [
            'label'=> 'NIF'
        ],
        'telefono'=> [
            'label' => 'Telefono'
        ],
        'email'=> [
            'label' => 'Email'
        ],
        'cursos'=> [
            'label' => 'Cursos'
        ],
        'prefijo'=> [
            'label' => 'Prefijo'
        ],
        'observaciones'=> [
            'label' => 'Observaciones'
        ],
        'centro_id' => [
            'label' => 'Centro',
            'options' => $centros,
            'empty' => [0 => 'Seleccione un centro...'],
            'default' => [0],
            'disabled' => [0],
        ],
    ],
    [
        'legend' => 'Datos del tutor',
        'fieldset' => [
            'class' => ''
        ]
    ]
);
    
    echo '<hr>';
    
    echo $this->Form->button(__('Añadir Tutor'));
    
    echo $this->Html->link('Volver', ['controller' => 'tutores', 'action'=> 'index'], ['class' => 'button back-button']);
    
    echo $this->Form->end();
    
    ?>
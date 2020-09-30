<?php $this->assign('title', 'Añadir nuevo usuario'); ?>

<h1>Añadir Nuevo Usuario</h1>

<?php

echo $this->Form->create($usuario, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre' => [
            'label' => 'Nombre'
        ],
        'apellido' => [
            'label' => 'Apellido'
        ],
        'email' => [
            'label' => 'E-mail'
        ],
        'centro_id' => [
            'label' => 'Centro',
            'options' => $centros,
            'empty' => [0 => 'Seleccione un centro...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'rol_id' => [
            'label' => 'Rol',
            'options' => $roles,
            'empty' => [0 => 'Seleccione un rol...'],
            'default' => [0],
            'disabled' => [0],
        ]
    ],
    [
        'legend' => 'Datos personales',
    ]
);

echo $this->Form->controls(
    [
        'username' => [
            'label' => 'Usuario'
        ],
        'password' => [
            'label' => 'Contraseña',
            'type' => 'password',
        ],
        /*'password-confirm' => [
            'label' => 'Repetir contraseña',
            'type' => 'password',
        ]*/
    ],
    [
        'legend' => 'Nombre de usuario y contraseña',
    ]
);

echo $this->Form->control('comentarios', ['label' => 'Comentarios', 'rows' => '30']);

echo $this->Form->button(__('Añadir usuario'));

echo $this->Form->end();

?>
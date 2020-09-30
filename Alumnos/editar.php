<?php $this->assign('title', 'Editar Alumno: ' . $alumno->nombre); ?>

<h1>Editar Alumno: <?= $alumno->nombre ?></h1>

<?php

echo $this->Form->create($alumno, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre' => [
            'label' => 'Nombre'
        ],
        'apellidos' => [
            'label' => 'Apellidos'
        ],
        'telefono' => [
            'label' => 'Teléfono'
        ],
        'email' => [
            'label' => 'E-mail',
            'type' => 'text'
        ],
        'skype' => [
            'label' => 'Skype'
        ],
        'nif' => [
            'label' => 'NIF/NIE'
        ],
        'nacionalidad' => [
            'label' => 'Nacionalidad'
        ],

        'nss' => [
            'label' => 'Nº Seg.Social'
        ],
        'situacion_laboral_valores ' => [
            'label' => 'Régimen Seg.Social'
        ],
        'fecha_nacimiento' => [
            'label' => 'Fecha de Nacimiento'
        ],
        'sexo' => [
            'label' => 'Sexo',
        ],
        'discapacitado' => [
            'label' => 'Discapacitado (0 = No, 1 = Si)',
            'empty' => [0 => 'Seleccione si tiene alguna discapacidad'],
            'default' => [0],
            'disabled' => [0],
       ],
        'direccion' => [
            'label' => 'Dirección',
        ],
        'comunidad_id' => [
            'label' => 'Comunidad',
            'options' => $comunidades,
            'empty' => [0 => 'Seleccione una comunidad...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'provincia_id' => [
            'label' => 'Provincia',
            'empty' => [0 => 'Seleccione una provincia...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'localidad_id' => [
            'label' => 'Localidad',
            'empty' => [0 => 'Seleccione una localidad...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'codigo_postal' => [
            'label' => 'Código Postal',
        ],
        'otra_titulacion' => [
            'label' => 'Nivel de Estudios',
        ],
        'empresa' => [
            'label' => 'Empresa',
        ],
        'area_funcional_id' => [
            'label' => 'Área Funcional',
        ],
        'numero_matricula' => [
            'label' => 'Número de Matrícula ',
        ],
        'comentarios' => [
            'label' => 'Comentarios ',
        ],
    ],
    [
        'legend' => 'Datos del alumno',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->button(__('Editar Alumno'));

echo $this->Html->link('Volver', ['controller' => 'alumnos', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
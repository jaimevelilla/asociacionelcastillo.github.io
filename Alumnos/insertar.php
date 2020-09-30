<?php $this->assign('title', 'Añadir nuevo alumno'); ?>

<h1>Añadir Nueva Alumno</Em></h1>

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
        'regimen_sse_id ' => [
            'label' => 'Régimen Seg.Social'
        ],
        'fecha_nacimiento' => [
            'label' => 'Fecha de Nacimiento'
        ],
        'sexo' => [
            'label' => 'Sexo'
        ],
        'discapacitado' => [
            'label' => 'Discapacitado'
        ],
        'direccion' => [
            'label' => 'Dirección'
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
            'label' => 'Código Postal'
        ],
        'otra_titulacion' => [
            'label' => 'Nivel de Estudios'
        ],
        'situacion_laboral' => [
            'label' => 'Situación Laboral'
        ],
        'empresa' => [
            'label' => 'Empresa'
        ],
        'area_funcionale_id' => [
            'label' => 'Área Funcional'
        ],
        'numero_matricula' => [
            'label' => 'Número de Matrícula '
        ],
        'comentarios' => [
            'label' => 'Comentarios '
        ],
        'centro' => [
            'label' => 'Centro '
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

echo $this->Form->button(__('Añadir Alumno'));

echo $this->Html->link('Volver', ['controller' => 'alumnos', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
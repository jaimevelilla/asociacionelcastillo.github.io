<?php $this->assign('title', 'Editar Empresa: ' . $empresa->nombre); ?>

<h1>Editar Empresa: <?= $empresa->nombre ?></h1>

<?php

echo $this->Form->create($empresa, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre' => [
            'label' => 'Nombre'
        ],
        'telefono' => [
            'label' => 'Telefono'
        ],
        'contacto' => [
            'label' => 'Contacto'
        ],
        'fax' => [
            'label' => 'FAX'
        ],
        'cif' => [
            'label' => 'CIF'
        ],
        'seguridad_social' => [
            'label' => 'nº Seguridad Social'
        ],
        'email' => [
            'label' => 'E-mail',
            'type' => 'text'
        ],
        'web' => [
            'label' => 'Web'
        ],
        'numero_trabajadores' => [
            'label' => 'nº Trabajadores'
        ],
        'actividad_empresarial' => [
            'label' => 'Actividad Empresarial'
        ],
        'direccion' => [
            'label' => 'Dirección',
        ],
        'comunidad' => [
            'label' => 'Comunidad',
            'options' => $comunidades,
            'empty' => [0 => 'Seleccione una comunidad...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'provincia_id' => [
            'label' => 'Provincia',
            'options' => array(),
            'empty' => [0 => 'Seleccione una provincia...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'localidad_id' => [
            'label' => 'Localidad',
            'options' => array(),
            'empty' => [0 => 'Seleccione una localidad...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'codigo_postal' => [
            'label' => 'Código Postal',
        ],
    ],
    [
        'legend' => 'Datos de la empresa',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->button(__('Editar empresa'));

echo $this->Html->link('Volver', ['controller' => 'empresas', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
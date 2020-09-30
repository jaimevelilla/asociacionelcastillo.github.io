<?php $this->assign('title', 'Añadir nuevo centro'); ?>

<h1>Añadir Nuevo Centro</h1>

<?php

echo $this->Form->create($centro, ['type' => 'file']); //, ['context' => ['validator' => 'insertar']]);

echo $this->Form->controls(
    [
        'nombre' => [
            'label' => 'Nombre completo'
        ],
        'nombre_corto' => [
            'label' => 'Nombre corto'
        ],
        'nif' => [
            'label' => 'NIF'
        ],
        'email' => [
            'label' => 'E-mail'
        ],
        'telefono' => [
            'label' => 'Teléfono'
        ],
        'fax' => [
            'label' => 'Fax'
        ],
        'contacto' => [
            'label' => 'Persona de contacto'
        ],
        'tipo_id' => [
            'label' => 'Tipo',
            'options' => $centro_tipos,
            'empty' => [0 => 'Seleccione un tipo...'],
            'default' => [0],
            'disabled' => [0],
        ],
        'num_aulas' => [
            'label' => 'Nº. de aulas',
            'type' => 'number',
            'min' => 0,
            'max' => 99,
        ],
        'descripcion' => [
            'label' => 'Breve descripción',
            'type' => 'textarea',
            'rows' => 20,
        ],
        'comentarios' => [
            'label' => 'Comentarios (interno FORTEC)',
            'type' => 'textarea',
            'rows' => 20,
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
            'empty' => [0 => 'Seleccione una provincia...'],
            'default' => [0],
            'disabled' => [0],
        ],
    ],
    [
        'legend' => 'Datos del centro',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->label('centro_cau_desc', 'En este apartado hay que rellenar la información del centro que tiene que aparecer en la plataforma, en el apartado Recursos didácticos de comunicación -> Centro de Atención a Usuarios<br><a href="http://www.formacionytecnologia.com/formacion/contactar/contactar.php">VER EJEMPLO ->></a>', ['escape' => false]);

echo $this->Form->controls(
    [
        'centro_plataforma_dato.tecnico_email' => [
            'label' => 'E-mail Técnico'
        ],
        'centro_plataforma_dato.tecnico_telefono' => [
            'label' => 'Teléfono Técnico'
        ],
        'centro_plataforma_dato.admin_email' => [
            'label' => 'E-mail Administración'
        ],
        'centro_plataforma_dato.admin_telefono' => [
            'label' => 'Teléfono Administración'
        ],
        'centro_plataforma_dato.reclamaciones_email' => [
            'label' => 'E-mail Reclamaciones'
        ],
        'centro_plataforma_dato.horario' => [
            'label' => 'Horario de atención al cliente'
        ]
    ],
    [
        'legend' => 'Datos CAU Plataforma',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->label('centro_preinscripcion_desc', 'En este apartado hay que rellenar el email del centro al que quiere que llegue el aviso de que se ha preinscrito un alumno a través del formulario de preinscripción de la plataforma (el botón Preinscribirse). Además, estos datos se guardarán el la aplicación de gestión del centro.<br><a href="http://www.formacionytecnologia.com/formacion/index.php?org=cp">VER EJEMPLO PULSANDO EL BOTÓN PREINSCRIBIRSE->></a>', ['escape' => false]);

echo $this->Form->controls(
    [
        'centro_plataforma_dato.preinscripcion_email' => [
            'label' => 'E-mail'
        ],
        'centro_plataforma_dato.preinscripcion_telefono' => [
            'label' => 'Teléfono'
        ]
    ],
    [
        'legend' => 'Datos Formulario de Preinscripción Plataforma',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->controls(
    [
        'centro_plataforma_dato.plataforma_logo' => [
            'label' => 'Logo (Formato PNG, 120 x 280)',
            'type' => 'file',
        ],
        'centro_plataforma_dato.plataforma_url' => [
            'label' => 'URL Plataforma'
        ],
        'centro_plataforma_dato.plataforma_admin_username' => [
            'label' => 'Usuario plataforma (Admin)'
        ],
        'centro_plataforma_dato.plataforma_admin_password' => [
            'label' => 'Contraseña plataforma (Admin)'
        ],
        'centro_plataforma_dato.plataforma_tutor_username' => [
            'label' => 'Usuario plataforma (Tutor)'
        ],
        'centro_plataforma_dato.plataforma_tutor_password' => [
            'label' => 'Contraseña plataforma (Tutor)'
        ],
        'centro_plataforma_dato.plataforma_alumno_username' => [
            'label' => 'Usuario plataforma (Alumno)'
        ],
        'centro_plataforma_dato.plataforma_alumno_password' => [
            'label' => 'Contraseña plataforma (Alumno)'
        ],
        'centro_plataforma_dato.plataforma_estado' => [
            'label' => 'Estado',
            'options' => [
                0 => 'En proceso',
                1 => 'OK'
            ],
            'default' => [0]
        ]
    ],
    [
        'legend' => 'Datos Plataforma',
        'fieldset' => [
            'class' => ''
        ]
    ]
);

echo '<hr>';

echo $this->Form->controls(
    [
        'centro_plataforma_dato.webservice_url' => [
            'label' => 'URL'
        ],
        'centro_plataforma_dato.webservice_credenciales' => [
            'label' => 'Credenciales'
        ],
        'centro_plataforma_dato.webservice_estado' => [
            'label' => 'Estado',
            'options' => [
                0 => 'En proceso',
                1 => 'OK'
            ],
            'default' => [0]
        ]
    ],
    [
        'legend' => 'Datos Web Service',
        'fieldset' => [
            'class' => ''
            
        ]
    ]
);

echo $this->Form->button(__('Añadir centro'));

echo $this->Html->link('Volver', ['controller' => 'centros', 'action'=> 'index'], ['class' => 'button back-button']);

echo $this->Form->end();

?>
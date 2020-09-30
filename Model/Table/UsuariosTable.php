<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosTable extends Table
{
    public function initialize(array $config): void
    {
        //$this->addBehavior('Timestamp');
    }
    
    public function validationInsertar(Validator $validator): Validator
    {
        $validator
            ->requirePresence('nombre', 'Por favor escriba su nombre.')
            ->notEmptyString('nombre', 'Por favor escriba su nombre.')
            ->maxLength('nombre', 255)

            ->requirePresence('apellido', 'Por favor escriba su apellido.')
            ->notEmptyString('apellido', 'Por favor escriba su apellido.')
            ->maxLength('apellido', 255)

            ->requirePresence('email', 'Por favor escriba su e-mail.')
            ->notEmptyString('email', 'Por favor escriba su e-mail.')
            ->email('email', true, 'El e-mail que has escrito no es válido.')
            ->maxLength('email', 255)

            ->requirePresence('centro_id', 'Por favor selecciona un centro.')
            ->greaterThan('centro_id', 0, 'Por favor selecciona un centro.')

            ->requirePresence('rol_id', 'Por favor selecciona un rol.')
            ->greaterThan('rol_id', 0, 'Por favor selecciona un rol.')

            ->requirePresence('username', 'Por favor escriba un nombre de usuario.')
            ->notEmptyString('username', 'Por favor escriba un nombre de usuario.')
            ->maxLength('username', 255)
            
            ->requirePresence('password', 'Por favor escriba una contraseña.')
            ->notEmptyString('password', 'Por favor escriba una contraseña.')
            ->minLength('password', 8, 'La contraseña debe tener más de 8 caracteres.')
            ->maxLength('password', 255)

            ->allowEmptyString('comentarios', true);

        return $validator;
    }

    public function validationEditar(Validator $validator): Validator
    {
        $validator
            ->requirePresence('nombre', 'Por favor escriba su nombre.')
            ->notEmptyString('nombre', 'Por favor escriba su nombre.')
            ->maxLength('nombre', 255)

            ->requirePresence('apellido', 'Por favor escriba su apellido.')
            ->notEmptyString('apellido', 'Por favor escriba su apellido.')
            ->maxLength('apellido', 255)

            ->requirePresence('email', 'Por favor escriba su e-mail.')
            ->notEmptyString('email', 'Por favor escriba su e-mail.')
            ->email('email', true, 'El e-mail que has escrito no es válido.')
            ->maxLength('email', 255)

            ->requirePresence('centro_id', 'Por favor selecciona un centro.')
            ->greaterThan('centro_id', 0, 'Por favor selecciona un centro.')

            ->requirePresence('rol_id', 'Por favor selecciona un rol.')
            ->greaterThan('rol_id', 0, 'Por favor selecciona un rol.')

            ->requirePresence('username', 'Por favor escriba un nombre de usuario.')
            ->notEmptyString('username', 'Por favor escriba un nombre de usuario.')
            ->maxLength('username', 255)
            
            //->requirePresence('password', 'Por favor escriba una contraseña.')
            ->allowEmptyString('password')//, 'Por favor escriba una contraseña.')
            ->minLength('password', 8, 'La contraseña debe tener más de 8 caracteres.')
            ->maxLength('password', 255)

            ->allowEmptyString('comentarios', true);

        return $validator;
    }
}
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->disableAutoLayout();

$this->assign('title', "Bienvenido");

$identity = $this->request->getAttribute('identity');
$usuario_nombre = $identity->nombre;
$usuario_apellido = $identity->apellido;

?>

<div align="center">
    <h1 class="welcome">Bienvenido/a <?= $usuario_nombre . " " . $usuario_apellido ?></h1>
    <br>
    <span>
        Si es la primera vez que entra, por favor lee el manual antes de empezar: 
        <a href="../manual_online_facta.pdf" target="_blank"><i class="far fa-file-pdf"></i> Manual online FACTA</a>
    </span>    
    <br><br>
    <span>
        Si tiene alguna duda, puede escribir al sevicio técnico: 
        <a href="mailto:tecnico@formacionytecnologia.com">tecnico@formacionytecnologia.com</a>
    </span>
    <br><br>
    <span>
        Se recomienda usar Mozilla Firefox y tenerlo siempre actualizado: 
        <img src="http://www.brainscorm.com/gestion/img/logo_firefox.png">
        <a href="https://www.mozilla.org/es-ES/" target="_blank"> Descargar</a>
    </span>
    <br><br>
    <span>
        <span style="color:red;"><strong>¡NUEVO!</strong></span> 
        Si tiene que modificar algún dato de alumno en la plataforma, mire ese manual: 
        <a href="../manual_editar_alumno_plataforma.pdf" target="_blank"><i class="far fa-file-pdf"></i> Manual "Editar perfil de alumno en la plataforma"</a>
    </span>
</div>
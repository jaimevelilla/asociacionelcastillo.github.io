<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$appName = 'FACTA';

$identity = $this->request->getAttribute('identity');
$isLoggedIn = isset($identity);

if ($isLoggedIn) {
    $usuario_nombre = $identity->nombre;
    $usuario_apellido = $identity->apellido;
}


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $appName ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('facta.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--
    <script src="../webroot/js/facta.js"></script>
    -->
    <?= $this->Html->script('facta.js') ?>

</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <?php
            $img = '/facta/webroot/img/logos_addens/';
            if ($isLoggedIn) {
                $img .= 'logo_FORTEC.png';
            } else {
                $img .= 'logo_FACTA.png';
            }
            ?>
            <h3><b>
                <img src="<?= $img ?>" alt="FACTA" width="20%" height="20%" align="middle">
                <span>Aplicación de Gestión FACTA</span>
            </b></h3>

            <?php if ($isLoggedIn): ?>
                <ul id="links">
                    
                    <li class="menu">
                        <i class="fa fa-building"></i> 
                        <a href="/facta/empresas">Empresas</a>
                    </li>

                    <li class="menu">
                        <i class="fa fa-user"></i>
                        <a href="/facta/alumnos">Alumnos</a>
                    </li>

                    <li class="menu">
                        <i class="fa fa-graduation-cap"></i>
                        <a href="/facta/tutores">Tutores</a>
                    </li>

                    <li class="menu">
                        <i class="fa fa-book"></i>
                        <a href="/facta/cursos">Cursos</a>
                    </li>

                    <li class="menu">
                        <i class="fa fa-book"></i>
                        <a href="/facta/centros">Centros</a>
                    </li>

                    <li class="menu">
                        <i class="far fa-check-square"></i>
                        <a href="/facta/alumnos-inscritos">Alumnos Preinscritos</a>
                    </li>

                    <li class="menu">
                        <i class="fa fa-book"></i>
                        <a href="/facta/cursos-inscritos">Cursos Preinscritos</a>
                    </li>

                    <!--
                    <li class="menu">
                        <i class="fa fa-book"></i>
                        <a href="/facta/captaciones">Captaciones</a>
                    </li>
                    -->



                </ul>
            <?php endif; ?>
            
        </div>
        <?php if ($isLoggedIn): ?>
            <div class="top-nav-links">
                <p><b>
                &nbsp;<i class="fa fa-user"></i>&nbsp;
                <?php 
                if (isset($usuario_nombre) && isset($usuario_apellido)) 
                    echo "{$usuario_nombre} {$usuario_apellido}";
                ?>
                </b></p>
                <p><i class="fa fa-sign-out-alt maroon"></i>&nbsp;<a href="/facta/usuarios/logout">Cerrar sesión</a></p>
                <p><i class="fa fa-question-circle maroon"></i>&nbsp;<a href="mailto:tecnico@formacionytecnologia.com">Servicio técnico</a></p>
                <p><i class="fa fa-users maroon"></i>&nbsp;<a href="/facta/usuarios">Usuarios</a></p>
            </div>
        <?php endif; ?>

    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        <hr>
        ©Fortec, Formación y Tecnología 
    </footer>
</body>
</html>
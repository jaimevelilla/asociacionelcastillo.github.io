<?php $this->assign('title', 'Iniciar sesión'); ?>
<div class='usuarios form'>
    <?= $this->Flash->render() ?>
    <h3>Iniciar sesión</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor introduzca sus credenciales') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Usuario', 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña', 'required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Iniciar sesión')); ?>
    <?= $this->Form->end() ?>
</div>
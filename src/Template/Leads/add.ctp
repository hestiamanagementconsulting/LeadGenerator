<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Accciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Leads'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="leads form large-9 medium-8 columns content">
    <?= $this->Form->create($lead) ?>
    <fieldset>
        <legend><?= __('Nuevo Lead') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('email');
            echo $this->Form->control('cargo');
            echo $this->Form->control('empresa');
            echo $this->Form->control('website');
            echo $this->Form->control('region_pais');
            echo $this->Form->control('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

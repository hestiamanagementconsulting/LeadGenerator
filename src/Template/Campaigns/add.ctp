<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="campaigns form large-9 medium-8 columns content">
    <?= $this->Form->create($campaign) ?>
    <fieldset>
        <legend><?= __('Add Campaign') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

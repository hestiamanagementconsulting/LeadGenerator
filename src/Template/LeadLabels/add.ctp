<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lead Labels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="leadLabels form large-9 medium-8 columns content">
    <?= $this->Form->create($leadLabel) ?>
    <fieldset>
        <legend><?= __('Add Lead Label') ?></legend>
        <?php
            echo $this->Form->control('id_label');
            echo $this->Form->control('Id_lead');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

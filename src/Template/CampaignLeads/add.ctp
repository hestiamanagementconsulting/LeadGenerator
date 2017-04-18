<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Campaign Leads'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="campaignLeads form large-9 medium-8 columns content">
    <?= $this->Form->create($campaignLead) ?>
    <fieldset>
        <legend><?= __('Add Campaign Lead') ?></legend>
        <?php
            echo $this->Form->control('id_campaign');
            echo $this->Form->control('id_lead');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

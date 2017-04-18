<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $campaignLabel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $campaignLabel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Campaign Labels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="campaignLabels form large-9 medium-8 columns content">
    <?= $this->Form->create($campaignLabel) ?>
    <fieldset>
        <legend><?= __('Edit Campaign Label') ?></legend>
        <?php
            echo $this->Form->control('id_label');
            echo $this->Form->control('id_campaign');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

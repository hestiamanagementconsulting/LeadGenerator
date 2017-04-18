<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign Label'), ['action' => 'edit', $campaignLabel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign Label'), ['action' => 'delete', $campaignLabel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaignLabel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaign Labels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign Label'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaignLabels view large-9 medium-8 columns content">
    <h3><?= h($campaignLabel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaignLabel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Label') ?></th>
            <td><?= $this->Number->format($campaignLabel->id_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Campaign') ?></th>
            <td><?= $this->Number->format($campaignLabel->id_campaign) ?></td>
        </tr>
    </table>
</div>

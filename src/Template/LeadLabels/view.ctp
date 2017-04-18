<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lead Label'), ['action' => 'edit', $leadLabel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lead Label'), ['action' => 'delete', $leadLabel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leadLabel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lead Labels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead Label'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leadLabels view large-9 medium-8 columns content">
    <h3><?= h($leadLabel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leadLabel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Label') ?></th>
            <td><?= $this->Number->format($leadLabel->id_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Lead') ?></th>
            <td><?= $this->Number->format($leadLabel->Id_lead) ?></td>
        </tr>
    </table>
</div>

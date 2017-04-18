<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign Lead'), ['action' => 'edit', $campaignLead->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign Lead'), ['action' => 'delete', $campaignLead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaignLead->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaign Leads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign Lead'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaignLeads view large-9 medium-8 columns content">
    <h3><?= h($campaignLead->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaignLead->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Campaign') ?></th>
            <td><?= $this->Number->format($campaignLead->id_campaign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Lead') ?></th>
            <td><?= $this->Number->format($campaignLead->id_lead) ?></td>
        </tr>
    </table>
</div>

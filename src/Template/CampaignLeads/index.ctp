<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campaign Lead'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campaignLeads index large-9 medium-8 columns content">
    <h3><?= __('Campaign Leads') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover table-condensed table-responsive">
        <thead>
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_campaign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_lead') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campaignLeads as $campaignLead): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campaignLead->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaignLead->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaignLead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaignLead->id)]) ?>
                </td>
                <td><?= $this->Number->format($campaignLead->id_campaign) ?></td>
                <td><?= $this->Number->format($campaignLead->id_lead) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campaign Label'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campaignLabels index large-9 medium-8 columns content">
    <h3><?= __('Campaign Labels') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover table-condensed table-responsive">
        <thead>
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_campaign') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campaignLabels as $campaignLabel): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campaignLabel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaignLabel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaignLabel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaignLabel->id)]) ?>
                </td>
                <td><?= $this->Number->format($campaignLabel->id_label) ?></td>
                <td><?= $this->Number->format($campaignLabel->id_campaign) ?></td>
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

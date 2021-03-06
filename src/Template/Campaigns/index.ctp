<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="page-header" id="actions-sidebar">
    <ul class="page-header">
        <li><?= ('Accciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Campaña'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-lg-12">
    <h3><?= __('Lista de Campañas') ?></h3>
    <table class="table table-hover table-condensed table-responsive" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="actions"><?= __('Acciones') ?></th>
                <th><?= $this->Paginator->sort('Nombre') ?></th>
                <th><?= $this->Paginator->sort('Fecha inicio') ?></th>
                <th><?= $this->Paginator->sort('Fecha fin') ?></th>
                <th><?= $this->Paginator->sort('Creada') ?></th>
                <th><?= $this->Paginator->sort('Modificada') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campaigns as $campaign): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $campaign->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $campaign->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $campaign->id], ['confirm' => __('Est&acute; seguro de querer borrar la campaña # {0}?', $campaign->id)]) ?>
                </td>
                <td><?= h($campaign->nombre) ?></td>
                <td><?= h($campaign->fecha_inicio) ?></td>
                <td><?= h($campaign->fecha_fin) ?></td>
                <td><?= h($campaign->created) ?></td>
                <td><?= h($campaign->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="view">
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

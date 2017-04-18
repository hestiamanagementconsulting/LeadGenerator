<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="page-header" id="actions-sidebar">
    <ul class="page-header">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-lg-12">
    <h3><?= __('Lista de Leads') ?></h3>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('#') ?></th>
                <th><?= $this->Paginator->sort('Nombre') ?></th>
                <th><?= $this->Paginator->sort('Apellido') ?></th>
                <th><?= $this->Paginator->sort('Correo electrónico') ?></th>
                <th><?= $this->Paginator->sort('Cargo') ?></th>
                <th><?= $this->Paginator->sort('Empresa') ?></th>
                <th><?= $this->Paginator->sort('Dirección web') ?></th>
                <th><?= $this->Paginator->sort('Region / Pais') ?></th>
                <th><?= $this->Paginator->sort('Teléfono') ?></th>
                <th><?= $this->Paginator->sort('Creado') ?></th>
                <th><?= $this->Paginator->sort('Modificado') ?></th>
                <th class="actions"><?= __('Accciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leads as $lead): ?>
            <tr>
                <td><?= $this->Number->format($lead->id) ?></td>
                <td><?= h($lead->nombre) ?></td>
                <td><?= h($lead->apellido) ?></td>
                <td><?= h($lead->email) ?></td>
                <td><?= h($lead->cargo) ?></td>
                <td><?= h($lead->empresa) ?></td>
                <td><?= h($lead->website) ?></td>
                <td><?= h($lead->region_pais) ?></td>
                <td><?= h($lead->telefono) ?></td>
                <td><?= h($lead->created) ?></td>
                <td><?= h($lead->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $lead->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lead->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $lead->id], ['confirm' => __('Está seguro de querer eliminar el Lead # {0}?', $lead->id)]) ?>
                </td>
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

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="page-header" id="actions-sidebar">
    <ul class="page-header">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva etiqueta'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-lg-12">
    <h3><?= __('Lista de etiquetas') ?></h3>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('#') ?></th>
                <th><?= $this->Paginator->sort('Nombre') ?></th>
                <th><?= $this->Paginator->sort('Creada') ?></th>
                <th><?= $this->Paginator->sort('Modificada') ?></th>
                <th class="actions"><?= __('Accciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($labels as $label): ?>
            <tr>
                <td><?= $this->Number->format($label->id) ?></td>
                <td><?= h($label->nombre) ?></td>
                <td><?= h($label->created) ?></td>
                <td><?= h($label->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $label->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $label->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $label->id], ['confirm' => __('Est&aacute; seguro de querer eliminar la etiqueta # {0}?', $label->id)]) ?>
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

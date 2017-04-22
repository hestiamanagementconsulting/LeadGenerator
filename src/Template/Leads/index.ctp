<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><a href="Leads">Importación</a></li>
        <li role="presentation"><a href="Campaigns">Campañas</a></li>
        <li role="presentation"><a href="Labels">Etiquetas</a></li>
        <li role="presentation" class="active"><a href="Leads">Listar Leads</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Administración de Leads</h3>
  </div>
</div> <!-- /container -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lead'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leads index large-9 medium-8 columns content">
    <h3><?= __('Leads') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover table-condensed table-responsive">
        <thead>
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_pais') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LinkedIn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Industria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leads as $lead): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $lead->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lead->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $lead->id], ['confirm' => __('Está seguro de querer borrar el Lead con email: # {0}?', $lead->email)]) ?>
                </td>
                <td><?= h($lead->nombre) ?></td>
                <td><?= h($lead->apellido) ?></td>
                <td><?= h($lead->email) ?></td>
                <td><?= h($lead->cargo) ?></td>
                <td><?= h($lead->empresa) ?></td>
                <td><?= h($lead->website) ?></td>
                <td><?= h($lead->region_pais) ?></td>
                <td><?= h($lead->telefono) ?></td>
                <td><?= h($lead->LinkedIn) ?></td>
                <td><?= h($lead->Industria) ?></td>
                <td><?= h($lead->created) ?></td>
                <td><?= h($lead->modified) ?></td>
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

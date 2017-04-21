<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><a href="../Leads">Importación</a></li>
        <li role="presentation"><a href="../Campaigns">Campañas</a></li>
        <li role="presentation" class="active"><a href="../Labels">Etiquetas</a></li>
        <li role="presentation"><a href="../Leads">Listar Leads</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Administración de Leads</h3>
  </div>
</div> <!-- /container -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Label'), ['action' => 'edit', $label->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Label'), ['action' => 'delete', $label->id], ['confirm' => __('Are you sure you want to delete # {0}?', $label->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Labels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Label'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="labels view large-9 medium-8 columns content">
    <h3><?= h($label->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($label->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($label->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($label->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($label->modified) ?></td>
        </tr>
    </table>
</div>

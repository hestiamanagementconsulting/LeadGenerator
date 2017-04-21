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
        <li role="presentation" class="active"><a href="../Campaigns">Campañas</a></li>
        <li role="presentation"><a href="../Labels">Etiquetas</a></li>
        <li role="presentation"><a href="../Leads">Listar Leads</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Administración de Leads</h3>
  </div>
</div> <!-- /container -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaigns view large-9 medium-8 columns content">
    <h3><?= h($campaign->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($campaign->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaign->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($campaign->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($campaign->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($campaign->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($campaign->modified) ?></td>
        </tr>
    </table>
</div>

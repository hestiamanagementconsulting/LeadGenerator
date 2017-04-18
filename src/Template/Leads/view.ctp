<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Lead'), ['action' => 'edit', $lead->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Lead'), ['action' => 'delete', $lead->id], ['confirm' => __('Está seguro de querer eliminar el Lead # {0}?', $lead->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Leads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Añadir Lead'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Detalle del Lead</h3>
    </div>
    <div class="panel-body">
       <h3><?= h($lead->id) ?></h3>
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($lead->nombre) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Apellido') ?></th>
                <td><?= h($lead->apellido) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($lead->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cargo') ?></th>
                <td><?= h($lead->cargo) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Empresa') ?></th>
                <td><?= h($lead->empresa) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Website') ?></th>
                <td><?= h($lead->website) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Region Pais') ?></th>
                <td><?= h($lead->region_pais) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Telefono') ?></th>
                <td><?= h($lead->telefono) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($lead->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($lead->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($lead->modified) ?></td>
            </tr>
        </table>
    </div>
    </div>
</div>

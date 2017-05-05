<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lead'), ['action' => 'edit', $lead->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lead'), ['action' => 'delete', $lead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lead->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lead'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leads view large-9 medium-8 columns content">
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
            <th scope="row"><?= __('LinkedIn') ?></th>
            <td><?= h($lead->LinkedIn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Industria') ?></th>
            <td><?= h($lead->Industria) ?></td>
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

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
        <li><?= $this->Html->link(__('List Labels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="labels form large-9 medium-8 columns content">
    <?= $this->Form->create($label) ?>
    <fieldset>
        <legend><?= __('Add Label') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $campaign->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="campaigns form large-9 medium-8 columns content">
    <?= $this->Form->create($campaign) ?>
    <fieldset>
        <legend><?= __('Edit Campaign') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

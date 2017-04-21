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
        <li role="presentation"><a href="../Labels">Etiquetas</a></li>
        <li role="presentation" class="active"><a href="../Leads">Listar Leads</a></li>
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
                ['action' => 'delete', $lead->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lead->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Leads'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="leads form large-9 medium-8 columns content">
    <?= $this->Form->create($lead) ?>
    <fieldset>
        <legend><?= __('Edit Lead') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('email');
            echo $this->Form->control('cargo');
            echo $this->Form->control('empresa');
            echo $this->Form->control('website');
            echo $this->Form->control('region_pais');
            echo $this->Form->control('telefono');
            echo $this->Form->control('LinkedIn');
            echo $this->Form->control('Industria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

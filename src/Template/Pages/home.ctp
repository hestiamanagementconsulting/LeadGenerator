<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

$cakeDescription = 'Lead Generation';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->script(['bootstrap.min', 'jquery-3.2.0.min']) ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">
<div class="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation" class="active"><a href="Campaigns">Campañas</a></li>
        <li role="presentation"><a href="Labels">Etiquetas</a></li>
        <li role="presentation"><a href="Leads">Listar Leads</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Administración de Leads</h3>
  </div>
</div> <!-- /container -->
<?= $this->Form->create('Importar',['type' => 'file','url' => ['controller'=>'Leads','action' => 'importCSV'],'class'=>'form-inline','role'=>'form',]) ?>
  <fieldset>
    <!-- Form Name -->
    <legend>Importar fichero CSV</legend>
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="CSVFile">Seleccionar el fichero CSV</label>
      <div class="col-md-4">
        <?php echo $this->Form->input('csv', ['type'=>'file','class' => 'form-control', 'label' => false, 'placeholder' => 'csv upload',]); ?>
      </div>
    </div>
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Submit"></label>
      <div class="col-md-4">
        <button id="Submit" name="Submit" class="btn btn-primary">Cargar Leads</button>
      </div>
    </div>
  </fieldset>
<?= $this->Form->end() ?>
<div id="footer">
  <div class="container">
    <p class="text-muted credit">Aplicación creada por <a href="wwww.hestiamanagementconsulting.com">HMC - Hestia Management Consulting</a>. Todos los derechos reservados.</p>
  </div>
</div>
</body>
</html>

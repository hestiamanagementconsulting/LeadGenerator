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
        <li role="presentation" class="active"><a href="Leads">Importación</a></li>
        <li role="presentation"><a href="Campaigns">Campañas</a></li>
        <li role="presentation"><a href="Labels">Etiquetas</a></li>
        <li role="presentation"><a href="Leads">Listar Leads</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Administración de Leads</h3>
  </div>
</div> <!-- /container -->
<?= $this->Form->create('Importar',['type' => 'file','url' => ['controller'=>'Leads','action' => 'importCSV'],'class'=>'form-inline','role'=>'form',]) ?>
<fieldset>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <table class="">
                                <tbody>
                                    <tr>
                                        <td class="">
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                             <h1 class="">1</h1>

                                                        </td>
                                                        <td>
                                                             <h3 class="">Archivo</h3>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="//placehold.it/100x100" class="img-responsive">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="">
                                          <div class="form-group">
                                            <div class="col-md-4">
                                              <?php echo $this->Form->input('csv', ['type'=>'file','class' => 'form-control', 'label' => false, 'placeholder' => 'csv upload',]); ?>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="">&nbsp;&nbsp;</td>
                                        <td class="">
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                             <h1 class="">2</h1>

                                                        </td>
                                                        <td>
                                                             <h3 class="">Campañas</h3>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select name="OpcionesCampana[]" id="OpcionesCampana" class="form-control" multiple="multiple">
                                                                <option value="1">Campaña 1</option>
                                                                <option value="2">Campaña 2</option>
                                                                <option value="3">Campaña 3</option>
                                                                <option value="4">Campaña 4</option>
                                                                <option value="5">Campaña 5</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="col-md-4">
                                                                    <button id="Submit" name="Submit" class="btn btn-primary">Asociar Campaña</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=""><h1>ó</h1></td>
                                        <td class="">&nbsp;&nbsp;</td>
                                        <td class="">&nbsp;&nbsp;</td>
                                        <td class="">&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="">
                                            <img src="//placehold.it/100x100" class="img-responsive">
                                        </td>
                                        <td class="">
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>nombre, apellidos, email, cargo, empresa, website, region</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <textarea class="form-control"></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="">&nbsp;&nbsp;</td>
                                        <td class="">
                                      <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                             <h1 class="">3</h1>

                                                        </td>
                                                        <td>
                                                             <h3 class="">Etiquetas</h3>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" multiple="multiple">
                                                                <option>Etiqueta 1</option>
                                                                <option>Etiqueta 2</option>
                                                                <option>Etiqueta 3</option>
                                                                <option>Etiqueta 4</option>
                                                                <option>Etiqueta 5</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="col-md-4">
                                                                    <button id="Submit" name="Submit" class="btn btn-primary">Asociar etiqueta</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
              <div class="col-md-1">
                  <button id="Submit" name="Submit" class="btn btn-primary">Cargar Leads</button>
              </div>
            </div>
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

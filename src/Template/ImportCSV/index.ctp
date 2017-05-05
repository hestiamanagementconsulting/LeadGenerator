<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="intro-import">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Form->create('Importar',['type' => 'file','url' => ['controller'=>'ImportCSV','action' => 'importCSV'],'class'=>'form-inline','role'=>'form',]) ?>
                <fieldset>
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
                                                                     <h3 class="intro-message">Archivo</h3>
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
                                                                     <h3 class="intro-message">Campañas</h3>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    echo $this->Form->select('Campanas', $OpcionesCampana, [
                                                                        'multiple' => 'multiple'
                                                                    ]);
                                                                    ?>

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
                                                    <table class="intro-message">
                                                        <tbody>
                                                            <tr>
                                                                <td><h3>nombre, apellidos, email, cargo, empresa, website, region</h3></td>
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
                                                                     <h3 class="intro-message">Etiquetas</h3>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $this->Form->select('Etiquetas', $OpcionesEtiqueta, [
                                                                        'multiple' => 'multiple'
                                                                    ]);
                                                                     ?>
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
                </fieldset>
                
                <div class="form-group">
                  <div class="col-md-1">
                      <button id="Submit" name="Submit" class="btn btn-primary">Cargar Leads</button>
                  </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

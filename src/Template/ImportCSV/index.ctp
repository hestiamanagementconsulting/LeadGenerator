<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="intro-import">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-message-import">
                    <h1>Importación</h1>
                    <h3>Plantilla CSV descargar <a href="../webroot/templates/PlantillaCSV.zip">aquí</a></h3>
                    <hr class="intro-divider">
                </div>
            </div>
        </div>
        <?= $this->Form->create(null, ['type' => 'file','url' => ['controller' => 'ImportCSV', 'action' => 'import'],'class'=>'form-inline','role'=>'form',]) ?>
        <fieldset>
              <div class="row">
                <div class="col-md-6">
                    <div class="intro-message-import">
                        <h3 class="intro-message-import">1 Archivo</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-message-import">
                        <h3 class="intro-message-import">2 Campañas</h3>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <?php echo $this->Form->input('csv', ['type'=>'file','class' => 'form-control', 'label' => false, 'placeholder' => 'csv upload',]); ?>    
                </div>
                <div class="col-md-6">
                    <?php
                      echo $this->Form->select('Campanas', $OpcionesCampana, [
                           'multiple' => 'multiple'
                           ]);
                    ?></div>
              </div>
              <div class="row">
                <div class="col-md-12"><hr class="intro-divider"></div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="intro-message-import">
                        <h3 class="intro-message-import">Texto</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="intro-message-import">
                        <h3 class="intro-message-import">3 Etiquetas</h3>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6"><textarea class="form-control"></textarea></div>
                <div class="col-md-6">
                    <?php echo $this->Form->select('Etiquetas', $OpcionesEtiqueta, [
                               'multiple' => 'multiple'
                               ]);
                    ?></div>
              </div>
              <div class="form-group">
                 <div class="col-md-1">
                  <button id="Submit" name="Submit" class="btn btn-primary">Cargar Leads</button>
                 </div>
              </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
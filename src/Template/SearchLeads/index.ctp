<?php
/**
  * @var \App\View\AppView $this
  */
?>
<br>
<br>
<br>
<div class="container-fluid">
    <h3><?= __('Búsqueda de Leads') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create('Buscar',['type' => 'file','url' => ['controller'=>'SearchLeads','action' => 'searchLead'],'class'=>'form-inline','role'=>'form',]) ?>
                <fieldset>
                    <div class="form-group">
                      <label for="campoBusqueda">Texto a buscar: </label>
                      <input type="text" class="form-control" name="campoBusqueda" id="campoBusqueda">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      ¿En qué columnas?:
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="nombre" name="checkbox[]" checked>Nombre: </label>
                      <label><input type="checkbox" value="apellido" name="checkbox[]" checked>Apellido: </label>
                      <label><input type="checkbox" value="email" name="checkbox[]">Email: </label>
                      <label><input type="checkbox" value="cargo" name="checkbox[]" checked>Cargo: </label>
                      <label><input type="checkbox" value="empresa" name="checkbox[]">Empresa: </label>
                      <label><input type="checkbox" value="website" name="checkbox[]">Website: </label>
                      <label><input type="checkbox" value="region_pais" name="checkbox[]" checked>Región País: </label>
                      <label><input type="checkbox" value="telefono" name="checkbox[]">Teléfono: </label>
                      <label><input type="checkbox" value="LinkedIn" name="checkbox[]">LinkedIn: </label>
                      <label><input type="checkbox" value="Industria" name="checkbox[]" checked>Industria: </label>
                    </div>
                    <?php
                       /* echo $this->Form->select('Campanas', $OpcionesCampana, [
                                                 'multiple' => 'multiple'
                                                 ]);*/
                        echo $this->Form->select('Etiquetas', $OpcionesEtiqueta, [
                                                 'multiple' => 'multiple'
                                                 ]);                         
                    ?>
                    <br>
                    <div class="form-group">
                      ¿Tipo de búsqueda?:
                    </div>
                    <label class="radio-inline">
                      <input type="radio" value=" and " name="optradio">Búsqueda estricta (+) ej. texto y etiqueta
                    </label>
                    <label class="radio-inline">
                      <input type="radio" value=" or " name="optradio" checked>Búsqueda extensiva (o) ej. texto o etiqueta
                    </label>
                    <div class="form-group">
                      <div class="col-md-1">
                          <button id="Submit" name="Submit" class="btn btn-primary">Buscar Leads</button>
                      </div>
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<br>
<br>
<div class="leads index large-9 medium-8 columns content">
    <h3><?= __('Leads') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover table-condensed table-responsive">
        <thead>
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_pais') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LinkedIn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Industria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leads as $lead): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $lead->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lead->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $lead->id], ['confirm' => __('Está seguro de querer borrar el Lead con email: # {0}?', $lead->email)]) ?>
                </td>
                <td><?= h($lead->nombre) ?></td>
                <td><?= h($lead->apellido) ?></td>
                <td><?= h($lead->email) ?></td>
                <td><?= h($lead->cargo) ?></td>
                <td><?= h($lead->empresa) ?></td>
                <td><?= h($lead->website) ?></td>
                <td><?= h($lead->region_pais) ?></td>
                <td><?= h($lead->telefono) ?></td>
                <td><?= h($lead->LinkedIn) ?></td>
                <td><?= h($lead->Industria) ?></td>
                <td><?= h($lead->created) ?></td>
                <td><?= h($lead->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Form->create('exportar',['url' => ['controller'=>'SearchLeads','action' => 'export'],'class'=>'form-inline','role'=>'form',]) ?>
    <fieldset>
        <div class="form-group">
            <div class="col-md-1">
                <?php
                $count =0;
                foreach($leads as $lead)
                {
                  echo '<input type="hidden" name="nombres[]" value="'. $lead->nombre . '">';
                  echo '<input type="hidden" name="apellidos[]" value="'. $lead->apellido . '">';
                  $count++;
                }

                ?>

                <button id="Submit" name="Submit" class="btn btn-primary">Exportar Leads</button>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    
</div>

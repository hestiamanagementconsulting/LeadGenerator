<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="bg-primary text-center d-flex h-100 align-items-center">
    <div class="container">
        <div class="row">
	        <div class="col-lg-12">
	          <h1 class="display-1 text-white">Lead Generator</h1>
	          <p class="lead text-white">Introduzca su usuario y contraseña para poder acceder:</p>
	          <?= $this->Flash->render() ?>
			  <?= $this->Form->create() ?>
	          	<div class="form-group">
	              <?= $this->Form->control('username') ?>
	            </div>
	            <div class="form-group">
	            	<?= $this->Form->control('password') ?>
	            </div>
	        </div>
	        <?= $this->Form->button(__('Login')); ?>
			<?= $this->Form->end() ?>
        </div>
    </div>
</div>
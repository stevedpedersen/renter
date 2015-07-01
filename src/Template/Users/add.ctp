<!-- src/Template/Users/add.ctp -->

<div class="col-xs-12">
	<?= $this->Form->create($user,['class' => 'form-horizontal']) ?>
		
	    <h1><?= __('Register') ?></h1>
	    <div class="form-group">
	    	<?= $this->Form->input('username', [
	    		'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		<div class="form-group">
		    <?= $this->Form->input('password', [
		    	'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		<div class="form-group">
		    <?= $this->Form->input('first_name', [
		    	'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		<div class="form-group">
		    <?= $this->Form->input('last_name', [
		    	'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		<div class="form-group">
		    <?= $this->Form->input('role', [
		        'options' => ['admin' => 'Admin', 'tenant' => 'Tenant'], 
		        'label' => ['class' => 'col-sm-2']
		    ]) ?>
		</div>
		
		<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']); ?>
	<?= $this->Form->end() ?>
</div>
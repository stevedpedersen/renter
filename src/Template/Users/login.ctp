<!-- File: src/Template/Users/login.ctp -->
<!--
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
-->

<div class="col-xs-12">
	<?= $this->Form->create(null,['class' => 'form-horizontal']) ?>
		
	    <h1><?= __('Login') ?></h1>
	    <div class="form-group">
	    	<?= $this->Form->input('username', [
	    		'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		<div class="form-group">
		    <?= $this->Form->input('password', [
		    	'label' => ['class' => 'col-sm-2']]) ?>
		</div>
		
		<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']); ?>
	<?= $this->Form->end() ?>
</div>
<?php echo $this->element('sidebar'); ?>

<h2>Please add a description for the service request</h2>


<?= $this->Form->create($serviceRequest) ?>

  <div class="form-group">
      <?= $this->Form->input('description', [
          'type' => 'textarea',
          'class' => 'form-control',
          'id' => 'inputDescription',
          'placeholder' => 'The roof is on fire',
          'label' => ['for' => 'inputDescription']]) ?>
  </div>

  <?= $this->Form->input('property_id', array('type' => 'hidden', 'value' => $id)) ?>

    <?= $this->Form->button(__('Submit'), 
      ['class' => 'btn btn-default']); 
    ?>
<?= $this->Form->end() ?>
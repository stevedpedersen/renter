<?php echo $this->element('sidebar'); ?>

<h2>Edit Property (leave field blank if not applicable)</h2>


<?= $this->Form->create($property) ?>

  <div class="form-group">
      <?= $this->Form->input('unitType', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputUnitType',
          'placeholder' => $property->unitType,
          'value' => $property->unitType,
          'label' => ['for' => 'inputUnitType']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('address', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputAddress',
          'placeholder' => $property->address,
          'value' => $property->address,
          'label' => ['for' => 'inputAddress']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('city', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputCity',
          'placeholder' => $property->city,
          'value' => $property->city,
          'label' => ['for' => 'inputCity']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('state', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputState',
          'placeholder' => $property->state,
          'value' => $property->state,
          'label' => ['for' => 'inputState']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('zip', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputZip',
          'placeholder' => $property->zip,
          'value' => $property->zip,
          'label' => ['for' => 'inputAddress']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('building', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBuilding',
            'placeholder' => $property->building,
            'value' => $property->building,
            'label' => ['for' => 'inputBuilding']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('unitNumber', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputUnitNumber',
            'placeholder' => $property->unitNumber,
            'value' => $property->unitNumber,
            'label' => ['for' => 'inputUnitNumber']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('beds', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBeds',
            'placeholder' => $property->beds,
            'value' => $property->beds,
            'label' => ['for' => 'inputBeds']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('baths', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBaths',
            'placeholder' => $property->baths,
            'value' => $property->baths,
            'label' => ['for' => 'inputBaths']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('rent', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputRent',
            'placeholder' => $property->rent,
            'value' => $property->rent,
            'label' => ['for' => 'inputRent']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('square_feet', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputSquareFeet',
            'placeholder' => $property->square_feet,
            'value' => $property->square_feet,
            'label' => ['for' => 'inputSquareFeet']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('image_url', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputImageUrl',
            'placeholder' => $property->image_url,
            'value' => $property->image_url,
            'label' => ['for' => 'inputImageUrl']]) ?>
  </div>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']); ?>
<?= $this->Form->end() ?>


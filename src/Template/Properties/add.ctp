<h2>Add Property (leave field blank if not applicable)</h2>


<?= $this->Form->create($property) ?>

  <div class="form-group">
      <?= $this->Form->input('unitType', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputUnitType',
          'placeholder' => 'apt/house',
          'label' => ['for' => 'inputUnitType']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('address', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputAddress',
          'placeholder' => '1234 Main St.',
          'label' => ['for' => 'inputAddress']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('city', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputCity',
          'placeholder' => 'San Francisco',
          'label' => ['for' => 'inputCity']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('state', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputState',
          'placeholder' => 'CA',
          'label' => ['for' => 'inputState']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('zip', [
          'type' => 'text',
          'class' => 'form-control',
          'id' => 'inputZip',
          'placeholder' => '94132',
          'label' => ['for' => 'inputAddress']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('building', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBuilding',
            'placeholder' => 'C',
            'label' => ['for' => 'inputBuilding']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('unitNumber', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputUnitNumber',
            'placeholder' => '267',
            'label' => ['for' => 'inputUnitNumber']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('beds', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBeds',
            'placeholder' => '3',
            'label' => ['for' => 'inputBeds']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('baths', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputBaths',
            'placeholder' => '2',
            'label' => ['for' => 'inputBaths']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('rent', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputRent',
            'placeholder' => '1800',
            'label' => ['for' => 'inputRent']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('square_feet', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputSquareFeet',
            'placeholder' => '1600',
            'label' => ['for' => 'inputSquareFeet']]) ?>
  </div>
  <div class="form-group">
      <?= $this->Form->input('image_url', [
            'type' => 'text',
            'class' => 'form-control',
            'id' => 'inputImageUrl',
            'placeholder' => 'https://images.google.com/myhouse.jpg',
            'label' => ['for' => 'inputImageUrl']]) ?>
  </div>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']); ?>
<?= $this->Form->end() ?>


<!-- Single property view -->
<?php
  $image_url = '"background-image: url(' . $property->image_url . ');"';
  $location = str_replace(' ', '%20', "https://www.google.com/maps/search/bus stops " 
    .$property->address . ", "
    .$property->city . ", "
    .$property->state);
?>


<div>
  <h1><?= $property->address ?></h1>
</div>

<div class="jumbotron" style=<?= $image_url ?>>
</div>

<div class="row">
  <div class="btn btn-lg btn-default col-xs-3 col-xs-offset-1"><?= $this->Html->link('Show on Map', 
    ['action' => 'map', $property->id]) ?>
  </div>
  <div class="btn btn-lg btn-default col-xs-3 col-xs-offset-1"><?= $this->Html->link('Bus Information', $location) ?>
  </div>
  <div class="btn btn-lg btn-default col-xs-3 col-xs-offset-1"><?= $this->Html->link('Service Request', ['action' => 'service', $property->id]) ?>
  </div>

</div>


<div class="row marketing">
  <div class="col-xs-3 col-xs-offset-1">
    <h4>Address</h4>
    <p><?= $property->address ?> <?= $property->building ?> <?= $property->unitNumber?>, <?= $property->city?>, <?= $property->state?>, <?= $property->zip?></p>

    <h4>Beds</h4>
    <p><?= $property->beds ?></p>
  </div>

  <div class="col-xs-3 col-xs-offset-1">
    <h4>Baths</h4>
    <p><?= $property->baths ?></p>

    <h4>Square Feet</h4>
    <p><?= $property->square_feet ?></p>
  </div>  

  <div class="col-xs-3 col-xs-offset-1">
    <h4>Rent</h4>
    <p>$<?= $property->rent ?> / month</p>

    <h4>Additional Info</h4>
    <p>No additional info</p>
  </div>
</div>
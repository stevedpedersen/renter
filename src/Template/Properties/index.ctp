<!-- File: src/Template/Properties/index.ctp -->
<?php
    
?>


<h1>Properties  <?php  ?></h1>
<table class="table table-striped">
    <tr>
        <th>--</th>
        <th>Property Type</th>
        <th>Address</th>
        <th>Building</th>
        <th>Unit Number</th>
        <th>Beds</th>
        <th>Baths</th>
        <th>Rent</th>
        <th>Square Feet</th>
    </tr>

    <!-- Here is where we iterate through our $properties query object, printing out property info -->

    <?php foreach ($properties as $property): ?>
    <tr>
        <td><?= $this->Html->link('View', ['action' => 'view', $property->id]) ?> / 
            <?= $this->Html->link('Edit', '') ?></td>
        <td><?= $property->unitType ?></td>
        <td><?= $property->address ?> 
            <?= $property->city ?>
            <?= $property->state ?> 
            <?= $property->zip ?></td>
        <td><?= $property->building ?></td>
        <td><?= $property->unitNumber ?></td>
        <td><?= $property->beds ?></td>
        <td><?= $property->baths ?></td>
        <td>$<?= $property->rent ?></td>
        <td><?= $property->square_feet ?></td>
    </tr>
    <?php endforeach; ?>

    
</table>

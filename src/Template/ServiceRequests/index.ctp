<?php echo $this->element('sidebar'); ?>

<h1>Service Requests  <?php  ?></h1>
<table class="table table-striped">
    <tr>
        <th>--</th>
        <th>Property ID</th>
        <th>Completed</th>
        <th>Description</th>
    </tr>

    <!-- Here is where we iterate through our $serviceRequests query object, printing out serviceRequest info -->

    <?php foreach ($serviceRequests as $serviceRequest): ?>
    <tr>
        <td><?= $this->Html->link('View', ['action' => 'view', $serviceRequest->id]) ?> / 
            <?= $this->Html->link('Delete', ['action' => 'delete', $serviceRequest->id]) ?></td>
        <td><?= $serviceRequest->property_id ?></td>
        <td>
            <?php 
                if($serviceRequest->completed) 
                {
                    echo "Complete";
                } else {
                    echo "Incomplete";
                }
            ?>
        </td> 
        <td><?= $serviceRequest->description ?></td> 

    </tr>
    <?php endforeach; ?>

    
</table>

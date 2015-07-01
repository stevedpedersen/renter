<!-- File: src/Template/Properties/index.ctp -->
<?php
    
?>


<h1>Messages  <?php  ?></h1>
<table class="table table-striped">
    <tr>
        <th>--</th>
        <th>Subject</th>
        <th>Received</th>
    </tr>

    <!-- Here is where we iterate through our $messages query object, printing out message info -->

    <?php foreach ($messages as $message): ?>
    <tr>
        <td><?= $this->Html->link('View', ['action' => 'view', $message->id]) ?> / 
            <?= $this->Html->link('Delete', ['action' => 'delete', $message->id]) ?></td>
        <td><?= $message->subject ?></td>
        <td><?= $message->created ?> 

    </tr>
    <?php endforeach; ?>

    
</table>

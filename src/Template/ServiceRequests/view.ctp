<?php echo $this->element('sidebar'); ?>
<h2> <?= $serviceRequest->property_id ?> </h2>
<p> 
	<?php 
        if($serviceRequest->completed) 
        {
            echo "Complete";
        } else {
            echo "Incomplete";
        }
    ?> 
</p>
<p> <?= $serviceRequest->description ?> </p>
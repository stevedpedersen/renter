<?php echo $this->element('sidebar'); ?>

<?php

$location = str_replace(' ', '%20', "https://www.google.com/maps/embed/v1/place?q=" 
		.$property->address . ", "
		.$property->city . ", "
		.$property->state . ", "
		."United States, "
		.$property->zip
		."&key=AIzaSyC-SGyJ3ak0wFm9mleUQV9wftiUJJiXB5Y");

?>

<iframe width="600" height="450" frameborder="0" style="border:0"
src=<?= $location ?>>
</iframe>

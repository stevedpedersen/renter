<?php echo $this->element('sidebar'); ?>

<?php
// 	$location = $this->Url->build([
//     "place?" => ["q" => $property->address],
//     "," => "San Bruno",
//     "," => "CA",
//     "," => "United States"
// ]);

// $location = str_replace(' ', '+', "https://maps.googleapis.com/maps/api/staticmap?size=480x480&markers=icon:http://chart.apis.google.com/chart?chst=d_map_pin_icon%26chld=cafe%257C996600%7C" 
// 		.$property->address . ", "
// 		.$property->city);

// one blue marker labeled "S" at 62.107733, -145.5419,
// &markers=size:tiny%7Ccolor:blue%7Clabel:S%7C37.79385,-122.44183700000002

// 37.79385  -122.44183700000002

$busMap = "https://maps.googleapis.com/maps/api/staticmap?center=".$property->address.", ".$property->city."&zoom=16&size=600x450&maptype=roadmap";
$counter = 0;

?>



<?php
$myLocation = str_replace(' ', '%20', "http://maps.google.com/maps?q=" 
		.$property->address . ", "
		.$property->city . ", "
		."&output=embed");

?>

<h3>Rental Location:</h3>
<iframe width="600" height="450" frameborder="0" style="border:0"
src=<?= $myLocation ?>>
</iframe>


<?php foreach ($stations as $station): ?>
	<?php if(++$counter >= 11) break; ?>
	<?php 
		$busMap .= 
		"&markers=icon:http://chart.apis.google.com/chart?chst=d_map_pin_icon%26chld=bus%257C996600"
		."%7C".$station['geometry']['location']['lat'].",".$station['geometry']['location']['lng'];
	?>

<?php endforeach; ?>

<?php $busMap = str_replace(" ", "+", $busMap) . "&key=AIzaSyC-SGyJ3ak0wFm9mleUQV9wftiUJJiXB5Y" ?>
<h3>Nearby bus stations:</h3>
<img src=<?= $busMap ?>>

<h3>Additional Information:</h3>
<table class="table table-striped">
    <tr>
        <th>--</th>
        <th>Transit Type</th>
        <th>Location</th>
    </tr>

    <!-- Here is where we iterate through our $properties query object, printing out property info -->
    <?php $counter=0; ?>
    <?php foreach ($stations as $station): ?>
	
	    <?php if(++$counter >= 11) break; ?>
	    <?php $stationLocation = str_replace(' ', '%20', "http://maps.google.com/maps?q=" 
			.str_replace('&', 'and', $station['name']) . ", "
			.$property->city);
		?>
	    <tr>
	        <td><?= $this->Html->link('View', $stationLocation) ?></td>
	        <td>Bus</td>
	        <td><?= $station['name'] ?></td>
	    </tr>
    <?php endforeach; ?>

    
</table>




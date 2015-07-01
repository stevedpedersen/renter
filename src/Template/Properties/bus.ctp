<?php
// 	$location = $this->Url->build([
//     "place?" => ["q" => $property->address],
//     "," => "San Bruno",
//     "," => "CA",
//     "," => "United States"
// ]);
$location = str_replace(' ', '%20', "https://www.google.com/maps/search/bus stops " 
		.$property->address . ", "
		.$property->city . ", "
		.$property->state . ", "
		."United States, "
		.$property->zip
		."&key=AIzaSyBofA2RgbtF_-qYUgZzWJi9scKK5JDTW2U");

?>

<iframe width="600" height="450" frameborder="0" style="border:0"
src=<?= $location ?>>
</iframe>

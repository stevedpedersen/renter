<?php echo $this->element('sidebar'); ?>

<?php

use Cake\Network\Http\Client;

$http = new Client();

$url = "http://spedersen.dev.at.sfsu.edu/renter_mgmt/properties/" . $property->id . ".json";

//echo $http->get($url);

$json = file_get_contents($url);
$data = json_decode($json, true); 

$this->Form->create(null, [
    'url' => 'http://www.google.com/search',
    'type' => 'get'
]);

?>

<?= $data['property']['user_id'] ?>



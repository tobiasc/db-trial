<?php
require_once('riak-php-client/riak.php');
$client = new RiakClient('127.0.0.1', 8098);
$bucket = $client->bucket('test');

$n = 5000000;

// insert 5 million items
for($i = 0; $i < $n; $i++){
	if($i % round($n/100000) === 0){
		echo $i."\n";
	}
	$person = $bucket->newObject('foo'+$i, array(
	    'key' => 'foo'.$i
	));
	$person->store();
}

// get 2.5 million items
for($i = $n; $i > 0; $i -= 2){
	if($i % round($n/10000) === 0){
		echo $i."\n";
	}
	$person = $bucket->get('foo'.$i);
}
?>

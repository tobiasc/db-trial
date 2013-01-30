<?php
require 'Predis/Autoloader.php';
Predis\Autoloader::register();
$redis = new Predis\Client();

$n = 5000000;

// insert 5 million items
for($i = 0; $i < $n; $i++){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	$redis->set('foo'.$i, 'bar');
}

// get 2.5 million items
for($i = $n; $i > 0; $i -= 2){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	$value = $redis->get('foo'.$i);
}
?>

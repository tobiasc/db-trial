<?php
require_once('sag/src/Sag.php');
$sag = new Sag('127.0.0.1', '5984');
$sag->setDatabase('test');

$n = 5000000;

// insert 5 million items
for($i = 0; $i < $n; $i++){
	if($i % round($n/100000) === 0){
		echo $i."\n";
	}
	$sag->put('foo'.$i, 'foo');
}

// get 2.5 million items
for($i = $n; $i > 0; $i -= 2){
	if($i % round($n/10000) === 0){
		echo $i."\n";
	}
	$post = $sag->get('foo'.$i);
}
?>

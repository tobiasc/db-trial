<?php
$m = new Mongo();
$db = $m->test;
$collection = $db->test;

$n = 5000000;

// insert 5 million items
for($i = 0; $i < $n; $i++){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	$collection->insert(array('key' => 'foo'.$i));
}

// get 2.5 million items
for($i = $n; $i > 0; $i -= 2){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	$value = $collection->findOne(array('key' => 'foo'.$i));
}

$m->close();
?>

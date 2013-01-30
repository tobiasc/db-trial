<?php
mysql_connect(localhost, 'root', 'test');
mysql_select_db('test');

$n = 5000000;

// insert 5 million items
for($i = 0; $i < $n; $i++){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	mysql_query('INSERT INTO  `test`.`test` (`key`) VALUES ("foo'.$i.'")');
}

// get 2.5 million items
for($i = $n; $i > 0; $i -= 2){
	if($i % round($n/100) === 0){
		echo $i."\n";
	}
	mysql_query('SELECT * FROM test WHERE key = "foo'.$i.'"');
}
?>

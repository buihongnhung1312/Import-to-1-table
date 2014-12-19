<?php
 
	// include 'proceed.php';
	require __DIR__.'/proceed.php';
	// echo __DIR__;

	$data = new Data();

	$avg = 0;
	$interval = 1;
	for ($i=0; $i < $interval; $i++) { 
		$temp = $data -> import('products');
		$avg += $temp;
		echo $temp. "<br>";
	}

	echo "Average : ". $avg/$interval;
	// $fj -> Export('abc');

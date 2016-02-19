<?php
	//提取字典  
	$basef = file('./new.name');  
	$bf_sum = (count($basef)-1);  
	$k = mt_rand(0,$bf_sum);
	echo str_replace("/r/n", "", $basef[$k]);
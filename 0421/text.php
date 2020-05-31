<?php
	
	
	$str = '1;2;3;;4;';
	$str_cut = explode(';',$str);
	
	echo str_pad( $str_cut[0],3,"0",STR_PAD_LEFT),"<br>";
	echo $str_cut[1],"<br>";
	echo $str_cut[2],"<br>";
	echo $str_cut[3],"<br>";
	echo $str_cut[4],"<br>";

?>
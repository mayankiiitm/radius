<?php
/**
* 
*/
class Test
{
	function home(){	
		$d = DateTime::createFromFormat('Y-m-d', Input::get('d'));
    	echo $d && $d->format('Y-m-d') == $d;
    	var_dump($d);
		 
	}
}
?>
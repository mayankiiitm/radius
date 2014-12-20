<?php
/**
* 
*/
class Test
{
	function home(){	
		$location=new Users;
		$longitude=134;
		$latitude=7;
		for ($i=1; $i <100 ; $i++) { 
			$id=$i;

$location->insert(array('fb_id'=>$id));
$longitude++;
$latitude++;
		}
		
	}
}
?>
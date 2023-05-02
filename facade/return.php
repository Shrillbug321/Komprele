<?php
	function return_encode($return)
	{
		$return = str_replace("&", "$", $return);
		return $return;
	}
	
	function return_decode($return)
	{
		$return = str_replace("$", "&", $return);
		return $return;
	}
?>
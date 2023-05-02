<?php
	function user_id_encode($user_id)
	{
		$user_id = convert_uuencode($user_id);
		$user_id = bin2hex($user_id);
		return $user_id;
	}
?>
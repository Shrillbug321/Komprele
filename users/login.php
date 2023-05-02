<?php
	require_once('facade/head.php');
	require_once($facade."header.php");
	require_once($facade."user_id_encode.php");
	require_once($facade."return.php");
	require_once($facade."session.php");
	echo '<div id="content">';
	$query = 'SELECT * FROM users WHERE user_name = "'.$_POST['user_name'].'" AND password = "'.$_POST['password'].'"';
	$result = $connection->query($query);
	if ($row = $result->fetch_assoc())
	{
		$user_id = $row['user_id'];
		session_init($user_id);
		$user_id = user_id_encode($user_id);
		$return = return_decode($_POST['return']);
		echo '<script type="text/javascript"> location.href = "'.$return;
		if (strpos($return, "?") > 0)
			echo "&";
		else
			echo "?";
		echo 'user_id='.$user_id.'" </script>';
	}
	else
	{
		echo '<p> Nie udało się zalogować. <a class="click_here" href="login_form.php"> Kliknij tutaj </a> aby spróbować ponownie. </p>';
	}
	echo '</div>';
	require_once($facade."footer.php");
?>
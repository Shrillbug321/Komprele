<html>
<?php require_once('facade/head.php'); 
	require_once("update_pieces.php");
	require_once($facade."session.php");
	require_once($facade."user_id_decode.php");
	require_once($facade."return.php");
?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		echo '<div id="content">';
		if ($_GET['success'] == 1)
		{
			$return = session_get_return($user_id);
			$return = return_decode($return);
			echo '<p> Zamówienie złożono pomyślnie. <a class="click_here" href="'.$return.'"> Kliknij tutaj </a> aby wrócić do wcześniej strony </p>';
			update_pieces('-', $user_id);
			session_clear($user_id, 'order_id');
		}
		else
		{
			echo '<p> Coś poszło nie tak i zamówienie nie doszło do skutku. </p> 
			<button onclick="javascript:history.go(-4)"> Kliknij tutaj </button>
			<p> aby spróbować ponownie </p>';
		}
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>
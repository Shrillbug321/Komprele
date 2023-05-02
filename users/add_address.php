<html>
<?php require_once('facade/head.php'); 
require_once($facade."user_id_decode.php");
require_once($facade."session.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_POST['user_id']);
		$query = 'INSERT INTO addresses(user_id, street, house_number, postal_code, city, country) VALUES ('.$user_id.',"'.$_POST['street'].'","'.$_POST['house_number'].'","'.$_POST['postal_code'].'","'.$_POST['city'].'","'.$_POST['country'].'")';
		$connection->query($query);
		echo '<p> Pomyślnie dodano adres. <a class="click_here" href="'.session_get_return($user_id).'"> Kliknij tutaj </a> aby wrócić do wcześniejszej strony. </p>';
		require_once($facade."footer.php");
	?>	
</body>
</html>
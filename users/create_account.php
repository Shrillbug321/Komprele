<?php require_once('facade/head.php');
	if ($_POST["password"] != $_POST["confirm"])
		echo '<p> Potwierdzenie jest różne od hasła. <a class="click_here" href="'.$account.'create_account_form.php?return='.$_POST['return'].'"> Kliknij tutaj </a> aby spróbować ponownie. </p>';
	else
	{
		$query = 'INSERT INTO users (user_name, email, password, admin) VALUES ("'.$_POST['user_name'].'","'.$_POST['email'].'","'.$_POST['password'].'",0)';
		$connection->query($query);
		echo '<p> Zarejestrowano pomyślnie. <a class="click_here" href="'.$account.'login_form.php?return='.$_POST['return'].'"> Kliknij tutaj </a> aby przejść do logowania. </p>';
	}
?>
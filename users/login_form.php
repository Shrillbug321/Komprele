<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); ?>

<body>
	<?php
		require_once($facade."header.php");
		echo '<div id="content">
		<p class="form_message"> Nie masz konta? <a class="click_here" href="create_account_form.php?return='.$_GET['return'].'"> Kliknij tutaj</a> aby je stworzyć </p>
		<form class="form" id="login_form" action="login.php" method="post">
			<label> Nazwa użytkownika <br> <input type="text" name="user_name"> </input> </label> <br>
			<label> Hasło <br> <input type="password" name="password"> </input> </label> <br>
			<input type="submit" name="submit" value="Wpisz się"> </input>
			<input type="text" name="return" value="'.$_GET['return'].'" hidden> </input>
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>
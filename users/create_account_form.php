<html>
<?php require_once('facade/head.php'); ?>

<body>
	<?php
		require_once($facade."header.php");
		echo '<div id="content">
		<form class="form" id="create_account_form" action="create_account.php" method="post">
			<label> Nazwa użytkownika <br> <input type="text" name="user_name"> </input> </label> <br>
			<label> E-poczta <br> <input type="email" name="email"> </input> </label> <br> 
			<label> Hasło <br> <input type="password" name="password"> </input> </label> <br>
			<label> Potwierdź hasło <br> <input type="password" name="confirm"> </label> </input> <br>
			<input type="submit" name="submit" value="Załóż konto"> </input>			<input type="text" name="return" value="'.$_GET['return'].'" hidden> </input>
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>
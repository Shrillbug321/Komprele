<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); ?>

<body>
	<?php
		require_once($facade."header.php");
		echo '<div id="content">
		<form class="form" id="add_address_form" action="add_address.php" method="post">
			<label> Nazwa ulicy <br> <input type="text" name="street"> </input> </label> <br>
			<label> Numer domu <br> <input type="text" name="house_number"> </input> </label> <br>
			<label> Kod pocztowy <br> <input type="text" name="postal_code"> </input> </label> <br>
			<label> Miasto <br> <input type="text" name="city"> </input> </label> <br>
			<label> Państwo <br> <input type="text" name="country"> </input> </label> <br>
			<input type="submit" name="submit" value="Zapisz"> </input>
			<input type="text" name="user_id" value="'.$_GET['user_id'].'" hidden> </input>
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>
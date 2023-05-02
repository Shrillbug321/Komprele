<div id="header">
	<h1 id="site_name"> Komprele </h1>
	<ul id="navbar">
		<?php 
			require_once($facade.'user_id_decode.php');
			require_once($facade.'check_admin.php');
			require_once($facade.'return.php');
			$return = return_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			if (!isset($_GET['user_id']))
			{
				echo '<li class="button"> <a href="'.$shop.'index.php"> Strona główna </a> </li> 
				<li class="button"> <a href="'.$shop.'categories.php"> Kategorie </a> </li> 
				<li class="button"> <a href="'.$account.'login_form.php?return='.$return.'"> Zaloguj się </a>';
			}
			else
			{
				echo '<li class="button"> <a href="'.$shop.'index.php?user_id='.$_GET['user_id'].'"> Strona główna </a> </li> 
				<li class="button"> <a href="'.$shop.'categories.php?user_id='.$_GET['user_id'].'"> Kategorie </a> </li> 
				<li class="button">	<a href="'.$account.'logout.php?return='.$return.'"> Wyloguj się </a> </li> 
				<li class="button"> <a href="'.$account.'account.php?user_id='.$_GET['user_id'].'"> Konto </a> </li> 
				<li class="button"> <a href="'.$orders.'cart.php?user_id='.$_GET['user_id'].'&return='.$return.'"> Koszyk </a> </li>';
				if (check_admin(user_id_decode($_GET['user_id'])))
					echo '</li> <li class="button"> <a href="'.$admins.'admin_panel.php?user_id='.$_GET['user_id'].'"> Administrator </a> ';
			}
		?>
	</ul>
	<div style="clear: both"> </div>
</div>
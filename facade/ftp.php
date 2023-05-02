<?php

function ftp_connection()
{
	global $ftp_connection;
	echo '<script>location.href=http://localhost:8102/start_server.php </script>';
	$ftp_connection = ftp_connect("Komprele_magazine");
	$login = ftp_login($ftp_connection, "admin", "exemplar");
}

function ftp_get_image($path, $file_name)	
{
	global $ftp_connection;
	if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/temp'.$path))
		mkdir($_SERVER['DOCUMENT_ROOT'].'/temp'.$path);
	$file = $_SERVER['DOCUMENT_ROOT'].'/temp'.$path.'/'.$file_name;
	$remote_file = ftp_pwd($ftp_connection).'/files'.$path.'/'.$file_name;
	$handle = fopen($file, 'w');
	ftp_fget($ftp_connection, $handle, $remote_file, FTP_BINARY);
	fclose($handle);
	$handle = fopen($file, 'r');
	$con = file_get_contents($file);
	$base64 = base64_encode($con);
	fclose($handle);
	return 'data:image/jpg;base64,'.$base64;
}

function ftp_put_image($image, $item_number)	
{
	global $ftp_connection;
	//echo ftp_pwd($ftp_connection).'/'.$path.'/'.$file_name;
	ftp_chdir($ftp_connection, ftp_pwd($ftp_connection).'/files');
	echo ftp_pwd($ftp_connection).$item_number;
	ftp_mkdir($ftp_connection, $item_number);
	echo ftp_pwd($ftp_connection);
	ftp_chdir($ftp_connection, ftp_pwd($ftp_connection).'/'.$item_number);
	echo ftp_pwd($ftp_connection);
	echo $image;
	ftp_put($ftp_connection, ftp_pwd($ftp_connection).'/1.jpg', $image);
	print_r(ftp_nlist($ftp_connection, ftp_pwd($ftp_connection)));
}
//ftp_close($ftp_connection);
?>
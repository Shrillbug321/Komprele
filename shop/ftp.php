<?php

	function ftp_connection()
	{
		$ftp_connection = ftp_connect("Komprele_magazine");
		$login = ftp_login($ftp_connection, "admin", "exemplar");
	}
	
	function ftp_get_image($path, $file_name)	
	{
		global $ftp_connection;
		if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/temp/'.$path))
			mkdir($_SERVER['DOCUMENT_ROOT'].'/temp/'.$path);
		$file = $_SERVER['DOCUMENT_ROOT'].'/temp'.$path.'/'.$file_name;
		$remote_file = ftp_pwd($ftp_connection).$path.'/'.$file_name;
		$handle = fopen($file, 'w');
		ftp_fget($ftp_connection, $handle, $remote_file, FTP_BINARY);
		fclose($handle);
		$handle = fopen($file, 'r');
		$con = file_get_contents($file);
		$base64 = base64_encode($con);
		fclose($handle);
		return 'data:image/jpg;base64,'.$base64;
	}
	//ftp_close($ftp_connection);
?>
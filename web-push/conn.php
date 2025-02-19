<?php
	$db 	= 'u266370231_cdc_app';
	$user	= 'u266370231_cdc_app';
	$pass	= '8;IAQEXND=m';
	$conn = mysqli_connect('localhost', $user, $pass, $db);
	date_default_timezone_set('Asia/Kolkata');
	if(!$conn){
		echo "Could Not Connect To Database ! Please Try Again ... or Refresh (f5) The Page.";
	}
?>
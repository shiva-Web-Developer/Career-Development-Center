<?php
	function logerror($text){
		$myfile = fopen("error_log.txt", "a") or die("Unable to open file!");
		$txt = "$text : ".date('d-M-y D g:i:s').PHP_EOL;
		fwrite($myfile, $txt);
		fclose($myfile);
	}
?>
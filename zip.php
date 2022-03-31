<?php
try {
	
  //Increase the execution time to 2 minutes. A good server will do it in less than 5 seconds :)
	ini_set('max_execution_time', 120);
	
	//Define the zip file that contains the wordpress code.
	//Attention: the zip file MUST not contain the wordpress folder but the script files directly.
	//WordPress delivers the zip file with a "wordpress" folder in it containing the folders and scripts
	//So zip file should looking like that:
	/*
	wordpress.zip
		-> wp-admin
		-> wp-content
		-> wp-includes
		-> index.php
		-> ... others
	*/
	//Instead of that:
	/*
	wordpress.zip
		-> wordpress <-- this is the wrong structure
			-> wp-admin
			-> wp-content
			-> wp-includes
			-> index.php
			-> ... others
	*/
	$zipFileName = "wordpress.zip";
	
	if(!file_exists($zipFileName)){
		throw new Exception("Die Zip Datei existiert nicht");
	}
	
	$zip = new ZipArchive();

	if(!$zip->open($zipFileName)){
		throw new Exception("Konnte die Zip-Datei nicht öffnen");
	}
	
	$zip->extractTo(dirname(__FILE__));
	$zip->close();
	rename($zipFileName,$zipFileName.".processed");
	header('Location: https://'.$_SERVER['HTTP_HOST'], true, 302);
	
}catch(Exception $e) {
	echo $e->getMessage();
}


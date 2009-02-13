<?php

if($_SERVER['HTTP_HOST']=="localhost"){
	$hostname		= 'localhost'; 
	$username		= 'root';
	$password		= '';
	$databasename	= 'student_teacher';
	
}else{
	$hostname		= 'localhost'; 
	$username		= 'student';
	$password		= 'teacher';
	$databasename	= 'student_teacher';
}
mysql_connect($hostname, $username, $password);
mysql_select_db($databasename);

define("_ROOT_DIR_"			, $_SERVER['DOCUMENT_ROOT']);

?>
<?php
@error_reporting(E_ERROR | E_PARSE);
/*$hostname		= 'p50mysql51.secureserver.net'; 
$dbuser		= 'pxlamdemo';
$dbpass		= 'Naragoda987';
$db	= 'pxlamdemo';	
*/
$hostname = "localhost";
$dbuser   = "root";
$dbpass   = "";
$db       = "duplacement";

$con = mysql_connect($hostname, $dbuser, $dbpass) or die ("Error: Host not connected!");
$con2 = mysql_select_db($db) or die ("Error: Database not connected!");
?>
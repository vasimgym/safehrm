<?php
function triggerMessage($id, $message)
{
	$_SESSION[$id]['message'] = "";
	$_SESSION[$id]['message'] = $message;
}

function outputTrigger($id)
{
	$m = $_SESSION[$id]['message'];
	$_SESSION[$id]['message'] = "";
	echo "<font color='red'>" . $m . "</font>";
}

// check if username already exists.
function ChkExists($tablename, $chkfield, $chkvalue, $errorvar="error_exists")
{
	$chkquery = "select * from ". $tablename ." where ". $chkfield ." = '". $chkvalue ."' limit 1";
	$res = mysql_query($chkquery);
	$num = mysql_num_rows($res);
	if ($num > 0) {
		triggerMessage($errorvar, "Username already exists!");
		return 1;
	} else {
		return 0;
	}
}
?>
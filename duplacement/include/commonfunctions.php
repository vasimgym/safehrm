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

// check if record already exists.
function ChkRecordExists($tablename, $where, $returnfield)
{
	$chkquery = "select * from ". $tablename ." where ". $where. " limit 1";
	$res = mysql_query($chkquery);
	$num = mysql_num_rows($res);
	if ($num > 0) {
		$result = mysql_fetch_array($res);
		$primarykeyval = $result[$returnfield];
		return $primarykeyval;
	} else {
		return 0;
	}
}


// check if username already exists.
function ChkExists($tablename, $chkfield, $chkvalue, $errorvar="error_exists")
{
	$chkquery = "select * from ". $tablename ." where ". $chkfield ." = '". $chkvalue ."' limit 1";
	$res = mysql_query($chkquery);
	$num = mysql_num_rows($res);
	if ($num > 0) {
		// triggerMessage($errorvar, "record already exists!");
		return 1;
	} else {
		return 0;
	}
}

function ListOptions($tablename, $optionvaluefield, $optionhtmlfield, $selected="")
{
	$chkquery = "select * from ". $tablename;
	$res = mysql_query($chkquery);
	$str = "";
	while ($result = mysql_fetch_array($res))
	{
		$optval		= $result[ $optionvaluefield];
		$opthtml	= $result[ $optionhtmlfield];
		if ($optval == $selected)
			$str .= "<option value='".$optval."' selected='selected'> ". $opthtml . " </option>";
		else
			$str .= "<option value='".$optval."'> ". $opthtml . " </option>";

	}
	return $str;

}
?>
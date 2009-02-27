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

// show related selected value

function ShowValue($tablename, $fieldid, $returnfield, $selected="")
{
	$chkquery = "select * from ". $tablename . " where " .$fieldid . " = '". $selected ."'" ;
	$res = mysql_query($chkquery);
	$result = mysql_fetch_array($res);
	$str = "";
	$str	= $result[ $returnfield];

	return $str;

}



function coursetypes($pid, $select) {
 	
 	$course_ug = mysql_query("
							SELECT id, coursename
							FROM dup_coursetypes
							WHERE pid ='$pid'
							ORDER BY coursename"
							);

	while($row = mysql_fetch_array($course_ug)) {
		$course_id		= $row['id']; 
		$course_name	= $row['coursename'];		
		if ($select==$course_id) {
			echo '<option value="'.$course_id.'" selected="selected" >'.$course_name.'</option>';
		} else {
			echo '<option value="'.$course_id.'">'.$course_name.'</option>';
		}
	}
 }



 function Specializations($pid, $select) {
 	
 	$course_ug = mysql_query("
							SELECT id, coursename
							FROM dup_specialization
							WHERE pid ='$pid'
							ORDER BY coursename"
							);

	while($row = mysql_fetch_array($course_ug)) {
		$course_id		= $row['id']; 
		$course_name	= $row['coursename'];		
		if ($select==$course_id) {
			echo '<option value="'.$course_id.'" selected="selected" >'.$course_name.'</option>';
		} else {
			echo '<option value="'.$course_id.'">'.$course_name.'</option>';
		}
	}
 }


 function ExpList($selectval="") {
	for ($i=1; $i <= 10; $i++)
	 {
		if ($select==$i) {
			echo '<option value="'.$i.'" selected="selected" >'.$i.'</option>';
		} else {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	 }
 }


 ?>
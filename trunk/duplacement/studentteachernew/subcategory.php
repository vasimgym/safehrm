<?php
session_start();
include("include/config.php");
include("include/function.php");
$r = array();
$q = $_GET['page'];
if (!empty($q)) {
$check_id = $_GET['check_id'];
$term_id  = $_GET['term_id'];
if ($term_id == 'c') {
	$r = explode(",",$check_id);
	$leftclassname = 'searchleft-subcateogrymain';
	$classname = 'search-subcateogrymain';	
} elseif ($term_id == 'b') {
	$r = explode(",",$check_id);
	$leftclassname = 'gray-subcateogry';
	$classname = 'display-subcateogry';
} else {	
	$r = explode(",",$check_id);	
	$leftclassname = 'gray-subcateogry';
	$classname = 'display-subcateogrymain';
}
echo '<table><tr><td valign="top" class="'.$leftclassname.'" style="padding-left:15px;">Subcategory</td><td class="'.$classname.'">';
$subquery = mysql_query("SELECT * FROM student_category WHERE parent_node=$q");
while ($subrs = mysql_fetch_array($subquery)) {
	if(in_array($subrs["id"],$r)) {
		echo '<input type="checkbox" name="subcatid[]" value="'.$subrs["id"].'" checked="checked" />&nbsp;'.$subrs["categoryname"].'<br>';
	} else {
		echo '<input type="checkbox" name="subcatid[]" value="'.$subrs["id"].'" />&nbsp;'.$subrs["categoryname"].'<br>';
	}
}
echo '</td>
								      </tr></table>';
}

?>
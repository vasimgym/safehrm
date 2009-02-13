<?php
session_start();
include("../include/config.php");
include("../include/function.php");
$r = array();
$q = $_GET['page'];
if ($q != 0) {
echo 'Subcategory&nbsp;<select name="subcategory" class="blue1">';
$subquery = mysql_query("SELECT * FROM student_category WHERE parent_node=$q");
while ($subrs = mysql_fetch_array($subquery)) {
	
		echo '<option value="'.$subrs["id"].'">'.$subrs["categoryname"].'</option>';
}
echo '</select>';
}
?>
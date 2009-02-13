
<?php
include("include/config.php");

if (isset($_GET['c_id'])) {
	$c_id	= $_GET['c_id'];
	$sel	= mysql_query("SELECT com_id, com_title, com_description, com_status, com_date, com_update
			 FROM teacher_comments WHERE com_id='$c_id'");
	$row	= mysql_fetch_array($sel);
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php echo $row['com_title'];?></td>
  </tr>
  <tr>
    <td><?php echo $row['com_description'];?></td>
  </tr>
  <tr>
    <td><input type="button" value="Close" onClick="window.close();"></td>
  </tr>
</table>
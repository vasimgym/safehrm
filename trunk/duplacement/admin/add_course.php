<?php
session_start();
include('../include/config.php');
include('../include/commonfunctions.php');

if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

if (!empty($_POST['edit'])) {
	$coursename  = trim($_POST['coursename']); 
	$pid  	= trim($_POST['pid']);
	
	$editid	= trim($_POST['editid']);
	
	$query	=  "update dup_coursetypes  set
					coursename = '$coursename', pid = '$pid' where id = '$editid'";
	$eres = mysql_query($query);
	if (!empty($eres))
		triggerMessage("admin_course", "Account edited successfully!");
		header("location:manage_course.php");
}


if (!empty($_POST['add'])) {
	$coursename  = trim($_POST['coursename']); 
	$pid  	= trim($_POST['pid']);
	
	if (!empty($coursename))
	{	
			$query	=  "INSERT INTO dup_coursetypes ( id, coursename, pid)							  
									VALUES 
									('','$coursename','$pid')";
			$res = mysql_query($query);
			if (!empty($res))
				triggerMessage("admin_course", "Created Course Successfully!");
				header("location:manage_course.php");
	
	} else { triggerMessage("admin_course", "Please Enter Course Description!");}
}

if ($_GET['act'] == "edit")
{
	$editid = $_GET['id'];
	$esql = mysql_query("select * from dup_coursetypes where id = '$editid' limit 1");
	$eresult = mysql_fetch_array($esql);
}
?>

<?php include("header.php");?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>

	
    <div align="left" class="adminright">
    
    <div style="width:600px; padding-top:5px;">
    
    <div style="width:600px; float:left;">
    <form name="frm" action="" method="post">
    <table width="330" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td align="left" valign="top"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td height="25" align="left" valign="top" nowrap="nowrap"><span class="blue"><strong> CREATE RENUMERATION </strong></span></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
  	</tr>
	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top"></td>
    <td width="20" height="25" align="left" valign="top"></td>
    <td width="170" height="25" align="left" valign="top"><?php outputTrigger('admin_create_ind'); ?></td>
    </tr>
  	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Description</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <input name="coursename" type="text" class="form" id="coursename" size="27"  value="<?php echo $eresult['coursename'];?>"/></td>
  	</tr>
  	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Type</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <select name="pid" class="form" id="status">
    <option value="1" <?php if ($eresult['pid'] == 1) { echo "selected"; } ?>>UG Course</option>
	<option value="2" <?php if ($eresult['pid'] == 2) { echo "selected"; } ?>>PG Course</option>
    </select></td>
  	</tr>
  	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="5" align="left" valign="top"></td>
    <td width="20" height="5" align="left" valign="top"></td>
    <td width="170" height="5" align="left" valign="top"></td>
  	</tr>
  	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="35" align="left" valign="top"></td>
    <td width="20" height="35" align="left" valign="top"></td>
    <td width="170" height="35" align="left" valign="top">
	<?php if (!empty($editid)) { ?>
		<input type="hidden" name="edit" value="1" />
		<input type="hidden" name="editid" value="<?php echo $editid; ?>" />
	<?php } else { ?>
		<input type="hidden" name="add" value="1" />
	<?php } ?>
    <input type="image" src="../images/du-btn-submit.jpg" name="submit" id="submit" value="Submit"  onclick="document.frm.submit();"/></td>
  	</tr>
	</table>
	</form>
	  </div>
		</div>
    	  </div>
    		</div>
           <?php include("footer.php");?>
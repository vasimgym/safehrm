<?php
session_start();
include('../include/config.php');
include('../include/commonfunctions.php');

if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

if (!empty($_POST['edit'])) {
	$functionname  		= trim($_POST['functionname']); 
	$functionstatus  	= trim($_POST['functionstatus']);
	
	$editid	= trim($_POST['editid']);
	
	$query	=  "update dup_functions  set
					functionname = '$functionname', functionstatus = '$functionstatus' where functionid = '$editid'";
	$eres = mysql_query($query);
	if (!empty($eres))
		triggerMessage("admin_create_ind", "Account edited successfully!");	
}


if (!empty($_POST['add'])) {
	$functionname  		= trim($_POST['functionname']); 
	$functionstatus  	= trim($_POST['functionstatus']);
	
	if (!empty($functionname))
	{	
		if ($cn = ChkExists("dup_functions", "functionname", $functionname, "admin_create_ind") == 0)
		{
			$query	=  "INSERT INTO dup_functions ( functionid, functionname, functionstatus)							  
									VALUES 
									('','$functionname','$functionstatus')";
			$res = mysql_query($query);
			if (!empty($res))
				triggerMessage("admin_create_ind", "Created function Successfully!");
		}
	} else { triggerMessage("admin_create_ind", "Please Enter function name!");}
}

if ($_GET['act'] == "edit")
{
	$editid = $_GET['id'];
	$esql = mysql_query("select * from dup_functions where functionid = '$editid' limit 1");
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
    <td height="25" align="left" valign="top" nowrap="nowrap"><span class="blue"><strong> CREATE FUNCTION </strong></span></td>
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
    <td width="110" height="25" align="left" valign="top">Name</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <input name="functionname" type="text" class="form" id="functionname" size="27"  value="<?php echo $eresult['functionname'];?>"/></td>
  	</tr>
  	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Status</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <select name="functionstatus" class="form" id="status">
    <option value="active" <?php if ($eresult['functionstatus'] == "active") { echo "selected"; } ?>>Active</option>
	<option value="inactive" <?php if ($eresult['functionstatus'] == "inactive") { echo "selected"; } ?>>Inactive</option>
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
<?php
session_start();
include('../include/config.php');
if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

// select records
$sql = "select * from dup_admin where user_class='admin'";
$res = mysql_query($sql);

if ($_GET['act'] == "delete") {
	$delid = $_GET['delid'];
	$delres = mysql_query("delete from dup_admin where user_id = '$delid'");
	header("location:admin_manage_admin.php");
}





include("header.php");
?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>


	<div align="left" class="adminright">

    <div style="width:600px; padding-top:5px;">

    <div style="width:600px; float:left;">
      
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td width="150" height="20" align="left" valign="middle"><span class="blue"><strong> MANAGE ADMIN</strong></span></td>
    <td width="175" height="20" align="left" valign="middle"></td>
    <td width="105" height="20" align="left" valign="middle"></td>
    <td width="60" height="20" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"></td>
    <td width="10" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"></td>
  	</tr>
  	<tr>
    <td width="30" height="15" align="left" valign="middle"></td>
    <td width="150" height="15" align="left" valign="middle"></td>
    <td width="175" height="15" align="left" valign="middle"></td>
    <td width="105" height="15" align="left" valign="middle"></td>
    <td width="60" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
    <td width="10" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
  	</tr>
  	<tr>
    <td width="30" align="left" valign="middle">
    <input type="checkbox" name="all_select" id="all_select" /></td>
    <td width="150" align="left" valign="middle"><strong>User name</strong></td>
    <td width="175" align="left" valign="middle"><strong>Email Id</strong></td>
    <td width="105" align="left" valign="middle"><strong>Mobile</strong></td>
    <td width="60" align="left" valign="middle"><strong>Status</strong></td>
    <td width="35" align="center" valign="middle"><strong>Edit</strong></td>
    <td width="10" align="center" valign="middle"><strong>|</strong></td>
    <td width="35" align="center" valign="middle"><strong>Del</strong></td>
  	</tr>
  	<tr>
    <td width="30" height="10" align="left" valign="middle"></td>
    <td width="150" height="10" align="left" valign="middle"></td>
    <td width="175" height="10" align="left" valign="middle"></td>
    <td width="105" height="10" align="left" valign="middle"></td>
    <td width="60" height="10" align="left" valign="middle"></td>
    <td width="35" height="10" align="center" valign="middle"></td>
    <td width="10" height="10" align="center" valign="middle"></td>
    <td width="35" height="10" align="center" valign="middle"></td>
  	</tr>
	
	<?php while($rs = mysql_fetch_array($res)) { 
		$user_id = $rs['user_id'];
	?>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="150" height="30" align="left" valign="middle"><?php echo $rs['user_name']?></td>
    <td width="175" height="30" align="left" valign="middle"><?php echo $rs['user_email']?></td>
    <td width="105" height="30" align="left" valign="middle"><?php echo $rs['user_mobile']?></td>
    <td width="60" height="30" align="left" valign="middle"><?php echo $rs['user_status']?></td>
    <td width="35" height="30" align="center" valign="middle"><a href="admin_create_admin.php?id=<?php echo $user_id; ?>&act=edit"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="admin_manage_admin.php?delid=<?php echo $user_id; ?>&act=delete"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16"  border=0/></a></td>
  	</tr>
	<?php } ?>
  	
	</table>
	  </div>
		</div>
    	  </div>
    		</div>
           <?php include("footer.php");?>
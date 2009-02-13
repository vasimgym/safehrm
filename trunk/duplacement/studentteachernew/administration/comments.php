<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");
if (!empty($_GET['editid'])) {
	$editid		= trim($_GET['editid']);
	$butt_name	= "editcomment";
	$value		= "Edit";
	
	$sel	= mysql_query("SELECT com_id, com_title, com_description, categoryid, subcategoryid FROM teacher_comments WHERE com_id='$editid'");
	$row	= mysql_fetch_array($sel);
} else {
	$butt_name	= "addcomment";
	$value		= "Add";
}


if (!empty($_POST['addcomment'])) {
	if (count($_POST['subcatid'])!=0) {
 		$subcategoryid	= implode($_POST['subcatid'],",");
	}
	
	$categoryid			= trim($_POST['categoryid']);
	$com_title			= trim($_POST['com_title']);
	$com_description	= trim($_POST['com_description']);
	
		$query = "INSERT INTO teacher_comments (com_id, com_title, com_description, com_status, 
				com_date, com_update, categoryid, subcategoryid)
				VALUES (NULL , '$com_title', '$com_description', '', NOW(), '', '$categoryid', '$subcategoryid'
				)";
		$execute	= mysql_query($query);
		header("location:commentsview.php");
}

if (!empty($_POST['editcomment'])) {

	if (count($_POST['subcatid'])!=0) {
 		$subcategoryid	= implode($_POST['subcatid'],",");
	}
	
	$categoryid			= trim($_POST['categoryid']);
	$com_title			= trim($_POST['com_title']);
	$com_description	= trim($_POST['com_description']);
	$id					= trim($_POST['id']);
	
	$query = "UPDATE teacher_comments SET
				com_title = '$com_title',
				com_description = '$com_description',
				categoryid = '$categoryid',
				subcategoryid = '$subcategoryid',
				com_update = NOW()
				WHERE com_id='$id'
				";
		$execute	= mysql_query($query);
		header("location:commentsview.php");
}

$sql = "SELECT * FROM student_category WHERE parent_node=0";
$res = mysql_query($sql);

 $subcat = array();
  if (!empty($row['subcategoryid'])) {
   $subcat = explode(",",$row['subcategoryid']);
  }
include("header.php");
?>
<script language="javascript" type="text/javascript" src="../js/functions.js"></script>
  <tr>
	<td width="100%" height="480" valign="top">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="1%"><img border="0" src="../images/lo1.gif" width="16" height="14"></td>
		<td width="98%" background="../images/lo3.gif"><img border="0" src="../images/lo3.gif" width="16" height="14"></td>
		<td width="1%"><img border="0" src="../images/lo4.gif" width="16" height="14"></td>
	  </tr>              <tr>
		<td width="1%" background="../images/lo2.gif"><img border="0" src="../images/lo2.gif" width="16" height="14"></td>
		<td width="98%" bgcolor="#FAFAFA" >
		  <table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="20%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" background="../images/admin_back.gif" class="border-gray">
					  <table border="0" width="100%" cellspacing="5" cellpadding="0" height="250">
						<tr>
						  <td width="100%" valign="top" class="admin-gray">
						<?php include("left.php");?>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
				</table></td>
			  <td width="2%" valign="top"></td>
			  <td width="78%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" class="border-gray">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="100%">
							<table border="0" width="100%" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="100%" valign="top" height="250">
								  <form id="form1" name="form1" method="post" action="" onsubmit="return funComments();" >									    											<table width="100%" border="0" cellspacing="3" cellpadding="7">
										
										<tr>
										    <td colspan="2" align="center" class="orange"><strong>Add New Title-Description </strong></td>
								      </tr>
										 <?php if(!empty($err)) {?>
										  
										  <tr>
										    <td colspan="2" class="orange" align="center"><?php echo $err;?></td>
								      </tr>
									  <?php }?>
										  <tr>
										    <td class="gray-login">Title<span class="orange">*</span></td>
										    <td class="blue"><input name="com_title" type="text" size="30" 
											value="<?php echo $row['com_title']?>" /></td>
								      </tr>
										  <tr>
										    <td valign="top" class="gray-login">Category</td>
										    <td>
											<select name="categoryid" 
											onblur="return showForm('../subcategory.php', this.value,'<?php echo $row['subcategoryid'];?>','b');" 
											onchange="return showForm('../subcategory.php', this.value,'<?php echo $row['subcategoryid'];?>','b');" 
											onfocus="return showForm('../subcategory.php', this.value,'<?php echo $row['subcategoryid'];?>','b');"
											  >
												<?php while ($rscat = mysql_fetch_array($res)) {?>
												<option value="<?php echo $rscat['id'];?>"
												<?php if ($rscat['id'] == $row['categoryid']) {?> selected="selected"<?php }?>>
												<?php echo $rscat['categoryname'];?></option>
												<?php }?>
										    </select>										    </td>
								      </tr>
										  
										  <tr>
										    <td colspan="2" valign="top"><span id="cpanel"></span></td>
								      </tr>
									  <?php
									  if (!empty($_GET['editid'])) {
									  $q = $row['categoryid'];
									 
									  
									  
									  echo '<tr id="hidetr"><td valign="top" class="gray-login">Subcategory</td><td>';
$subquery = mysql_query("SELECT * FROM student_category WHERE parent_node=$q");
while ($subrs = mysql_fetch_array($subquery)) {
	if(in_array($subrs["id"],$subcat)) {
		echo '<input type="checkbox" name="subcatid[]"  value="'.$subrs["id"].'" checked="checked" />&nbsp;'.$subrs["categoryname"].'<br>';
	} else {
		echo '<input type="checkbox" name="subcatid[]"  value="'.$subrs["id"].'" />&nbsp;'.$subrs["categoryname"].'<br>';
	}
}
echo '</td>
								      </tr>';
}
									  ?>
										  <tr>
										    <td valign="top" class="gray-login">Description<span class="orange">*</span></td>
								            <td>
								              <textarea name="com_description" cols="50" 
											  rows="10"><?php echo $row['com_description']?></textarea>								            </td>
									  </tr>
										  <tr>
										    <td class="orange"><input type="hidden" name="id" value="<?php echo $editid;?>" /></td>
								            <td class="orange"><input name="<?php echo $butt_name;?>" type="submit"  value="<?php echo $value;?>" /></td>
									  </tr>
										  
										  <tr>
										    <td class="orange">&nbsp;</td>
										    <td class="orange">&nbsp;</td>
								      </tr>
										  <tr>
										    <td class="orange">&nbsp;</td>
								            <td class="orange">&nbsp;</td>
									  </tr>
										</table>												
								  </form>
							    </td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td width="100%" background="../images/admin_back_gray.gif" height="19">&nbsp;</td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top"></td>
				  </tr>
				</table></td>
			</tr>
			<tr>
			  <td width="20%" valign="top" class="search">&nbsp;
				
			  </td>
			  <td width="2%" valign="top" class="search"></td>
			  <td width="78%" valign="top" class="search"></td>
			</tr>
		  </table>
		</td>
		<td width="1%" valign="top" background="../images/lo5.gif"><img border="0" src="../images/lo5.gif" width="16" height="14"></td>
	  </tr>
	<tr>
		<td width="1%"><img border="0" src="../images/lo8.gif" width="16" height="37"></td>
		<td width="98%" background="../images/lo7.gif"><img border="0" src="../images/lo7.gif" width="16" height="37"></td>
		<td width="1%"><img border="0" src="../images/lo6.gif" width="16" height="37"></td>
	  </tr>
	</table>
	</td>
  </tr>
</table>

</td>
</tr>
</table>
</div>
</body>
</html>

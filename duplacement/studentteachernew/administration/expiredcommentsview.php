<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");
$query_cat = mysql_query("SELECT * FROM student_category WHERE parent_node=0");
if (!empty($_GET['delid'])) {
	$delid	= $_GET['delid'];
	mysql_query("DELETE FROM teacher_comments WHERE com_id='$delid'");
}

$limit = 2;
	require_once("../include/class.pager.php");
	$p = new Pager ;
	$start = $p->findStart($limit);
	if (!empty($_GET['filter'])) {
		$searchfor	= trim($_GET['filter']);
		if (!empty($searchfor)) {
			$extrasql 	= " WHERE com_title LIKE '%$searchfor%' OR com_description LIKE '%$searchfor%' AND com_status='EXPIRED'";
		}
	}elseif	(!empty($_GET['category'])) {
		$category = $_GET["category"];
		$subcategory = $_GET["subcategory"];
		if (!empty($subcategory)) {
		$extrasql 	= " WHERE categoryid =$category AND subcategoryid REGEXP($subcategory) AND com_status='EXPIRED'";
		} else {
			$extrasql 	= " WHERE categoryid ='$category' AND com_status='EXPIRED'";
		}
	} else {
		$extrasql 	= " WHERE  com_status='EXPIRED'";
	}
	$count = mysql_num_rows(mysql_query("SELECT * FROM teacher_comments ".$extrasql)); 
	
	/* Find the number of pages based on $count and $limit */ 
	$pages = $p->findPages($count, $limit); 
	
	$pagelist = $p->pageList($_GET['page'], $pages);
	 
	

$sql	=	"SELECT com_id, com_title, com_description, com_status, com_date, com_update FROM teacher_comments ";
$sql	= $sql. $extrasql;
$sql .= " LIMIT ".$start.", ".$limit;
$res = mysql_query($sql);

include("header.php");
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

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
								<td width="100%" valign="top" >
								<script src="../js/functions.js"></script>
								  <form id="form1" name="form1" method="get" action="" >									    											<table width="100%" border="0" cellspacing="1" cellpadding="5">
										 <!-- <tr bgcolor="#CCCCCC">
										    <td colspan="2" align="left" class="orange">
											<input type="text" size="30"  name="filter" />
											<input type="submit" name="search" value="Search" />											</td>
										    <td width="17%" align="center" class="orange"><a href="comments.php">Add New</a></td>
									  </tr> -->
										  <tr>
										    <td colspan="4" align="left" style="background-color:#DADADA"><!--<table width="70%" border="0" align="center" >
                                              <tr>
                                                <td>Sort by</td>
                                                <td class="blue1">Category</td>
                                                <td><select class="blue1" name="category" onchange="return showForm('filtersubcategory.php', this.value,'0','a');" onblur="return showForm('filtersubcategory.php', this.value,'0','a');" >
                                                    <?php //while ($catrs = mysql_fetch_array($query_cat)) {?>
                                                    <option value="<?php //echo $catrs['id'];?>"><?php echo $catrs['categoryname'];?></option>
                                                    <?php //}?>
                                                </select></td>
                                                <td >&nbsp;</td>
                                                <td class="blue1"><span id="cpanel"></span> </td>
                                                <td><input type="submit" value="Go" name="sortbycategory" /></td>
                                              </tr>
                                            </table> --></td>
								      </tr>
										  <tr>
										    <td width="23%" align="left" class="orange">Title</td>
								            <td width="47%" align="left" class="orange">Description</td>
											 <td width="13%" align="left" class="orange">Status</td>
											 <td width="17%" align="center" class="orange">Action</td>
									  	</tr>
										<?php $i=0;
										while($rs = mysql_fetch_array($res)) {
										 if ($i%2) {
										 	$bgcolor	= "#f1f1f1";
										 } else {
										 	$bgcolor	= "#e1e1e1";
										 }
										?>									 
										  <tr bgcolor="<?php echo $bgcolor;?>">
										    <td class="left-none"  valign="top"><?php echo $rs['com_title'];?></td>
										    <td class="left-none" ><?php echo $rs['com_description'];?></td>
											<td class="left-none" valign="top">
											<font color="#FF0000"><?php echo $rs['com_status'];?></font>
											</td>
											<td class="left-none" valign="top" align="center">
												<!--<a href="comments.php?editid=<?php //echo $rs['com_id'];?>">Edit</a> -->
												<a href="commentsview.php?delid=<?php echo $rs['com_id'];?>">Delete</a>											</td>
								      	</tr>
										<?php $i++;}?>
										  <?php if ($count == 0) {?>
										  <tr>
										    <td colspan="4" class="blue" align="center">No Records</td>
						              	  </tr>
									  	<?php }?>
										</table>												
								  </form>
								  </td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="blue">Page Listing:&nbsp;<?php echo $pagelist;?></td>
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

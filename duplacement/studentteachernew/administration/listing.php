<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}

include("../include/config.php");
include("../include/function.php");

$limit = 5;
require_once("../include/class.pager.php");
$catid = $_GET['catid'];
$sub_catid = $_GET['sub_catid'];
$p = new Pager ;
$start = $p->findStart($limit);
$searchfor	= trim($_POST['searchtitle']);
if (!empty($searchfor)) {
	$extrasql 	= " WHERE (com_title LIKE '%$searchfor%' OR com_description LIKE '%$searchfor%') AND com_status!='EXPIRED'";
} elseif (!empty($catid)) {
	$extrasql 	= " WHERE categoryid=$catid AND com_status!='EXPIRED'";
} elseif (!empty($sub_catid)) {
	$extrasql 	= " WHERE  subcategoryid REGEXP ($sub_catid) AND  com_status!='EXPIRED'";
} else {
	$extrasql 	= " WHERE  com_status!='EXPIRED'";
}

$count = mysql_num_rows(mysql_query("SELECT * FROM teacher_comments " .$extrasql)); 

/* Find the number of pages based on $count and $limit */ 
$pages = $p->findPages($count, $limit); 

$pagelist = $p->pageList($_GET['page'], $pages);
 


$sql	=	"SELECT * FROM teacher_comments";
$sql	=	$sql. $extrasql;

$sql .= " LIMIT ".$start.", ".$limit;
$res = mysql_query($sql);
$recordsnum = mysql_num_rows($res);

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
								<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
								<?php $i = 0;
													  while($rs = mysql_fetch_array($res)) {
													  	if ($i%2) {
															$bgcolor ="#e1e1e1";
														} else {
															$bgcolor ="#f1f1f1";
														}
													  ?>
												  <tr bgcolor="<?php echo $bgcolor;?>">                                                        
                                                        <td width="3%" class="search" valign="top">&nbsp;&raquo;</td>
                                                        <td width="97%" class="search"><a href="comments.php?editid=<?php echo $rs['com_id'];?>&amp;subcatid=<?php echo $sub_catid;?>" class="style1"><?php echo $rs['com_title'];?></a>
														<p><?php echo substr($rs['com_description'],0,100);?>........</p>
														</td>
												  </tr>
													  <?php $i++;}?>

			<?php if ($recordsnum == 0) { ?>

			 <tr><td colspan="2" align="center" class="blue">No Record Found</td></tr>
				
			<?php } else { ?>

													  <tr><td colspan="2" align="center" class="blue">Page Listing:&nbsp;<?php echo $pagelist;?></td></tr>
													  <?php } ?>
                                                    </table>
</td>
							  </tr>
							</table>
						  </td>
						</tr>
		<!--				<tr>
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="blue">Page Listing:&nbsp;<?php //echo $pagelist;?></td>
						</tr> -->
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

<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");

if (!empty($_GET['s_id'])) {
	$s_id	= $_GET['s_id'];
	if ($_GET['status'] == 'Enable') {
		$status	='Disable';
	} else {
		$status	='Enable';
	}
	$query = "UPDATE teacher_mailbody SET
				mail_status = '$status'
				WHERE mailid='$s_id'
				";
	mysql_query($query);
}
/*
$limit = 2;
	require_once("../include/class.pager.php");
	$p = new Pager ;
	$start = $p->findStart($limit);
	$searchfor	= trim($_POST['searchtitle']);
	if (!empty($searchfor)) {
		$extrasql 	= " WHERE com_title LIKE '%$searchfor%' OR com_description LIKE '%$searchfor%'";
	}
	$count = mysql_num_rows(mysql_query("SELECT * FROM teacher_comments ".$extrasql)); */
	
	/* Find the number of pages based on $count and $limit */ 
/*	$pages = $p->findPages($count, $limit); 
	
	$pagelist = $p->pageList($_GET['page'], $pages);*/
	 
	

$sql	=	"SELECT mailid, mail_sendto, mail_txt, mail_status FROM teacher_mailbody";
/*$sql	= $sql. $extrasql;
$sql .= " LIMIT ".$start.", ".$limit;*/
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
								  <form id="form1" name="form1" method="post" action="" >									    											<table width="100%" border="0" cellspacing="1" cellpadding="5">
										  <tr>
										    <td width="23%" height="28" align="left" class="orange">Send Mail To </td>
								            <td width="64%" align="left" class="orange">Message </td>
											 <td colspan="2" align="center" class="orange">Action</td>
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
										    <td class="left-none"  valign="top"><?php echo $rs['mail_sendto'];?></td>
										    <td class="left-none" ><?php echo $rs['mail_txt'];?></td>
											<td width="5%" align="center" valign="top" class="left-none">
												<a href="mailtemplates.php?editid=<?php echo $rs['mailid'];?>">Edit</a></td>
								      	    <td width="8%" align="center" valign="top" class="left-none"><a href="mailtemplatesview.php?s_id=<?php echo $rs['mailid'];?>&amp;status=<?php echo $rs['mail_status'];?>"><?php echo $rs['mail_status'];?></a></td>
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
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="blue"><!--Page Listing:&nbsp; --><?php //echo $pagelist;?></td>
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

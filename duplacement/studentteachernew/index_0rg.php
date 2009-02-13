<?php //header("location:studentinfo.php"); ?>

<?php include("header.php");
$limit = 5;
	require_once("include/class.pager.php");
	$p = new Pager ;
	$start = $p->findStart($limit);
	$searchfor	= trim($_POST['searchtitle']);
	if (!empty($searchfor)) {
		$extrasql 	= " WHERE com_title LIKE '%$searchfor%' OR com_description LIKE '%$searchfor%'";
	}
	$count = mysql_num_rows(mysql_query("SELECT * FROM teacher_comments " .$extrasql)); 
	
	/* Find the number of pages based on $count and $limit */ 
	$pages = $p->findPages($count, $limit); 
	
	$pagelist = $p->pageList($_GET['page'], $pages);
	 
	

$sql	=	"SELECT com_id, com_title, com_description, com_status, com_date, com_update FROM teacher_comments";
$sql	=	$sql. $extrasql;

$sql .= " LIMIT ".$start.", ".$limit;
$res = mysql_query($sql);
$recordsnum = mysql_num_rows($res);

?>
<style type="text/css">
<!--
.style1 {font-family: Geneva, Arial, Helvetica, sans-serif;
font-size:10px;
text-decoration:none;
}
.style1:hover {font-family: Geneva, Arial, Helvetica, sans-serif;
font-size:10px;
text-decoration:underline;
color:#2F75CA;
}
-->
</style>

																    											<link href="css/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td>
													<form action="" name="formsearch" method="post" >
													<table width="100%" border="0" cellspacing="1" cellpadding="10">
                                                      <tr bgcolor="#CCCCCC">                                                        
                                                        <td colspan="2" align="right" class="orange">
															<input type="text" size="30" name="searchtitle" />														
															<input type="submit" name="search" value="Search" />														</td>
                                                      </tr>
													  
													  <?php $i = 0;
													  while($rs = mysql_fetch_array($res)) {
													  	if ($i%2) {
															$bgcolor ="#e1e1e1";
														} else {
															$bgcolor ="#f1f1f1";
														}
													  ?>
												  <tr bgcolor="<?php echo $bgcolor;?>">                                                        
                                                        <td width="3%" class="search">&nbsp;&raquo;</td>
                                                        <td width="97%" class="search"><a href="studentinfo.php?comid=<?php echo $rs['com_id'];?>" class="style1"><?php echo $rs['com_title'];?></a></td>
												  </tr>
													  <?php $i++;}?>

			<?php if ($recordsnum == 0) { ?>

			 <tr><td colspan="2" align="center" class="blue">No Record Found</td></tr>
				
			<?php } else { ?>

													  <tr><td colspan="2" align="center" class="blue">Page Listing:&nbsp;<?php echo $pagelist;?></td></tr>
													  <?php } ?>
                                                    </table>
													</form>
													</td>
                                                  </tr>
												 <tr>
                                                    <td>
													
												</td></tr></table>												
                              
							<?php include("footer.php");?>
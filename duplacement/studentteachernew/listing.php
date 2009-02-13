<?php include("header.php");
$limit = 2;
require_once("include/class.pager.php");
$catid = $_GET['catid'];
$sub_catid = $_GET['sub_catid'];
$p = new Pager ;
$start = $p->findStart($limit);
$searchfor	= trim($_GET['searchtitle']);
if (!empty($searchfor)) {
	$extrasql 	= " WHERE ( com_title LIKE '%$searchfor%' OR com_description LIKE '%$searchfor%') AND com_status!='EXPIRED'";
} elseif (!empty($catid)) {
	$extrasql 	= " WHERE categoryid=$catid AND com_status!='EXPIRED'";
} elseif (!empty($sub_catid)) {
	$extrasql 	= " WHERE  subcategoryid REGEXP ($sub_catid) AND com_status!='EXPIRED'";
} else {
	$extrasql 	= " WHERE com_status!='EXPIRED'";
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
ul{
text-align:left;
color:#990000;

}
li{
color:#006666;
}
-->
</style>

																    											<link href="css/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td>
													<form action="" name="formsearch" method="get" >
													<table width="100%" border="0" cellspacing="1" cellpadding="10">
                                                      <tr bgcolor="#CCCCCC">                                                        
                                                        <td colspan="3" align="right" class="orange">
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
                                                        <td width="3%" class="search" valign="top">&nbsp;&raquo;</td>
                                                        <td width="61%" class="search"><a href="showassignments.php?comid=<?php echo $rs['com_id'];?>&amp;subcatid=<?php echo $sub_catid;?>" class="style1"><?php echo $rs['com_title'];?></a>
														<p><?php echo substr($rs['com_description'],0,100);?>.........</p>
														</td>
												        <td width="36%" class="search" align="left">
														<?php $categoryid = $rs['categoryid'];
														
														$cat_sql = mysql_query("SELECT * FROM student_category
														 WHERE id='$categoryid'");
														$cat_rs = mysql_fetch_array($cat_sql);
														echo "<ul>".$cat_rs['categoryname'];
														?>
														
														<?php $sub_arr = array();
														 $subcategoryid = $rs['subcategoryid'];
														 $sub_arr = explode(",",$subcategoryid);
														 for ($j = 0; $j < count($sub_arr); $j++) {
														 	$id = $sub_arr[$j];
														  $sql_subcat = mysql_query("SELECT * FROM student_category
														 WHERE id='$id' AND parent_node!=0");
														 $subcat_rs = mysql_fetch_array($sql_subcat);
														 echo "<li>".$subcat_rs['categoryname']."</li>";
														 }
														 echo "</ul>";
														 ?></td>
											          </tr>
													  <?php $i++;}?>

			<?php if ($recordsnum == 0) { ?>

			 <tr><td colspan="3" align="center" class="blue">No Record Found</td></tr>
				
			<?php } else { ?>

													  <tr><td colspan="3" align="center" class="blue">Page Listing:&nbsp;<?php echo $pagelist;?></td></tr>
													  <?php } ?>
                                                    </table>
													</form>
													</td>
                                                  </tr>
												 <tr>
                                                    <td>
													
												</td></tr></table>												
                              
							<?php include("footer.php");?>
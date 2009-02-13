<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");

/********************* PAGING  ***********************/
	$limit = 2;
	require_once("../include/class.pager.php");
	$p = new Pager ;
	$start = $p->findStart($limit);

	/* Find the number of rows returned from a query; Note: Do NOT use a LIMIT clause in this query */
	if(!empty($_GET["filter"])) {
	$filterval = $_GET["filter"];
	$extrasql = " WHERE s_status='$filterval'";
	} 
	//$count = mysql_num_rows(mysql_query("SELECT * FROM student_information ".$extrasql)); 
	
	/* Find the number of pages based on $count and $limit */ 
	//$pages = $p->findPages($count, $limit); 
	
	//$pagelist = $p->pageList($_GET['page'], $pages);
	 
	##################### end aging ################## */
	if ($_GET['search_id'] == 'y') {
		$_SESSION['search_sql'] = '';		
	}
if ($_POST["search"]=="Search" && (!empty($_POST['s_firstname']) || !empty($_POST['s_lastname']) || !empty($_POST['s_email']) || !empty($_POST['s_category']) || !empty($_POST['s_city']) || !empty($_POST['s_state']) || !empty($_POST['s_subject']) || !empty($_POST['s_status']))) {
$_SESSION['search_sql'] = "
	SELECT 		*
		FROM 	student_information 
		WHERE	1=1 
	";
	}  elseif ($_POST["search"]=="Search" && $_SESSION['search_sql'] == '') {
		$errmsg = ' <tr>
					  <td colspan="2"><span class="orange">Search Result </span></td>
					</tr>	
					<tr>
						<td colspan="2" align="center"><font color="#FF0000"><b>No Record Found</b></font></td>
					</tr>';		
	} elseif ($_POST["search"]=="Search" && !empty($_SESSION['search_sql'])) {
		$_SESSION['search_sql'] = '';
		$errmsg = ' <tr>
					  <td colspan="2"><span class="orange">Search Result </span></td>
					</tr>	
					<tr>
						<td colspan="2" align="center"><font color="#FF0000"><b>No Record Found</b></font></td>
					</tr>';		
	}
	
	
if($_POST["search"]=="Search" && !empty($_SESSION['search_sql'])) {
	$search_type 		= trim(stripslashes($_POST["search_type"]));	
	$s_firstname 		= trim(stripslashes($_POST["s_firstname"]));
	
	if(!empty($s_firstname)) {
		if($search_type==2) {
		$_SESSION['search_sql'] .= " AND s_firstname='$s_firstname'";
		} else {
		$_SESSION['search_sql'] .= " AND s_firstname LIKE '%$s_firstname%'";
		}		
	}
	
	
	$s_lastname 		= trim(stripslashes($_POST["s_lastname"]));
	if(!empty($s_lastname) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
		$_SESSION['search_sql'] .= " AND s_lastname='$s_lastname'";
		} else {
		$_SESSION['search_sql'] .= " AND s_lastname LIKE '%$s_lastname%'";
		}		
	}
	
	$s_email 			= trim(stripslashes($_POST["s_email"]));
	if(!empty($s_email) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
		$_SESSION['search_sql'] .= " AND s_email='$s_email'";
		} else {
		$_SESSION['search_sql'] .= " AND s_email LIKE '%$s_email%'";
		}
	}
	
	$s_category 		= trim(stripslashes($_POST["s_category"]));
	if (!empty($s_category) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
			$_SESSION['search_sql'] .= " AND s_category='$s_category'";
		} else {
			$_SESSION['search_sql'] .= " OR s_category='$s_category'";
		}		
	}
	
	if (!empty($_POST["subcatid"])) {
		$s_subcategory 		= implode($_POST["subcatid"]);
	}
	if (!empty($s_subcategory) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
			$_SESSION['search_sql'] .= " AND s_subcategory REGEXP($s_subcategory)";
		} else {
			$_SESSION['search_sql'] .= " OR s_subcategory REGEXP ($s_subcategory)";
		}		
	}
	
	$s_city 			= trim(stripslashes($_POST["s_city"]));
	if (!empty($s_city) && !empty($_SESSION['search_sql'])) {
		if(!empty($s_city)) {
			if($search_type==2) {
			$_SESSION['search_sql'] .= " AND s_city='$s_city'";
			} else {
			$_SESSION['search_sql'] .= " AND s_city LIKE '%$s_city%'";
			}			
		}
	}
	
	$s_state 			= trim(stripslashes($_POST["s_state"]));
	if (!empty($s_state) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
			$_SESSION['search_sql'] .= " AND s_state='$s_state'";
		} else {
			$_SESSION['search_sql'] .= " OR s_state='$s_state'";
		}
		$_SESSION['search_sql'] .= $search_sql;
	}
	$s_subject 			= trim(stripslashes($_POST["s_subject"]));
	if(!empty($s_subject) && !empty($_SESSION['search_sql'])) {
		$_SESSION['search_sql'] .= " AND s_subject='$s_subject'";
		
	}
	
	$s_status 			= trim(stripslashes($_POST["s_status"]));
	if (!empty($s_status) && !empty($_SESSION['search_sql'])) {
		if($search_type==2) {
			$_SESSION['search_sql'] .= " AND s_status='$s_status'";
		} else {
			$search_sql .= " OR s_status='$s_status'";
		}
		$_SESSION['search_sql'] .= $search_sql;
	}	
}

if (!empty($_SESSION['search_sql'])) {
	$count = mysql_num_rows(mysql_query($_SESSION['search_sql']));
}
	
/* Find the number of pages based on $count and $limit */ 
if (!empty($_SESSION['search_sql'])) {
	$pages = $p->findPages($count, $limit); 
	$pagelist = $p->pageList($_GET['page'], $pages);		
	$search_sql .= " LIMIT ".$start.", ".$limit;	
	$search_res = mysql_query($_SESSION['search_sql'].$search_sql); 
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
								  <form id="form1" name="form1" method="post" action="search.php" >									    											<table width="100%" border="0" cellspacing="0" cellpadding="3">
										  
										  <tr>
											<td colspan="2" class="orange">SEARCH </td>
										  </tr>
										 
										  <tr>
											<td class="gray-login">&nbsp;</td>
											<td class="orange"><?php echo $msg;?></td>
										  </tr>
										
										  <tr>
											<td class="gray-login">First Name</td>
											<td>
											<input name="s_firstname" type="text" id="s_firstname" size="30" 
											value="<?php echo $_POST["s_firstname"];?>" /></td>
										  </tr>
										  
										  <tr>
											<td class="gray-login">Last Name </td>
											<td>
											<input name="s_lastname" type="text" id="s_lastname" size="30" 
											value="<?php echo $_POST["s_lastname"];?>" /></td>
										  </tr>
										  
										  <tr>
											<td class="gray-login">EmailId</td>
											<td>
											<input name="s_email" type="text" id="s_email" size="30" 
											value="<?php echo $_POST["s_email"];?>" /></td>
										  </tr>
										  
										  <tr>
											<td class="gray-login">Category</td>
											<td>
											<select name="s_category" 
											onblur="return showForm('../subcategory.php', this.value, '0','c');" 
											onchange="return showForm('../subcategory.php', this.value, '0','c');"
											 onfocus="return showForm('../subcategory.php', this.value, '0','c');">
											  <option value="">Select category</option>
											  <?php get_category($_POST["s_category"])?>
										    </select>											</td>
										  </tr>
										  
										  <tr>
										    <td colspan="2" ><span id="cpanel"></span></td>
								      </tr>
										  <tr>
											<td class="gray-login">City</td>
											<td>
											<input name="s_city" type="text" id="s_city" size="30" 
											value="<?php echo $_POST["s_city"];?>" />											</td>
											</tr>
										  
										  <tr>
											<td class="gray-login">State</td>
											<td>
											<select name="s_state">
											  <option value="">Select state</option>
											  <?php get_states($_POST["s_state"])?>
											</select>											</td>
										  </tr>
										  
										  <tr>
											<td class="gray-login">Subject</td>
											<td>
											<select name="s_subject">
											  <option value="">Select subject</option>
											  <?php get_subject($_POST["s_subject"])?>
											</select>											</td>
										  </tr>
										  
										  <tr>
											<td class="gray-login">Status</td>
											<td>
											 <select name="s_status">
											 	<option value="">Select status</option>
                                                <?php get_status($_POST["s_status"]);?>
                                             </select>											</td>
										  </tr>
										  <tr>
										    <td><span class="gray-login">Search Type </span></td>
										    <td>
											<input name="search_type" type="radio" value="1" checked="checked" />
											Similar
											<input name="search_type" type="radio" value="2" />
											Accurate											</td>
								      </tr>
										  <tr>
											<td>&nbsp;</td>
											<td><input type="submit" name="search" value="Search" />											</td>
										  </tr>
										  <tr>
										    <td>&nbsp;</td>
										    <td>&nbsp;</td>
								      </tr>
									  <?php if (!empty($_SESSION['search_sql'])) { ?>
										  <tr>
										    <td colspan="2"><span class="orange">Search Result </span></td>
								      </tr>
									  <?php if ($count!=0) {?>
										  <tr>
										    <td colspan="2"><table width="100%" border="0">
                                              <tr bgcolor="#EBEBEB" class="blue">
                                                <td>Email</td>
                                                <td>Name</td>
                                                <td>Status</td>
                                                <td>Assignment</td>
                                                <td>Comments</td>
                                                <td align="center">Posted Date </td>
                                                <td align="center">Action</td>
                                              </tr>
                                              <?php
												$i=0;
												while($row=mysql_fetch_array($search_res))
												{
													$i++;
													$i%2==0 ? $bgcolor="#F4F4F4" : $bgcolor="#FFFFFF";
													
													//Color According to status
													$stquery = mysql_query ("SELECT status_color FROM student_status WHERE status_name='".$row['s_status']."'");
													$status_row = mysql_fetch_array($stquery);
												?>
                                              <tr bgcolor="<?php echo $bgcolor;?>" class="MS12_blk">
                                                <td><a href="mailto:<?php echo $row['s_email'];?>" class="blue1"> <font color="<?php echo $status_row['status_color'];?>"> <?php echo $row['s_email'];?></font> </a> </td>
                                                <td class="blue1"><font color="<?php echo $status_row['status_color'];?>"> <?php echo $row['s_firstname'];?></font> </td>
                                                <td class="blue1"><font color="<?php echo $status_row['status_color'];?>"> <?php echo $row['s_status'];?> </font> </td>
                                                <td>
												<a href="../download.php?file=<?php echo $row['s_filepath'];?>" class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">Download</font>												</a>												</td>
                                                <td class="blue1"><font color="<?php echo $status_row['status_color'];?>">
                                                    <?php 
												 if(!empty($row['s_teacher_commets'])) {
												 	echo substr($row['s_teacher_commets'],0,15).'...';
												 } else {
												 	echo 'No Comments';
												 }
												 ?>                                                </td>
                                                <td class="blue1"><font color="<?php echo $status_row['status_color'];?>"> <?php echo $row['s_posted_date'];?></font> </td>
                                                <td align="center">
												<table cellspacing="1" cellpadding="2" border="0" width="100%" align="center">
												<tr>
												 <td align="center">
												<a href="view_assignment.php?viewid=<?php echo $row['s_id']?>" class="blue1"> <font color="<?php echo $status_row['status_color'];?>">View/Change Status</font> </a>												</td></tr>
												<tr><td align="center">
												<a href="manage_assignments.php?delid=<?php echo $row['s_id']?>&amp;action=delete"  												class="blue1" onclick="return confirm('Are you sure to delete this Category?');">
												<font color="<?php echo $status_row['status_color'];?>">Delete</font></a>
												</td></tr>
												<tr><td align="center">
												<a href="#" class="blue1" 
												onclick="popitup('sendmail.php?id=<?php echo $row['s_id']?>')">
												<font color="<?php echo $status_row['status_color'];?>">Send mail</font></a>
												</td></tr>
												</table>												</td>
                                              </tr>
                                              <?php
												}
											  ?>
                                            </table></td>
								      </tr>   
									  <?php } else {?>
									  <tr>
									  	<td colspan="2" align="center"><font color="#FF0000"><b>No Record Found</b></font></td>
									  </tr>
									  <?php }} if(empty($_SESSION['search_sql'])) { ?>
									  <?php echo $errmsg;}?>	  
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
						<?php if ($count!=0) {?>
						<tr>
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="left-heading">Page Listing:&nbsp;<?php echo $pagelist;?></td>
						</tr>
						<?php }?>
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

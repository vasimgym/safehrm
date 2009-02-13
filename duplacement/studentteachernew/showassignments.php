<?php 
include("header.php");
if (!empty($_GET['comid'])) {
	$subcatid 	= $_GET['subcatid'];
	$comid 		= $_GET['comid'];
} 

$sql	=	"SELECT * FROM teacher_comments WHERE com_id='$comid'";
$res = mysql_query($sql);
$rs	= mysql_fetch_array($res);

?>
<script language="javascript" type="text/javascript" src="js/functions.js"></script>
<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
  <tr>
	<td>
	
	<?php if(!empty($comid)) {?>
	<table width="100%" border="0" cellspacing="1" cellpadding="5">
	  
	  
	  <tr bgcolor="#CCCCCC">                                                        
		<td class="blue">Title</td>
		<td class="left-none"><?php echo $rs['com_title'];?></td>
	  </tr>
	  <tr bgcolor="#CCCCCC">
	    <td class="blue">Category</td>
	    <td class="left-none">
		<?php $categoryid = $rs['categoryid'];
		
		$cat_sql = mysql_query("SELECT * FROM student_category
		 WHERE id='$categoryid'");
		$cat_rs = mysql_fetch_array($cat_sql);
		echo "<span>".$cat_rs['categoryname']."</span>";
		?>
		</td>
	    </tr>
	  <tr bgcolor="#CCCCCC">
	    <td class="blue">Subcategory</td>
	    <td class="left-none">
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
	 ?>
		</td>
	    </tr>
	  <tr bgcolor="#CCCCCC">                                                        
		<td width="19%" class="blue">Description</td>
		<td width="81%" class="left-none"><?php echo substr($rs['com_description'],0,100);?>.........</td>
	  </tr>													  
	</table>
	<?php }?>													
	</td>
  </tr>
 <tr>
	<td align="center"><input type="button" name="submit" value="Submit Your Assignment" onclick="location.href='studentinfo.php?comid=<?php echo $comid;?>&amp;subcatid=<?php echo $sub_catid;?>'" /></td>
 </tr>
</table>		
                              
							<?php include("footer.php");?>
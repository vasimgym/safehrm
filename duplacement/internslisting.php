<?php
include('include/config.php');
$sql2 = "select * from dup_students ORDER BY RAND() limit 10 ";
$res3 = mysql_query($sql2);
$res4 = mysql_query($sql2);

?>
<div style="width:395px; float:left; padding-top:10px;">
        <div style="width:55px; padding-left:30px; line-height:24px; float:left;"><br />
          <?php while( $iresult = mysql_fetch_array($res3)) 
		  {	
		  	  	$st_id = $iresult['st_id'];	
					  	
		  ?>
		  <a href="viewstudentdetails.php?id=<?php echo $st_id; ?>"><span class="linkze">hire now</span></a><br />
          <?php } ?>
        </div>
        <div style="width:300px; padding-left:10px; line-height:24px; float:left;">
			<strong>INTERNS FOR HIRE</strong><br />
		<?php while( $iresult2 = mysql_fetch_array($res4)) 
		  {	
		  	  	$st_name 		= $iresult2['st_name'];
				$st_location 	= $iresult2['st_location'];
				
				 		  	
		  ?>
			<span class="nam"><?php echo $st_name; ?>,</span> <?php echo $st_location; ?><br />
		<?php } ?>
			
        </div>
      </div>
<?php
include('include/config.php');
include('include/commonfunctions.php');

$sql = "select `job_id`, `job_cl_id`, `job_title`, 	`job_description` ,	`job_st_requirement` ,`job_highest_education` ,`job_experience` ,`job_industry` ,	`job_function` ,`job_location` ,`job_salary` ,`job_clientname`,	`job_contact_person` ,`job_reference_id` ,`job_address`,`job_phone1` ,`job_phone2` 	,`job_email` ,
`name` as `locationname`, `functionname` as  `functionname`
FROM `dup_jobs` left join `dup_functions` on `functionid` = `job_function` left join `dup_location` on `locationid` = `job_location` ORDER BY RAND() limit 10 ";
$res = mysql_query($sql);
$res2 = mysql_query($sql);


?>
<div style="width:355px; float:left; padding-top:10px;">
          <div style="width:65px; padding-left:10px; line-height:24px; float:left;"><br />
		  <?php while( $jresult = mysql_fetch_array($res)) 
		  {	
		  	  	$job_id = $jresult['job_id'];	
					  	
		  ?>
            <a href="viewjobdetails.php?id=<?php echo $job_id; ?>"  target="_blank"><span class="linkze">apply now</span></a><br />            
		<?php } ?>
          </div>
          <div style="width:270px; padding-left:10px; line-height:24px; float:left;">
			<strong>JOBS FOR CANDIDATE</strong><br />
			 <?php while( $jresult2 = mysql_fetch_array($res2)) 
		  	{	
				$job_id = $jresult2['job_id'];	
				$job_title = $jresult2['job_title'];
				$location  = $jresult2['locationname'];
				$functionname = $jresult2['functionname'];
		  	?>
            <span class="nam"><?php echo $job_title; ?> (<?php echo $functionname; ?>),</span> <?php echo $location; ?><br />            
		<?php } ?>
          </div>
        </div>
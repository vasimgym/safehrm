<?php
include('include/config.php');
include('include/commonfunctions.php');

$job_id = stripslashes($_GET['id']);

 $sql = "SELECT 
			`job_id`, `job_cl_id`, `job_title`,
			`job_description` ,	`job_st_requirement` ,
			`job_highest_education` ,`job_experience` ,
			`job_industry` ,`job_function` ,`job_location` ,
			`job_salary` ,`job_clientname`,	`job_contact_person` ,
			`job_reference_id` ,`job_address`,`job_phone1` ,`job_phone2` ,`job_email` ,`job_post_date`,
			`name` as `locationname`,
			`functionname` as  `functionname`
	FROM	`dup_jobs` 
			LEFT JOIN `dup_functions` on `functionid` = `job_function` 
			LEFT JOIN `dup_location` on `locationid` = `job_location` 
WHERE job_id='$job_id' ";
$res	= mysql_query($sql);
$result = mysql_fetch_array($res);

//print_r($result);

include("header.php");
?>
	<div class="navmain">
   	<div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-jobsdt.jpg" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" /></div>
		<div class="blue" style="height:17px; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:8px; width:780px; float:left; 
    	background-image:url(images/nav-bar-table1.jpg);"><strong><?php echo $result['job_title']; ?>, <?php echo $result['locationname']; ?></strong></div>
		<div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:5px; width:780px; float:left;">
      	<table width="780" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="120" height="30">Experience</td>
        <td width="50" height="30">:</td>
        <td height="30"><?php echo $result['job_experience']; ?></td>
        </tr>
        <tr>
        <td width="120" height="30">Location</td>
        <td width="50" height="30">:</td>
        <td height="30"><?php echo $result['locationname']; ?></td>
        </tr>
        <tr>
        <td width="120" height="30">Education</td>
        <td width="50" height="30">:</td>
        <td height="30"><?php echo ShowValue("dup_coursetypes", "id", "coursename", $result['job_highest_education']); ?></td>
        </tr>
        <tr>
        <td width="120" height="30">Industry Type</td>
        <td width="50" height="30">:</td>
        <td height="30"> <?php echo $op = ShowValue("dup_industry", "industryid", "industryname", $result['job_industry']); ?></td>
        </tr>
        <tr>
        <td width="120" height="30">Functional Area</td>
        <td width="50" height="30">:</td>
        <td height="30"><?php echo $op = ShowValue("dup_industry", "industryid", "industryname", $result['job_function']); ?></td>
        </tr>
        <tr>
        <td width="120" height="30">Posted Date</td>
        <td width="50" height="30">:</td>
        <td height="30"><?php echo $result['job_post_date']; ?></td>
        </tr>
      </table>
	  </div>
	  <div class="blue" style="height:18px; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:8px; width:780px; float:left; 
    	background-image:url(images/nav-bar-table0.jpg);"><strong><?php echo $result['job_title']; ?>, <?php echo $result['locationname']; ?></strong></div>
	  <div style=" background-color:#f2f7fa; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:5px; width:780px; float:left;"><BR /><strong><?php echo nl2br($result['job_description']); ?></strong><br />
      <br /></div>
	  <div class="blue" style="height:18px; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:8px; width:780px; float:left; 
    	background-image:url(images/nav-bar-table0.jpg);"><strong>Desired Candidate Profile</strong></div>
	  <div style=" background-color:#f2f7fa; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:5px; width:780px; float:left;"><br />
		<strong><?php echo nl2br($result['job_st_requirement']); ?></strong><br />
		<br /></div>
	  <div class="blue" style="height:18px; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:8px; width:780px; float:left; 
    	background-image:url(images/nav-bar-table0.jpg);"><strong>Contact Details</strong></div>
	  <div style=" background-color:#f2f7fa; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:5px; width:780px; float:left;">
      <table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="120" height="30">Company Name</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_clientname']; ?></strong></td>
      </tr>
      <tr>
      <td width="120" height="30">Executive Name</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_contact_person']; ?></strong></td>
      </tr>
      <tr>
      <td width="120" height="30">Address</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_address']; ?></strong></td>
      </tr>
      <tr>
      <td width="120" height="30">Email address</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_email']; ?></strong></td>
      </tr>
      <tr>
      <td width="120" height="30">Telephone</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_phone1']; ?></strong></td>
      </tr>
      <tr>
      <td width="120" height="30">Reference Id</td>
      <td width="50" height="30">:</td>
      <td height="30"><strong><?php echo $result['job_reference_id']; ?></strong></td>
      </tr>
      <tr>
      <td height="30"></td>
      <td height="30"></td>
      <td height="30"></td>
      </tr>
      </table>
	  </div>
</div>
	  </div> 
<?php include("footer.php"); ?>
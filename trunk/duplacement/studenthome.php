<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

$studentid = $_SESSION['stUserID'];

$sql = "select `job_id`, `job_cl_id`, `job_title`, 	`job_description` ,	`job_st_requirement` ,`job_highest_education` ,`job_experience` ,`job_industry` ,	`job_function` ,`job_location` ,`job_salary` ,`job_clientname`,	`job_contact_person` ,`job_reference_id` ,`job_address`,`job_phone1` ,`job_phone2` 	,`job_email` ,
`name` as `locationname`, `functionname` as  `functionname`
FROM `dup_jobs` left join `dup_functions` on `functionid` = `job_function` left join `dup_location` on `locationid` = `job_location` ORDER BY RAND() limit 10 ";
$res = mysql_query($sql);


$select = mysql_query("select * from dup_students where st_id='$studentid' ");
$selectresult = mysql_fetch_array($select);

include('studentheader.php');
?>

<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { this.submit(); }
});

$().ready(function() {	
	$("#SearchForm").validate({
		rules: {
			location: {
				required: true			
			},
			industry: {
				required: true			
			}
		},
		messages: {
			location: {
				required: "Please select a location"				
			},
			industry: {
				required: "Please select an industry"				
			}			
		}
	});
		
});
</script>

<style type="text/css">
#SearchForm .error {
	width: auto;
	display:inline;
	padding-left:15px;
	color:#FF0000;
}

</style>
	<div align="left" style="text-align:justify; float:left; overflow:hidden;">
		<div class="nav">
        <div class="navbar"> 
          <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> 
          <img src="images/nav-img-studs.jpg" alt="" style="float:left; padding-left:4px; padding-top:8px;"/> 
          <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
          <div class="navbarB">
          <?php include("studentmenu.php"); ?>
          </div>
	<div class="navmain">
   	<div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-welusr.jpg" alt="recentjobs" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />    </div>

	<div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; 
      padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">

	<div style="width:300px; float:left; overflow:hidden;">
	<img src="images/nav-img-search.jpg" alt="searchjobs" style="padding-bottom:15px;" />
    <form id="SearchForm" method="post" action="find_jobs.php" >
	  <input type="hidden" name="search" value="1" />
   <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td height="5" align="center" valign="top"></td>
      <td height="5" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top">Location</td>
      <td width="20" height="25" align="center" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top"><select name="location" class="form" id="location" style="width:172px;">
        <option value="" selected="selected">-- Location --</option>
        <?php echo $ops = ListOptions("dup_location", "locationid", "name", $_POST['location']); ?>
      </select></td>
      </tr>
      <tr>
      <td width="70" height="22" align="left" valign="top">Job Type</td>
      <td width="20" height="22" align="center" valign="top">:</td>
      <td width="0" height="22" align="left" valign="top"><select name="industry" class="form" id="industry" style="width:175px;">
        <option value="" selected="selected" >-- Select Industry --</option>
        <?php echo $options = ListOptions("dup_industry", "industryid", "industryname", $_POST['industry']); ?>
      </select></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="center" valign="top"></td>
      <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-search.jpg" name="submit" id="submit" value="Submit" /></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top"></td>
      <td height="25" align="center" valign="top"></td>
      <td width="0" height="25" align="left" valign="top"></td>
      </tr>
      </table>
	  </form>
      </div>
      
	<div style="width:240px; padding-left:35px; padding-top:5px; float:left; overflow:hidden; line-height:18px;">

	<img src="images/nav-img-job.jpg" alt="searchjobs" style="padding-bottom:15px;" /><br />

	 <?php while( $result = mysql_fetch_array($res)) 
		  {	
		  	  	$job_id = $result['job_id'];	
					  	
	?>
	 <strong><?php echo $result['job_clientname']; ?></strong>(<?php echo $op = ShowValue("dup_industry", "industryid", "industryname", $result['job_industry']); ?>)<br />
	Location: <?php echo $result['locationname']; ?><br />
	Designation: <?php echo $op = ShowValue("dup_industry", "industryid", "industryname", $result['job_function']); ?><br />
	<a href="#" class="linkz">..apply for job...</a>
    <br /><br />
    <?php } ?>
   
    </div>      
    </div>
	</div>

	<div class="navmain">
   	  <div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-myprofile.jpg" alt="job&amp;response" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-img-subsc.jpg" alt="" style="float:right; padding-right:94px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" /></div>

	  <div class="navmaindata">
      <div style="width:340px; height:100px; float:left;"><br />
      <a href="students_edit_profile.php?id=<?php echo $studentid; ?>" class="link"><?php echo nl2br($selectresult['st_keyskills']); ?></a><br />
      <br />
      
	  <?php if (!empty($selectresult['st_photo'])) {  ?>
	  <img src="upload/photo/<?php echo $selectresult['st_photo']; ?>" alt="upload" border="0" height="100" width="100"/><br />
	  <?php } else { ?>
	  <a href="students_update_your_profile.php" class="link">I didn't upload my photograph.</a>
	  <?php } ?>
      <br />
   	  <a href="#" class="link">Last Updated CV: <?php echo $selectresult['st_resume_modified']; ?></a><br />
      </div>

      <div style="width:200px; height:100px; float:left;"><br />
      <!--You are not register yet. --><br /><br />
      <a href="#" class="link">Go for Subscription.</a></div>
	  </div>		
	  </div>
      </div>
  	<?php include("footer.php"); ?>
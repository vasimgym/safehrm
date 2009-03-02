<?php
session_start();
if (empty($_SESSION['clUserID']))
{
	header("location:signin.php");
}
include('include/config.php');
include('include/commonfunctions.php');

foreach($_POST as $key => $val ) 
{ 	
	$$key = stripslashes($val);	
}


if (!empty($_POST['addjob']))
{
	$job_cl_id = $_SESSION['clUserID'];

	$sql = " INSERT INTO `dup_jobs` (
	`job_id` ,
	`job_cl_id`,
	`job_title` ,
	`job_description` ,
	`job_st_requirement` ,
	`job_highest_education` ,
	`job_experience` ,
	`job_industry` ,
	`job_function` ,
	`job_location` ,
	`job_salary` ,
	`job_clientname` ,
	`job_contact_person` ,
	`job_reference_id` ,
	`job_address` ,
	`job_phone1` ,
	`job_phone2` ,
	`job_email`
	)
	VALUES ( '' ,'$job_cl_id', '$job_title' ,'$job_description' , '$job_st_requirement' , '$job_highest_education' ,
	'$job_experience' , '$job_industry' ,'$job_function' ,'$job_location' , '$job_salary' , '$job_clientname' ,
	'$job_contact_person' , '$job_reference_id' ,'$job_address' ,'$job_phone1' ,'$job_phone2' ,'$job_email')";
	
	$res = mysql_query($sql);
	if (!empty($res)) { triggerMessage("err_jobpost", "New Job Posted Successfully!");	 }
}
include("clientheader.php"); ?>

<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	submitHandler: function() {
		jobForm.submit();
	}
});

$().ready(function() {
$("#jobForm").validate();

});

</script>

<style>

em.error { color: black; }
#warning { display: block; }

#jobForm .error {
	width: auto;
	display:inline;
	padding-left:10px;
	color:#FF0000;
	size:10px;
}

</style>
	    <div align="left" style="text-align:justify; float:left;">
          <div class="nav">
            <div class="navbar"> <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> <img src="images/nav-img-clients.jpg" alt="clients" style="float:left; padding-left:4px; padding-top:8px;"/> <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
            <div class="navbarB">
             <?php include("clientmenu.php"); ?>
          </div>
	      <div class="navmain">
            <div class="navmainbar"> <img src="images/nav-left-bar.jpg" style="float:left" alt="navleft"/> <img src="images/nav-img-postajob.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/> <img src="images/nav-right-bar.jpg" style="float:right" alt="navright"/> </div>
	        <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	        <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:580px; float:left;">
             <form id="jobForm" method="post" action="" >
			 <input type="hidden" name="addjob" value="1" />
			 <table width="580" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td height="25" align="left" valign="top"><?php outputTrigger('err_jobpost'); ?></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Job Title</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><input name="job_title" type="text" class="required form" id="job_title" size="27" /></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Job Profile</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><textarea name="job_description" cols="25" rows="3" class="required form" id="job_description" style="width:168px;"></textarea></td>
                </tr>
                <tr>
                  <td height="3" align="left" valign="top"></td>
                  <td width="25" height="3" align="left" valign="top"></td>
                  <td width="0" height="3" align="left" valign="top"></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Candidate Profile</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><textarea name="job_st_requirement" cols="25" rows="3" class="form" id="job_st_requirement" style="width:168px;"></textarea></td>
                </tr>
                <tr>
                  <td height="3" align="left" valign="top"></td>
                  <td width="25" height="3" align="left" valign="top"></td>
                  <td width="0" height="3" align="left" valign="top"></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Education</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_highest_education" class="form" id="job_highest_education" style="width:174px;">
                      <option value="" selected="selected" >-- Highest Education Held --</option>
                     <?php coursetypes("2", $jobresult['job_highest_education']); ?>
                  </select></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Experience</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_experience" class="form" id="job_experience" style="width:174px;">
                      <option value="">-- Years of Experience --</option>
                      <?php ExpList(); ?>
                  </select></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Industry</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_industry" class="form" id="job_industry" style="width:174px;">
                      <option value="" selected="selected" >-- Select Industry --</option>
                      <?php echo $options = ListOptions("dup_industry", "industryid", "industryname", $jobresult['ex_industry']); ?>
                  </select></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Function</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><select name="job_function" class="required form" id="job_function" style="width:175px;">
                  <option value="" selected="selected" >-- Select Function --</option>
                  <?php echo $options = ListOptions("dup_functions", "functionid", "functionname", $jobresult['ex_function']); ?>
                </select></td>
                </tr>
                <td width="140" height="25" align="left" valign="top">Location (City)</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top">
				<select name="job_location" class="required form" id="job_location" style="width:172px;">
              	<option value="">-- Location --</option>
             	<?php echo $options = ListOptions("dup_location", "locationid", "name", $jobresult['st_location']); ?>
              	</select>				</td>
                <tr>
                <td width="140" height="25" align="left" valign="top">Salary</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top">
				<input name="job_salary" type="text" class="form" id="job_salary" size="27" />                </td>
                </tr>
                <tr>
                <td height="10" align="left" valign="top"></td>
                <td width="25" height="10" align="left" valign="top"></td>
                <td width="0" height="10" align="left" valign="top"></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Client name</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_clientname" type="text" class="form" id="job_clientname" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Contact Person</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_contact_person" type="text" class="form" id="job_contact_person" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Reference Id</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_reference_id" type="text" class="form" id="job_reference_id" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Address</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_address" type="text" class="form" id="job_address" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Contact No.</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_phone1" type="text" class="form" id="job_phone1" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Email Id</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_email" type="text" class="required email form" id="job_email" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top"></td>
                <td width="25" height="25" align="left" valign="top"></td>
                <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
                </tr>
              </table>
             </form>
            </div>
          </div>
        </div>
	    <?php include("footer.php"); ?>
<?php
include('include/config.php');
include('include/commonfunctions.php');

if (!empty($_POST['search']))
{
	$location	= stripslashes($_POST['location']);
	$industry	= stripslashes($_POST['industry']);
	$searchsql	= "select * from dup_jobs where job_location = '$location' and job_industry = '$industry' ";
	$searchres	= mysql_query($searchsql);
	while ($searchresult = mysql_fetch_array($searchres))
	{
		$jobdetails[] = $searchresult;
	}
}
include("header.php");
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
   	<link href="include/style.css" rel="stylesheet" type="text/css" /><div style="width:770px; height:450px; float:left;">
  <div align="left" style="text-align:justify; float:left; width:770px; height:450px;"><img src="images/du-findjob.jpg" alt="find_jobs" /> <br />
      <?php if (empty($_SESSION['stUser'])) { ?>
	   <br /><br />
      <strong><a href="signin.php" class="link">LOGIN</a> TO VIEW ALL JOBS ::....</strong><br /><br /><br />
	  <?php } ?>
	  <form id="SearchForm" method="post" action="" >
	  <input type="hidden" name="search" value="1" />
	  <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="110" height="25" align="left" valign="top">Location</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top">
	  <select name="location" class="form" id="location" style="width:172px;">
       <option value="" selected>-- Location --</option>
        <?php echo $ops = ListOptions("dup_location", "locationid", "name", $_POST['location']); ?>
      </select></td>
      </tr>
      <tr>
      <td width="110" height="25" align="left" valign="top">Job Type</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top">
      <select name="industry" class="form" id="industry" style="width:175px;">
       <option value="" selected="selected" >-- Select Industry --</option>
       <?php echo $options = ListOptions("dup_industry", "industryid", "industryname", $_POST['industry']); ?>
      </select>
      </td>
      </tr>
      <tr>
      <td width="110" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="left" valign="top"></td>
      <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-search.jpg" name="submit" id="submit" value="Submit" /></td>
      </tr>
      <tr>
      <td height="25" align="left" valign="top"></td>
      <td height="25" align="left" valign="top"></td>
      <td width="0" height="25" align="center" valign="middle"></td>
      </tr>
      </table>
	  </form>
	  
	  <br />
	  <table width="700" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="4" align="left" valign="middle" class="namez">SEARCH RESULT</td>
        </tr>
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td width="350" align="left" valign="middle" class="header"><strong>Title</strong></td>
          <td width="220" align="left" valign="middle" class="header"><strong>Posted Date </strong></td>
          
          <td width="220" align="left" valign="middle" class="header"><strong>Action</strong></td>
        </tr>
        <tr>
          <td width="350" height="5" align="left" valign="middle"></td>
          <td width="220" height="5" align="left" valign="middle"></td>
          
          <td width="220" height="5" align="left" valign="middle"></td>
          <td width="1" height="5" align="left" valign="middle"></td>
        </tr>
        <?php for ($i=0; $i < count($jobdetails); $i++) { ?>
        <tr>
          <td height="30"  align="left" valign="middle">
		  <a href="viewjobdetails.php?id=<?php echo $jobdetails[$i]['job_id']; ?>" class="link" target="_blank" ><?php echo $jobdetails[$i]['job_title']; ?></a></td>
          <td width="220" height="30" align="left" valign="middle"><?php echo $jobdetails[$i]['job_post_date']; ?></td>
          
          <td width="220" height="30" align="left" valign="middle">apply now</td>
        </tr>
        <?php } ?>
      </table>
	  <p>&nbsp;</p>
    </div>
      </div>
	  <?php include("footer.php");?>
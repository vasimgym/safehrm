<?php
include('include/config.php');
include('include/commonfunctions.php');
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
   	<div style="width:770px; height:450px; float:left;">
    <div align="left" style="text-align:justify; float:left; width:770px; height:450px;"><img src="images/du-findjob.jpg" alt="find_jobs" /> <br />
      <br /><br />
      <strong><a href="signin.php" class="link">LOGIN</a> TO VIEW ALL JOBS ::....</strong><br /><br /><br />
	  <form id="SearchForm" method="post" action="" >
	  <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="110" height="25" align="left" valign="top">Location</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top">
	  <select name="location" class="form" id="location" style="width:172px;">
       <option value="" selected>-- Location --</option>
        <?php echo $ops = ListOptions("dup_location", "locationid", "name", $i); ?>
      </select></td>
      </tr>
      <tr>
      <td width="110" height="25" align="left" valign="top">Job Type</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top">
      <select name="industry" class="form" id="industry" style="width:175px;">
       <option value="" selected="selected" >-- Select Industry --</option>
       <?php echo $options = ListOptions("dup_industry", "industryid", "industryname", $i); ?>
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
      </div>
      </div>
  	  <?php include("footer.php");?>
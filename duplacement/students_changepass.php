<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}
$studentid = $_SESSION['stUserID'];

if (!empty($_POST['editcat'])) 
{
	$oldpassword	= trim(stripslashes($_POST['oldpassword']));
	$newpassword	= trim(stripslashes($_POST['newpassword']));
		
	$editsql	= "UPDATE dup_students 
					   SET		st_pass='$newpassword'
					   WHERE	st_id='$studentid'";
		$res = mysql_query($editsql);
			if (!empty($res)) {
				triggerMessage("err_student", "Password Changed Successfully");				
			} else {
				triggerMessage("err_student", "Password Change Failed");
			}
}


include('studentheader.php');
?>
<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	submitHandler: function() {
		passForm.submit();
	}
});

$().ready(function() {
$("#passForm").validate();

});

</script>

<style>

em.error { color: black; }
#warning { display: block; }

#passForm .error {
	width: auto;
	display:inline;
	padding-left:10px;
	color:#FF0000;
	size:10px;
}

</style>
	<div align="left" style="text-align:justify; float:left;">
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
        <img src="images/nav-img-changepass.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/>
        <img src="images/nav-right-bar.jpg" style="float:right" />        
      </div>

	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	  <div style="height:500px; background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
	<form id="passForm" action="" method="post" >
	  <table width="580" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="25" align="left" valign="top">&nbsp;</td>
          <td height="25" align="left" valign="top">&nbsp;</td>
          <td height="25" align="left" valign="top"><span style="text-align:center">
            <?php outputTrigger('err_student'); ?>
          </span></td>
        </tr>
        <tr>
        <td width="140" height="25" align="left" valign="top">Old Password</td>
        <td width="40" height="25" align="left" valign="top">:</td>
        <td width="400" height="25" align="left" valign="top"><input name="oldpassword" type="password" class="required form" id="oldpassword" size="27" /></td>
        </tr>
        <tr>
        <td width="140" height="25" align="left" valign="top">New Password</td>
        <td width="40" height="25" align="left" valign="top">:</td>
        <td width="400" height="25" align="left" valign="top"><input name="newpassword" type="password" class="required form" id="newpassword" size="27" /></td>
        </tr>
        <tr>
        <td width="140" height="25" align="left" valign="top">Retype New Password</td>
        <td width="40" height="25" align="left" valign="top">:</td>
        <td width="400" height="25" align="left" valign="top"><input name="repassword" type="text" class="required form" id="repassword" size="27" /></td>
        </tr>
        <tr>
        <td width="140" height="25" align="left" valign="top"></td>
        <td width="40" height="25" align="left" valign="top"></td>
        <td width="400" height="25" align="left" valign="top"><input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </table>
</form>
	  </div>
      </div>
	  </div> 	  
  	<?php include('footer.php');?>
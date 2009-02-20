<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

$studentid = $_SESSION['stUserID'];

if(!empty($_POST['editaction']))
{

	$st_name 		= $_POST['st_name'];
    $st_dob 		= $_POST['st_dob'];
    $st_location 	= $_POST['st_location'];
    $st_email 		= $_POST['st_email'];
    $st_mobile 		= $_POST['st_mobile'];
    $st_contact_no 	= $_POST['st_contact_no'];
    $st_ug_qualification = $_POST['st_ug_qualification'];
    $st_ug_specilization = $_POST['st_ug_specilization'];
    $st_ug_univ = $_POST['st_ug_univ'];
    $st_ug_college = $_POST['st_ug_college'];
    $st_ug_passyear = $_POST['st_ug_passyear'];
    $st_pg_qualification = $_POST['st_pg_qualification'];
    $st_pg_specilization = $_POST['st_pg_specilization'];
    $st_pg_univ = $_POST['st_pg_univ'];
    $st_pg_college = $_POST['st_pg_college'];
    $st_pg_passyear = $_POST['st_pg_passyear'];
	
	$esql = "update dup_students set 
			`st_name` = '$st_name',
			`st_dob` = '$st_dob',
			`st_location` = '$st_location',
			`st_mobile` = '$st_mobile',
			`st_contact_no` = '$st_contact_no',
			`st_ug_qualification` = '$st_ug_qualification',	
			`st_ug_specilization` = '$st_ug_specilization',
			`st_ug_univ` = '$st_ug_univ',
			`st_ug_college` = '$st_ug_college',	
			`st_ug_passyear` = '$st_ug_passyear',
			
			`st_pg_qualification` = '$st_pg_qualification', 	
			`st_pg_specilization` = '$st_pg_specilization',
			`st_pg_univ` = '$st_pg_univ',
			`st_pg_college` = '$st_pg_college',	
			`st_pg_passyear` = '$st_pg_passyear' 	
	where  st_id='$studentid'";
	mysql_query($esql);
}

$select = mysql_query("select * from dup_students where st_id='$studentid' ");
$selectresult = mysql_fetch_array($select);

include('studentheader.php');
?>
<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	submitHandler: function() {
		signupForm.submit();
	}
});

$().ready(function() {
// validate the comment form when it is submitted
$("#signupForm").validate();

$("#st_dob").mask("9999-99-99");
$("#st_mobile").mask("9999999999");
$("#st_contact_no").mask("9999-9999999999");



});

</script>
<style>
#signupForm .error {
	width: auto;
	color:#FF0000;
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
            <div class="navmainbar"> <img src="images/nav-left-bar.jpg" style="float:left" /> 
            <img src="images/nav-img-editpro.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/> 
            <img src="images/nav-right-bar.jpg" style="float:right" /> </div>
            <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
            <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; 
            padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
           <form action="" id="signupForm" method="post">
		   <input type="hidden" name="editaction" value="1" />
		    <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="150" height="25" align="left" valign="top">User Name</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
            <?php echo $selectresult['st_username']; ?></td>
            </tr>
            <tr>
            <td width="150" height="10" align="left" valign="top"></td>
            <td width="20" height="10" align="left" valign="top"></td>
            <td width="0" height="10" align="left" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>First Name</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input name="st_name" type="text" class="required form" id="st_name" value="<?php echo $selectresult['st_name']; ?>"/></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Date of Birth</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input type="text" id="st_dob" name="st_dob" value="<?php if ($selectresult['st_dob'] != '0000-00-00') echo $selectresult['st_dob']; ?>" class="required form"  /></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Location (City)</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top">
              <select name="st_location" class="required form" id="st_location" style="width:172px;">
              <option value="">-- Location --</option>
             <?php echo $options = ListOptions("dup_location", "locationid", "name", $selectresult['st_location']); ?>
              </select></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>E-Mail Id</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input name="st_email" type="text" class="required form" id="st_email" value="<?php echo $selectresult['st_email']; ?>"/></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Mobile No.</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input name="st_mobile" type="text" class="required form" id="st_mobile" value="<?php echo $selectresult['st_mobile']; ?>"/></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Contact No.</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input name="st_contact_no" type="text" class="required form" id="st_contact_no" value="<?php echo $selectresult['st_contact_no']; ?>"  size="30" /></td>
              </tr>
              <tr>
              <td width="150" height="15" align="left" valign="top"></td>
              <td width="20" height="15" align="center" valign="top"></td>
              <td width="0" height="15" align="left" valign="top"></td>
              </tr>
	          <tr>
        	  <td width="150" height="25" align="left" valign="top"><strong>UG Qualification</strong></td>
        	  <td height="25" align="center" valign="top">:</td>
        	  <td width="0" height="25" align="left" valign="top"><select name="st_ug_qualification" class="formi" id="select" style="width:172px;">
                <option value="" selected="selected" >-- UG Qualification --</option>
                <?php coursetypes("1", $selectresult['st_ug_qualification']); ?>
              </select></td>
	          </tr>
	          <tr>
    	      <td width="150" height="25" align="left" valign="top">Specialization</td>
	          <td height="25" align="center" valign="top">:</td>
	          <td width="0" height="25" align="left" valign="top">
              <select name="st_ug_specilization" class="formi" id="st_ug_specilization" style="width:172px;">
              <option value="" selected="selected" >-- Specialization --</option>
              <option value="0"  >No any specialization</option>
              <?php Specializations("2", $selectresult['st_ug_specilization']); ?>
              </select></td>
			  </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">University </td>
	          <td height="25" align="center" valign="top"> :</td>
	          <td width="0" height="25" align="left" valign="top"><input name="st_ug_univ" type="text" class="form" id="st_ug_univ" value="<?php echo $selectresult['st_ug_univ']; ?>"/></td>
	          </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">College </td>
    	      <td height="25" align="center" valign="top"> :</td>
	          <td width="0" height="25" align="left" valign="top"><input name="st_ug_college" type="text" class="form" id="st_ug_college" value="<?php echo $selectresult['st_ug_college']; ?>"/></td>
	          </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">Year of passing</td>
	          <td height="25" align="center" valign="top">:</td>
  	          <td width="0" height="25" align="left" valign="top">
    	      <select name="st_ug_passyear" class="formi" id="st_ug_passyear">
			  <option value="" >-- Select --</option>
			  <?php 
			  $y = date('Y', time());
			  for ($j=1980; $j <= $y; $j++) { ?>
			  <option value="<?php echo $j; ?>"  <?php if ($j == $selectresult['st_ug_passyear']) echo "selected";?>><?php echo $j; ?></option> 
			  <?php } ?>			  
			  </select></td>
        </tr>
        <tr>
        <td width="150" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top"><strong>PG Qualification</strong></td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top">
        <select name="st_pg_qualification" class="formi" id="st_pg_qualification" style="width:172px;">
              <option value="" selected="selected" >-- PG Qualification --</option>
              <option value="0"  >Not Pursuing Graduation</option>
               <?php coursetypes("2", $selectresult['st_ug_qualification']); ?>
            </select>        </td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">Specialization</td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top">
        <select name="st_pg_specilization" class="formi" id="workexp" style="width:172px;">
              <option value="" selected="selected" >-- Specialization --</option>
			  <option value="0"  >No any specialization</option> 
			  <?php Specializations("2", $selectresult['st_pg_specilization']); ?>
            </select></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">University </td>
        <td height="25" align="center" valign="top"> :</td>
        <td width="0" height="25" align="left" valign="top"><input name="st_pg_univ" type="text" class="form" id="st_pg_univ" value="<?php echo $selectresult['st_pg_univ']; ?>"/></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">College </td>
        <td height="25" align="center" valign="top"> :</td>
        <td width="0" height="25" align="left" valign="top"><input name="st_pg_college" type="text" class="form" id="st_pg_college" value="<?php echo $selectresult['st_pg_college']; ?>"/></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">Year of passing</td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top"><select name="st_pg_passyear" class="formi" id="st_pg_passyear">
			  <option value="" >-- Select --</option>
			  <?php 
			  $y = date('Y', time());
			  for ($j=1980; $j <= $y; $j++) { ?>
			  <option value="<?php echo $j; ?>"  <?php if ($j == $selectresult['st_pg_passyear']) echo "selected";?>><?php echo $j; ?></option> 
			  <?php } ?>	
			  </select>        </td>
        </tr>
        <tr>
        <td width="150" align="left" valign="top"></td>
        <td align="center" valign="top"></td>
        <td width="0" align="left" valign="top"></td>
        </tr>
        <tr>
        <td width="150" height="35" align="left" valign="top"></td>
        <td width="20" height="35" align="center" valign="top"></td>
        <td width="0" height="35" align="left" valign="top"><input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
        </tr>
        </table>
		 </form>
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
            </div>
          </div>
        </div>
  	<?php include("footer.php"); ?>
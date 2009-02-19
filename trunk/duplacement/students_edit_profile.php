<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

$studentid = $_SESSION['stUserID'];
if($_POST['editprofile'])
{
	$st_keyskills 		= $_POST['st_keyskills'];
	$st_resumeheadline 	= stripslashes($_POST['st_resumeheadline']);	
	$st_textresume 		= $_POST['st_textresume'];
	
	$sql1 = "UPDATE `dup_students` SET 
			`st_keyskills` = '$st_keyskills', 
			`st_resumeheadline` = '$st_resumeheadline',
			`st_textresume` = '$st_textresume' 			
	WHERE	`st_id` = '".$_SESSION['stUserID']."' LIMIT 1";
	$res1 = mysql_query($sql1);
	
	// update main student table
	/*$sql = "UPDATE `dup_students` SET `st_username` = 'teststudent1', `st_pass` = 'teststudent1', `st_email` = 'sdfesfsd@fdgbfdg.com', `st_name` = 'sdfdf1', `st_location` = 'ccfvdf1', `st_mobile` = '098887733201', `st_status` = 'block', `st_keyskills` = 'sdfdef', `st_resumeheadline` = 'aaadd', `st_resumepath` = 'aaadd', `st_textresume` = 'ssff', `st_contact_no` = 'dfds', `st_ug_qualification` = 'dfdf', `st_ug_specilization` = 'dfd', `st_ug_univ` = 'df', `st_ug_college` = 'dsd', `st_ug_passyear` = 'dsd', `st_pg_qualification` = 'ds', `st_ug_specilizationp` = 's', `st_pg_univ` = 'sdd', `st_pg_college` = 'sdsd', `st_pg_passyear` = 'ds' WHERE `st_id` = 14 LIMIT 1;";
	*/
	
	
	$counter = $_POST['counter'];
	for ($i=1; $i <= $counter; $i++)
	{
		
		$st_ex_duration  = "st_ex_duration_".$i;
		$st_ex_function  = 'st_ex_function_'.$i;
		$st_ex_industry  = 'st_ex_industry_'.$i;
		$st_ex_salary 	 = 'st_ex_salary_'.$i;
		
		$stexduration 	= $_POST[$st_ex_duration];
		$stexfunction 	= $_POST[$st_ex_function];
		$stexindustry 	= $_POST[$st_ex_industry];
		$stexsalary 	= $_POST[$st_ex_salary];
		$where = "`ex_st_id` = '" .$_SESSION['stUserID'] . "' and `ex_number` = '" . $i . "'" ;
		$ex_id = ChkRecordExists("dup_studentexp", $where, 'ex_id');
		if ($ex_id == 0)
		{	
			if (!empty($stexduration))
			{
				$sql2 = "INSERT INTO `dup_studentexp` (`ex_id`, `ex_st_id`, `ex_number`, `ex_duration`, `ex_function`, `ex_industry`, `ex_remuneration`) VALUES (NULL,'$studentid', '$i', '$stexduration', '$stexfunction', '$stexindustry', '$stexsalary')";
				mysql_query($sql2);
			}
		} else {
			
			$sql2 = "UPDATE `dup_studentexp` SET  `ex_number` = '$i', `ex_duration` = '$stexduration',
				 `ex_function` = '$stexfunction', `ex_industry` = '$stexindustry', `ex_remuneration` = '$stexsalary' 
				 WHERE `ex_id` = '$ex_id' LIMIT 1";
			mysql_query($sql2);
			
		}
		
	}
	//print_r($_POST);
}


$select = mysql_query("select * from dup_students where st_id='$studentid' ");
$selectresult = mysql_fetch_array($select);

$maxnumber = 0;
$selectexp = mysql_query("select max(ex_number) as maxnumber from dup_studentexp where ex_st_id='$studentid' ");
$maxnres = mysql_fetch_array($selectexp);
$maxnumber = $maxnres['maxnumber'];

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

var template = jQuery.format($("#template").val());
function addRow() {
	$(template(i++)).appendTo("#orderitems tbody");
	//$("#counter").value='test';
	document.signupForm.counter.value=i-1;
}

var i = <?php echo $maxnumber+1; ?>;
<?php if ($maxnumber == 0) {  ?>
// start with one row
addRow();
<?php } ?>
// add more rows on click
$("#add").click(addRow);


function removerow(id) {
//$("#st_ex_duration_1").remove();
$(id).remove();
//$("#st_ex_duration_1").css("display") ="none";

}

$("#remove", "st_ex_duration_1").click(removerow);

});


</script>

<style>

em.error { color: black; }
#warning { display: block; }

#signupForm .error {
	width: auto;
	display:block;
	color:#FF0000;
	size:10px;
}
/*select.error {
	border: 1px dotted navy;
}*/

</style>

        <div align="left" style="text-align:justify; float:left;">
          <div class="nav">
          <div class="navbar"> 
            <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> 
            <img src="images/nav-img-studs.jpg" alt="" style="float:left; padding-left:4px; padding-top:8px;"/> 
            <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" />
          </div>
          
          <div class="navbarB">
          <?php include("studentmenu.php"); ?>
          </div>

          <div class="navmain">
            <div class="navmainbar"> 
            <img src="images/nav-left-bar.jpg" style="float:left" /> 
            <img src="images/nav-img-editpro.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/> 
            <img src="images/nav-right-bar.jpg" style="float:right" /> </div>
            <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
            <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x;  background-repeat:repeat-x; 
            padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
			
	

            <form name="signupForm" id="signupForm" action="" method="post" enctype="multipart/form-data" class="form">
			<input type="hidden" name="editprofile" value="1" />
            <table width="560" border="0" cellspacing="0" cellpadding="0" >
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Key Skills</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input name="st_keyskills" type="text" class="required form" minlength="2" " id="st_keyskills"  
			size="27"  value="<?php echo $selectresult['st_keyskills'];?>"/></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Resume Headline</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
			<input name="st_resumeheadline" type="text" class="required form" id="st_resumeheadline" size="27"  value="<?php echo $selectresult['st_resumeheadline'];?>"/></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="15" align="left" valign="top"></td>
            <td height="15" align="center" valign="top"></td>
            <td width="0" height="15" align="left" valign="top">search: I have experience....</td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="10" align="left" valign="top"></td>
            <td height="10" align="center" valign="top"></td>
            <td width="0" height="10" align="left" valign="top"></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
			
			<?php $k = 1;
			for ($n=1; $n <= $maxnumber; $n++)  { 
				$expsql 	= mysql_query("select * from dup_studentexp where ex_st_id='$studentid' and ex_number='$n' ");
				$expresult 	= mysql_fetch_array($expsql);
				if(!empty($expresult))
				{
				
			?>
			<tr>
            <td width="150" height="25" align="left" valign="top" id="#_{0}"><span class="star">* </span><strong>Experience <?php echo $k; ?></strong></td>
            <td width="20" height="25" align="center" valign="top"></td>
            <td width="0" height="25" align="left" valign="top"></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Duration</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input name="st_ex_duration_<?php echo $n; ?>" type="text" class="required form" id="st_ex_duration_<?php echo $n; ?>" size="27" value="<?php echo $expresult['ex_duration']; ?>" />            </td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">*</span> Function</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
			<select name="st_ex_function_<?php echo $n; ?>" class="required form" id="st_ex_function_<?php echo $n; ?>" style="width:175px;">
                    <option value="" selected="selected" >-- Select Function --</option>
                    <?php echo $options = ListOptions("dup_functions", "functionid", "functionname", $expresult['ex_function']); ?>
                  </select>
				  </td>
            <td width="70" align="right" valign="top"></td>
            </tr>

           <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Industry</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
			<select name="st_ex_industry_<?php echo $n; ?>" class="required form" id="st_ex_industry_<?php echo $n; ?>" style="width:175px;">
                    <option value="" selected="selected" >-- Select Industry --</option>
                    <?php echo $options = ListOptions("dup_industry", "industryid", "industryname", $expresult['ex_industry']); ?>
                  </select></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Remuneration</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top">
			  <select name="st_ex_salary_<?php echo $n; ?>"  id="st_ex_salary_<?php echo $n; ?>" class="required form" style="width:175px;">
                <option value="" selected="selected" >-- Select Salary --</option>
                <?php echo $options = ListOptions("dup_salary", "salaryid", "salaryname", $expresult['ex_remuneration']); ?>
              </select></td>
            <td width="70" align="right" valign="top"><a href="#_{0}" id="remove" >Remove</a> </td>
            </tr>
			
			<?php
			$k++; } 
			} ?>
           	  
			  <tr>
			  	<td colspan="4"><table id="orderitems"><tbody></tbody></table></td>
			  </tr>
			  <tr>
			  	<td  align="right" colspan="4" id="add"><a href="#_{0}"><img src="images/du-btn-addmore.jpg" border="0"/></a></td>
			  </tr>
              <tr>
              <td width="150" height="10" align="left" valign="top"></td>
              <td height="10" align="center" valign="top"></td>
              <td width="0" height="10" align="left" valign="top"></td>
              <td width="70" align="right" valign="top" > </td>
              </tr>
              <tr>
              <td width="150" height="10" align="left" valign="top"></td>
              <td height="10" align="center" valign="top"></td>
              <td width="0" height="10" align="left" valign="top"></td>
              <td width="70" align="right" valign="top"></td>
              </tr>

              <tr>
              <td width="150" height="25" align="left" valign="top"><strong>Upload Resume</strong></td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-upload.jpg" name="submit2" id="submit2" value="Submit" /></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top">Copy or paste resume</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><textarea name="st_textresume" cols="60" rows="7" class="form" id="description"><?php echo $selectresult['st_textresume'];?></textarea></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              <tr>
              <td width="150" height="10" align="left" valign="top"></td>
              <td height="10" align="center" valign="top"></td>
              <td width="0" height="10" align="left" valign="top"></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              <tr>
              <td width="150" height="35" align="left" valign="top"></td>
              <td width="20" height="35" align="center" valign="top"></td>
              <td width="0" height="35" align="left" valign="top">
			  <input  type="hidden" name="counter" value="" id="counter">
			  <input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              </table>
			  </form>
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
            </div>
          </div>
        </div>
<textarea style="display:none; padding-left:inherit" id="template">
<tr>
            <td width="150" height="25" align="left" valign="top" id="#_{0}"><span class="star">* </span><strong>Add Experience</strong></td>
            <td width="20" height="25" align="center" valign="top"></td>
            <td width="20" height="25" align="left" valign="top"></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="190" height="25" align="left" valign="top"><span class="star">* </span>Duration</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input name="st_ex_duration_{0}" type="text" class="required form" id="st_ex_duration_{0}" size="27" />            </td>
            <td width="70" align="right" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">*</span> Function</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
			<select name="st_ex_function_{0}" class="required form" id="st_ex_function_{0}" style="width:175px;">
                    <option value="" selected="selected" >-- Select Function --</option>
                    <?php echo $options = ListOptions("dup_functions", "functionid", "functionname"); ?>
                  </select>
				  </td>
            <td width="70" align="right" valign="top"></td>
            </tr>

           <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Industry</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
			<select name="st_ex_industry_{0}" class="required form" id="st_ex_industry_{0}" style="width:175px;">
                    <option value="" selected="selected" >-- Select Industry --</option>
                    <?php echo $options = ListOptions("dup_industry", "industryid", "industryname"); ?>
                  </select></td>
              <td width="70" align="right" valign="top"></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Remuneration</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top">
			  <select name="st_ex_salary_{0}"  id="st_ex_salary_{0}" class="required form" style="width:175px;">
                <option value="" selected="selected" >-- Select Salary --</option>
                <?php echo $options = ListOptions("dup_salary", "salaryid", "salaryname"); ?>
              </select></td>
            <td width="70" align="right" valign="top"></td>
            </tr>
</textarea>

  	  <?php include("footer.php"); ?>

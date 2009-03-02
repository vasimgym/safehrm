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
	
	$st_textresume 		= $_POST['st_textresume'];
	$sqlr = "UPDATE `dup_students` SET `st_textresume` = '$st_textresume'	WHERE	`st_id` = '".$_SESSION['stUserID']."' LIMIT 1";
	$resr = mysql_query($sqlr);
	
	$st_resumepath		= trim(stripslashes($_FILES['st_resume']['name']));
	$st_photopath		= trim(stripslashes($_FILES['st_photo']['name']));
	// handle file upload
	$target_dir = "upload/resume/";	
	if (!empty($st_resumepath)) 
	{
		if (!is_dir($target_dir)) { @mkdir($target_dir,0777); }
		$st_resumepath = str_replace(" ", "_",$st_resumepath);
		$st_resumepath = "__".time()."__".$st_resumepath;
		$path		   = $target_dir."/".$st_resumepath;
		$tmp_name	   = $_FILES['st_resume']['tmp_name'];
		
		$type = $_FILES["st_resume"]["name"];				
		$filetype = substr($type,-4);				
		$size = $_FILES["st_resume"]["size"] / 1024;
		
		if (($filetype == ".doc") || ($filetype == ".rtf") || ($filetype == ".wps")) 
		{
			if ($size <= 1024) {
				if (!move_uploaded_file($tmp_name,$path)) {
					triggerMessage("err_student", "Error: upload Failed!");	
				} else {
					$sqlr = "UPDATE `dup_students` SET `st_resumepath` = '$st_resumepath', `st_resume_modified` = NOW()	WHERE	
					`st_id` = '".$_SESSION['stUserID']."' LIMIT 1";
					$resr = mysql_query($sqlr);	
				}
			}
		}
	}
	
	// upload photo
	$st_photo = trim(stripslashes($_FILES['st_photo']['name']));
	// handle file upload
	$target_dir = "upload/photo/";	
	if (!empty($st_photo)) 
	{
		if (!is_dir($target_dir)) { @mkdir($target_dir,0777); }
		$st_photopath = str_replace(" ", "_",$st_photopath);
		$st_photopath = "__".time()."__".$st_photopath;
		$path		   = $target_dir."/".$st_photopath;
		$tmp_name	   = $_FILES['st_photo']['tmp_name'];
		
		$type = $_FILES["st_photo"]["name"];				
		$filetype = substr($type,-4);				
		$size = $_FILES["st_photo"]["size"] / 1024;
		
		if (($filetype == ".jpg") || ($filetype == ".png") || ($filetype == ".gif")) 
		{
			if ($size <= 1024) {
				if (!move_uploaded_file($tmp_name,$path)) {
					triggerMessage("err_student", "Error: upload Failed!");	
				} else {
					$sqlr = "UPDATE `dup_students` SET `st_photo` = '$st_photopath'	WHERE	`st_id` = '".$_SESSION['stUserID']."' LIMIT 1";
					$resr = mysql_query($sqlr);	
				}
			}
		}
	}
	
	triggerMessage("err_student", "Profile Updated!");	
	
}

$select = mysql_query("select * from dup_students where st_id='$studentid' ");
$selectresult = mysql_fetch_array($select);
include('studentheader.php');
?>
<script type="text/javascript">
/*$.validator.setDefaults({
	submitHandler: function() { this.submit(); }
});

$().ready(function() {	
	$("#signupForm").validate(
	{	
		rules: { st_resumetext: {	required: true } }				
	},
		messages: {	st_resumetext:"Please enter name"	}
	});
		
});
*/
function Newwindow(path)
{	window.open(path,"nw","toolbar=0,width=400,height=400");
	return false;
}
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
  	<div style="width:770px; float:left;" align="left">
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
      <img src="images/nav-left-bar.jpg" style="float:left" alt="navleft"/>
      <img src="images/nav-img-updres.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" alt="navright"/>      
      </div>
	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	  <div style="height:500px;  background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
	 <form name="signupForm" id="signupForm" action="" method="post" enctype="multipart/form-data" class="form">
			<input type="hidden" name="editprofile" value="1" />
			 <span style="text-align:center"> <?php outputTrigger('err_student'); ?></span>
			  <table width="580" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="25" align="left" valign="top">Last updated profile</td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top"><?php echo $selectresult['st_resume_modified']; ?></td>
      <td width="60" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top">Upload  Resume</td>
      <td width="40" height="25" align="left" valign="top">: </td>
      <td height="0" align="left" valign="top"><a href="downloadresume.php?file=<?php echo $selectresult['st_resumepath']; ?>" target="_parent"><?php echo $selectresult['st_resumepath']; ?></a><strong>[word format]</strong><br><br /><input id="st_resume" type="file" size="25" name="st_resume"><br /><br /></td>
      <td width="60" align="left" valign="top"><!--<input name="upload" type="image" id="upload" value="Submit" src="images/du-btn-upload.jpg" alt="upload"  onclick="return Newwindow('uploadresume.php');"/> --></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top">Copy or paste resume</td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top"><textarea name="st_textresume" cols="20" rows="8" class="required form" id="st_textresume" style="width:220px;"><?php echo $selectresult['st_textresume']; ?>
</textarea></td>
      <td width="60" align="left" valign="bottom"><!--<input name="submit3" type="image" id="submit3" value="Submit" src="images/du-btn-submit.jpg" alt="submit" onclick="this.submit();" /> --></td>
      </tr>
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td width="40" height="5" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"></td>
      <td width="60" align="left" valign="bottom"></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top"><strong>Upload Photograph </strong></td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top">
        <?php if ($selectresult['st_textresume']) { ?><img src="upload/photo/<?php echo $selectresult['st_photo']; ?>" alt="upload" border="0" height="100" width="100"/> passport size (2 x 2 in) <?php } ?></td>
      <td width="60" align="left" valign="bottom">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"></td>
        <td align="left" valign="top">&nbsp;</td>
        <td height="0" align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
      <td width="180" align="left" valign="top"></td>
      <td width="40" align="left" valign="top">&nbsp;</td>
      <td height="0" align="left" valign="top"><input id="st_photo" type="file" size="25" name="st_photo"></td>
      <td width="60" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td width="40" height="5" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"></td>
      <td width="60" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top"></td>
      <td width="40" height="25" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"><input name="submit2" type="image" id="submit2" value="Submit" src="images/du-btn-submit.jpg" alt="submit"  /></td>
      <td width="60" align="left" valign="top"></td>
      </tr>
      </table>
	  </form>

	  </div>
      </div>
	  </div> 	  
  	<?php include('footer.php');?>
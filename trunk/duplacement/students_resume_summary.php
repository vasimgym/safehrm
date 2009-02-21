<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

$studentid = $_SESSION['stUserID'];
$select = mysql_query("select * from dup_students where st_id='$studentid' ");
$selectresult = mysql_fetch_array($select);

$maxnumber = 0;
$selectexp = mysql_query("select max(ex_number) as maxnumber from dup_studentexp where ex_st_id='$studentid' ");
$maxnres = mysql_fetch_array($selectexp);
$maxnumber = $maxnres['maxnumber'];

include('studentheader.php');
?>

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
      <img src="images/nav-img-editpro.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />    </div>
	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	  <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; padding-bottom:5px; padding-right:10px; 
      padding-top:10px; width:575px; float:left; line-height:18px;">

		<span class="name"><?php echo $selectresult['st_name'];?></span><br /><br />
		<div style="width:570px; padding-left:10px;">
	 	<table width="570" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="160" align="left" valign="top">
   		<strong>Address:</strong><br />
        <?php echo nl2br($selectresult['st_address']); ?></td>
        <td width="5" align="center" valign="top"></td>

        <td width="150" align="left" valign="top">
   		<strong>Contact No.:</strong><br />
        <?php echo nl2br($selectresult['st_mobile']); ?>(M),<br /> 
        <?php echo nl2br($selectresult['st_contact_no']); ?>(R)<br /></td>
        <td width="5" align="left" valign="top">&nbsp;</td>

        <td align="left" valign="top">
   		<strong>EMail Id:</strong><br />
   		<?php echo $selectresult['st_email']; ?> </td>
        <td width="50" align="center" valign="top"><a href="#" class="link">..edit</a></td>
        </tr>
      	</table><br /><br />
	 	</div>
		
		<span class="names">RESUME SUMMARY</span><br /><br />
       
  		<div style="width:570px; padding-left:10px;">
	 	<table width="570" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="140" align="left" valign="top">Key Skill</td>
        <td width="20" align="center" valign="top">:</td>
        <td width="0" align="left" valign="top"><?php echo nl2br($selectresult['st_keyskills']); ?></td>
        <td width="50" align="center" valign="top"><a href="#" class="link">..edit</a></td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
		
		<?php $k = 1;
			for ($n=1; $n <= $maxnumber; $n++)  { 
				$expsql 	= mysql_query("select * from dup_studentexp where ex_st_id='$studentid' and ex_number='$n' ");
				$expresult 	= mysql_fetch_array($expsql);
				if(!empty($expresult))
				{
				
			?>
			
        <tr>
        <td width="140" height="20" align="left" valign="top"> <strong>Experience <?php echo $k; ?></strong></td>
        <td width="20" height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top"><?php echo $expresult['ex_duration']; ?></td>
        <td width="50" align="center" valign="top"><a href="#" class="link">..add</a></td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Functional Area</td>
        <td width="20" height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top">
          <?php echo $options = ShowValue("dup_functions", "functionid", "functionname", $expresult['ex_function']); ?>
        </td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Industry</td>
        <td width="20" height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top">
          <?php echo $options = ShowValue("dup_industry", "industryid", "industryname", $expresult['ex_industry']); ?>
        </td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Salary</td>
        <td width="20" height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top"><?php echo $options = ShowValue("dup_salary", "salaryid", "salaryname", $expresult['ex_remuneration']); ?></td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
		
		<?php $k++;
			} 
		}?>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Qualification</td>
        <td width="20" height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top"><?php echo ShowValue("dup_coursetypes", "id", "coursename", $selectresult['st_pg_qualification']); ?><br />
          <?php echo ShowValue("dup_coursetypes", "id", "coursename", $selectresult['st_ug_qualification']); ?></td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Location</td>
        <td height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top"><?php echo ShowValue("dup_location", "locationid", "name", $selectresult['st_location']); ?></td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="140" height="20" align="left" valign="top">Date of Birth (Gender)</td>
        <td height="20" align="center" valign="top">:</td>
        <td width="0" height="20" align="left" valign="top"><?php echo $selectresult['st_dob']; ?> (<?php echo $selectresult['st_gender']; ?>)</td>
        <td width="50" align="center" valign="top">&nbsp;</td>
        </tr>
        <tr>
        <td width="140" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        <td width="50" align="center" valign="top"></td>
        </tr>
      	</table>
	 	<br /></div>

		<span class="names">BRIEF PROFILE</span><br /><br />

		<div style="width:570px; padding-left:10px;">
		  <table width="570" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="140" align="left" valign="top">Summery</td>
              <td width="20" align="center" valign="top">:</td>
              <td width="0" align="left" valign="top"><?php echo nl2br($selectresult['st_keyskills']); ?></td>
              <td width="50" align="center" valign="top"><a href="#" class="link">..edit</a></td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <?php $k = 1;
			for ($n=1; $n <= $maxnumber; $n++)  { 
				$expsql 	= mysql_query("select * from dup_studentexp where ex_st_id='$studentid' and ex_number='$n' ");
				$expresult 	= mysql_fetch_array($expsql);
				if(!empty($expresult))
				{
				
			?>
            <tr>
              <td width="140" height="20" align="left" valign="top"><strong>Experience <?php echo $k; ?></strong></td>
              <td width="20" height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo $expresult['ex_duration']; ?></td>
              <td width="50" align="center" valign="top"><a href="#" class="link">..add</a></td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td width="140" height="20" align="left" valign="top">Functional Area</td>
              <td width="20" height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo $options = ShowValue("dup_functions", "functionid", "functionname", $expresult['ex_function']); ?> </td>
              <td width="50" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td width="140" height="20" align="left" valign="top">Industry</td>
              <td width="20" height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo $options = ShowValue("dup_industry", "industryid", "industryname", $expresult['ex_industry']); ?> </td>
              <td width="50" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td width="140" height="20" align="left" valign="top">Salary</td>
              <td width="20" height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo $options = ShowValue("dup_salary", "salaryid", "salaryname", $expresult['ex_remuneration']); ?></td>
              <td width="50" align="center" valign="top">&nbsp;</td>
            </tr>
            <?php $k++;
			} 
		}?>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td width="140" height="20" align="left" valign="top">Qualification</td>
              <td width="20" height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo ShowValue("dup_coursetypes", "id", "coursename", $selectresult['st_pg_qualification']); ?><br />
                  <?php echo ShowValue("dup_coursetypes", "id", "coursename", $selectresult['st_ug_qualification']); ?></td>
              <td width="50" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td width="140" height="20" align="left" valign="top">Location</td>
              <td height="20" align="center" valign="top">:</td>
              <td width="0" height="20" align="left" valign="top"><?php echo ShowValue("dup_location", "locationid", "name", $selectresult['st_location']); ?></td>
              <td width="50" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
            <tr>
              <td height="20" align="left" valign="top">Date of Birth (Gender)</td>
              <td height="20" align="center" valign="top">:</td>
              <td height="20" align="left" valign="top"><?php echo $selectresult['st_dob']; ?> (<?php echo $selectresult['st_gender']; ?>)</td>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" colspan="4" align="left" valign="top"><textarea cols="50" rows="14" style="border:none"><?php echo $selectresult['st_textresume']; ?> </textarea></td>
            </tr>
            <tr>
              <td height="20" colspan="4" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="140" height="5" align="left" valign="top"></td>
              <td height="5" align="center" valign="top"></td>
              <td width="0" height="5" align="left" valign="top"></td>
              <td width="50" align="center" valign="top"></td>
            </tr>
          </table>
	    <br /></div>
	  	<br /><br /><br /><br /><br /><br />
		</div>
  	  </div>
		</div> 	  
  	<?php include('footer.php');?>
<?php
session_start();
include('../include/config.php');
include('../include/commonfunctions.php');

if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

// select records
$startlimit = 0;
$nextlimit = 10;

$sql = "select * from dup_students limit $startlimit, $nextlimit";
$res = mysql_query($sql);

include("header.php");?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>

	<div align="left" class="adminright">
    
    <div style="width:600px; padding-top:5px;">
    
    <div style="width:600px;">
      
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td width="150" height="20" align="left" valign="middle"><span class="blue"><strong> VIEW STUDENTS</strong></span></td>
    <td width="175" height="20" align="left" valign="middle"></td>
    <td width="105" height="20" align="left" valign="middle"></td>
    <td width="60" height="20" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"></td>
    <td width="45" height="20" align="left" valign="middle"><a href="admin_students.php" class="link">..back</a></td>
  	</tr>
  	<tr>
    <td width="30" height="15" align="left" valign="middle"></td>
    <td width="150" height="15" align="left" valign="middle"></td>
    <td width="175" height="15" align="left" valign="middle"></td>
    <td width="105" height="15" align="left" valign="middle"></td>
    <td width="60" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
    <td width="45" height="15" align="left" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">Keyword</td>
    <td height="30" align="left" valign="middle"><input name="key" type="text" class="form" id="key" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">UG Qualification</td>
    <td height="30" align="left" valign="middle"><select id="ugcourse" name="UGCOURSE" style="width:175px;" class="form">
      <option value="-1" selected="selected" >-- UG Qualification --</option>
      <option value="1"  >Not Pursuing</option>
      <option value="2"  >B.A</option>
      <option value="3"  >B.Arch</option>
      <option value="4"  >BCA</option>
      <option value="5"  >B.B.A</option>
      <option value="6"  >B.Com</option>
      <option value="7"  >B.Ed</option>
      <option value="8"  >BDS</option>
      <option value="9"  >BHM</option>
      <option value="10"  >B.Pharma</option>
      <option value="11"  >B.Sc</option>
      <option value="12"  >B.Tech/B.E.</option>
      <option value="13"  >LLB</option>
      <option value="14"  >MBBS</option>
      <option value="15"  >Diploma</option>
      <option value="16"  >BVSC</option>
      <option value="9999"  >Other</option>
    </select></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">:: College</td>
    <td height="30" align="left" valign="middle"><input name="inst" type="text" class="form" id="inst" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">:: Year of Passing</td>
    <td height="30" align="left" valign="middle"><input name="yop" type="text" class="form" id="yop" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">PG Qualification</td>
    <td height="30" align="left" valign="middle">
    <select id="pgcourse" name=PGCOURSE  class="form" style="width:175px;">
      <option value="-1" selected >-- PG Qualification --</option>
      <option value="1"  >CA</option>
      <option value="2"  >CS</option>
      <option value="3"  >ICWA</option>
      <option value="4"  >Integrated PG</option>
      <option value="5"  >LLM</option>
      <option value="6"  >M.A</option>
      <option value="7"  >M.Arch</option>
      <option value="8"  >M.Com</option>
      <option value="9"  >M.Ed</option>
      <option value="10"  >M.Pharma</option>
      <option value="11"  >M.Sc</option>
      <option value="12"  >M.Tech</option>
      <option value="13"  >MBA/PGDM</option>
      <option value="14"  >MCA</option>
      <option value="15"  >MS</option>
      <option value="16"  >PG Diploma</option>
      <option value="17"  >MVSC</option>
      <option value="18"  >MCM</option>
      <option value="9999"  >Other</option>
    </select></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">:: College</td>
    <td height="30" align="left" valign="middle"><input name="inst" type="text" class="form" id="inst" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">:: Year of Passing</td>
    <td height="30" align="left" valign="middle"><input name="yop" type="text" class="form" id="yop" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">Age </td>
    <td height="30" align="left" valign="middle"><input name="inst" type="text" class="form" id="inst" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">Location</td>
    <td height="30" align="left" valign="middle"><input name="yop" type="text" class="form" id="yop" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"><input type="image" src="../images/du-btn-search.jpg" name="submit2" id="submit2" value="Submit" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
	</table>
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="right" valign="top"></td>
  	</tr>
  	<tr>
    <td width="100" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-addasagroup.jpg" name="submit3" id="submit3" value="Submit" /></td>
    <td width="110" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-send.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="75" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-send2.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="120" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-save.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="50" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-delete.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="50" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-edit.jpg" name="submit" id="submit" value="Submit" /></td>
    <td height="40" align="right" valign="top">
    <select name="pages" class="formc" id="pages">
    <option selected="selected">View 10</option>
    <option>20</option>
    <option>30</option>
    <option>40</option>
    <option>50</option>
    </select></td>
  	</tr>
	</table>

	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle">
    <input type="checkbox" name="all_select" id="all_select" />    </td>
    <td width="135" align="left" valign="middle"><strong>Student</strong></td>
    <td width="5" align="left" valign="middle"></td>
    <td width="150" align="left" valign="middle"><strong>Resume Summary</strong></td>
    <td width="5" align="left" valign="middle"></td>
    <td width="105" align="left" valign="middle"><strong>Key Skills</strong></td>
    <td width="60" align="left" valign="middle"><strong>Status</strong></td>
    </tr>
  	<tr>
    <td width="30" height="5" align="left" valign="middle"></td>
    <td width="135" height="5" align="left" valign="middle"></td>
    <td width="5" height="5" align="left" valign="middle"></td>
    <td width="150" height="5" align="left" valign="middle"></td>
    <td width="5" height="5" align="left" valign="middle"></td>
    <td width="105" height="5" align="left" valign="middle"></td>
    <td width="60" height="5" align="left" valign="middle"></td>
    </tr>
	<?php while($rs = mysql_fetch_array($res)) { 
			$st_id = $rs['st_id'];
	?>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="135" height="30" align="left" valign="middle"><a href="admin_search_students.php?st_id=<?php echo $rs['st_id']; ?>" class="link"><?php echo $rs['st_name']; ?></a></td>
    <td width="5" align="left" valign="middle"></td>
    <td width="150" height="30" align="left" valign="middle"><?php echo $rs['st_resumesummery']; ?></td>
    <td width="5" align="left" valign="middle"></td>
    <td width="105" height="30" align="left" valign="middle"><?php echo $rs['st_keyskills']; ?></td>
    <td width="60" height="30" align="left" valign="middle"><?php echo $rs['st_status']; ?></td>
    </tr>
	<?php } ?>  	
	</table>      
   	  </div>
		</div>
    	  </div>
	   	    </div>				
          <?php include("footer.php");?>
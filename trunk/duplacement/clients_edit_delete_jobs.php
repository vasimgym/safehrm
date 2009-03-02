<?php 
session_start();
if (empty($_SESSION['clUserID']))
{
	header("location:signin.php");
}
include('include/config.php');
include('include/commonfunctions.php');

$clientid = $_SESSION['clUserID'];
$sql = "select * from dup_jobs where job_cl_id='$clientid' ";
$res = mysql_query($sql);
include("header.php");
?>

	<div align="left" style="text-align:justify; float:left; overflow:hidden;">
	  <div class="nav">
      <div class="navbar"> <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> 
      <img src="images/nav-img-clients.jpg" alt="clients" style="float:left; padding-left:4px; padding-top:8px;"/> 
      <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
	  <div class="navbarB">
      <?php include("clientmenu.php"); ?>
	  </div>

	<div class="navmain">
   	<div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-editajob.jpg" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />        </div>
		<div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;">
        <div style="float:right; padding-top:5px; padding-right:3px;">
        <select name="pages" class="formc" id="pages">
	    <option selected="selected">View 10</option>
    	<option>view 20</option>
	    <option>view 30</option>
	    <option>view 40</option>
	    <option>view 50</option>
        </select>
        </div>
        </div>
	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;">
      <table width="580" border="0" cellspacing="0" cellpadding="0">
        <tr>
		<td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select" id="all_select" /></td>
        <td width="220" height="30" align="left" valign="middle"><strong>Title</strong></td>
        <td width="100" align="center" valign="middle"><strong>Posting date</strong></td>
        <td width="60" align="left" valign="middle"><strong>Status</strong></td>
        <td width="70" align="left" valign="middle"><strong>Response</strong></td>
        <td width="40" height="30" align="center" valign="middle"><strong>Edit</strong></td>
        <td width="10" align="left" valign="middle"></td>
        <td width="50" align="center" valign="middle"><strong>Delete</strong></td>
        </tr>
      </table>
    </div>

	<div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:580px; float:left;">
      <table width="580" border="0" cellspacing="0" cellpadding="0">
	  <?php while($result = mysql_fetch_array($res)) 
	  	{
		
		?>
        <tr>
        <td width="30" height="30" align="left" valign="top"><input type="checkbox" name="all_select" id="all_select" /></td>
        <td width="220" height="30" align="left" valign="top"><?php echo $result['job_title']; ?></td>
        <td width="100" height="30" align="center" valign="top"><?php echo $result['job_post_date']; ?></td>
        <td width="60" height="30" align="left" valign="top"><?php echo $result['job_status']; ?></td>
        <td width="70" height="30" align="center" valign="top"><?php echo $result['job_totalresponse']; ?></td>
        <td width="40" height="30" align="center" valign="top"><a href="postjob.php?id=<?php echo $result['job_id'];?>&act=edit"><img src="images/admin-editII.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
        <td width="10" height="30" align="center" valign="top">|</td>
        <td width="50" height="30" align="center" valign="top"><img src="images/admin-delII.jpg" alt="edit" width="15" height="16" /></td>
        </tr>
		<?php } ?>
        
        <tr>
        <td width="30" height="30" align="left" valign="top"></td>
        <td width="220" height="30" align="left" valign="top"></td>
        <td width="100" height="30" align="center" valign="top"></td>
        <td width="60" height="30" align="left" valign="top"></td>
        <td width="70" height="30" align="center" valign="top"></td>
        <td width="40" height="30" align="center" valign="top"></td>
        <td width="10" height="30" align="center" valign="top"></td>
        <td width="50" height="30" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="30" height="30" align="left" valign="top"></td>
        <td width="220" height="30" align="left" valign="top"></td>
        <td width="100" height="30" align="center" valign="top"></td>
        <td width="60" height="30" align="left" valign="top"></td>
        <td width="70" height="30" align="center" valign="top"></td>
        <td width="40" height="30" align="center" valign="top"></td>
        <td width="10" height="30" align="center" valign="top"></td>
        <td width="50" height="30" align="center" valign="top"></td>
        </tr>
        <tr>
        <td width="30" height="30" align="left" valign="top"></td>
        <td width="220" height="30" align="left" valign="top"></td>
        <td width="100" height="30" align="center" valign="top"></td>
        <td width="60" height="30" align="left" valign="top"></td>
        <td width="70" height="30" align="center" valign="top"></td>
        <td width="40" height="30" align="center" valign="top"></td>
        <td width="10" height="30" align="center" valign="top"></td>
        <td width="50" height="30" align="center" valign="top"></td>
        </tr>
      </table>
	  </div>
	  </div>
	  </div> 	  
  	 <?php include("footer.php"); ?>
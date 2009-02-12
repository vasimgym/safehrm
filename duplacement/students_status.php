<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

include('studentheader.php');
?>
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
        <img src="images/nav-left-bar.jpg" style="float:left" />
        <img src="images/nav-img-uplpht.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/>
        <img src="images/nav-right-bar.jpg" style="float:right" />      
      </div>

	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	  <div style="height:500px;  background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
	  <table width="580" border="0" cellspacing="0" cellpadding="0"><tr><td align="right" valign="top"><table width="580" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="190" height="25" align="left" valign="top"><strong>Subscription Status</strong></td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td width="350" height="25" align="left" valign="top">You have not <a href="#" class="linkz">registered</a> yet!</td>
      </tr>
      <tr>
      <td width="190" height="25" align="left" valign="top"></td>
      <td height="25" align="left" valign="top"></td>
      <td width="350" height="25" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="190" height="25" align="left" valign="top"></td>
      <td height="25" align="left" valign="top"></td>
      <td width="350" height="25" align="left" valign="top"></td>
      </tr>

      </table></td>
      </tr>
	  </table>
	  </div>
      </div>
	  </div> 	  
  	<?php include('footer.php');?>
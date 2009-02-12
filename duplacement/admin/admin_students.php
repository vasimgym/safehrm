<?php
session_start();
include('../include/config.php');
if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}


include("header.php");?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>


	<div align="left" class="adminright">
   
    <div style="width:600px; height:55px;">
	
      <div style="width:65px; height:55px; float:left;"><img src="../images/admin-can.jpg" alt="admin" /></div>
   	
      <div style="width:200px; height:55px; float:left;"><br />
      <span class="blue"><strong>MANAGE CANDIDATE</strong></span><br />Create or manage, admin<br />and user </div>

	  <div style="width:335px; height:55px; float:left;" align="right">..<a href="admin_home.php" class="link">Home</a></div>

    </div>

      <div style="height:40px;"></div>

    <div style="width:530px; height:55px; padding-left:40px;">
      
      <div style="width:25px; height:55px; float:left;"><img src="../images/admin-star.jpg" alt="star" width="16" height="16" /></div>
   	  
      <div class="linkA" style="width:250px; height:55px; float:left;"><span class="blue"><strong>VIEW CANDIDATE</strong></span><br />
      
      <a href="admin_students_view.php" class="linkA">Create or manage, admin<br />and user panel.</a>    </div>
   	
	  <div style="width:25px; height:55px; float:left;"><img src="../images/admin-star.jpg" alt="star" width="16" height="16" /></div>
   	  
      <div class="linkA" style="width:200px; height:55px; float:left;"><span class="blue"><strong>MANAGE GROUPS</strong></span><br />
      
      <a href="admin_students_manage.php" class="linkA">Create or manage, admin<br />and user panel.</a>
    
	</div>

	</div>

    </div>

    </div>

    <?php include("footer.php");?>
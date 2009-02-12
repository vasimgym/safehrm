<?php
session_start();
include('../include/config.php');
if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}
include("header.php");
?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>
          <div align="left" class="adminright">
          <div style="width:530px; height:55px;">
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-adm.jpg" alt="admin" border="0" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <span class="blue"><strong>ADMIN</strong></span><br />
              <a href="admin_admin.php" class="linkA">Create or manage, admin<br />
                and user panel.</a> </div>
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-add.jpg" alt="add_content" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <span class="blue"><strong>ADD CONTENT</strong></span><br />
                <a href="admin_add_content.php" class="linkA">To add contents for admin <br />
                  and users.</a></div>
          </div>
          <div style="height:30px;"></div>
          <div style="width:530px; height:55px;">
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-can.jpg" alt="candidate" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <strong class="blue">MANAGE STUDENTS</strong><br />
                <a href="admin_students.php" class="linkA">Create or manage, admin<br />
                  and user panel.</a> </div>
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-cont.jpg" alt="content" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <span class="blue"><strong>CONTENT PAGES</strong></span><br />
                <a href="admin_content.php" class="linkA">Create or manage, admin<br />
                  and user panel.</a> </div>
          </div>
          <div style="height:30px;"></div>
          <div style="width:530px; height:55px;">
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-emp.jpg" alt="employer" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <span class="blue"><strong>MANAGE CLIENTS</strong></span><br />
                <a href="admin_clients.php" class="linkA">Create or manage, admin<br />
                  and user panel.</a> </div>
            <div style="width:65px; height:55px; float:left;"><img src="../images/admin-oth.jpg" alt="others" /></div>
            <div style="width:200px; height:55px; float:left;"><br />
                <span class="blue"><strong>OTHERS</strong></span><br />
                <a href="admin_others.php" class="linkA">Create or manage, admin<br />
                  and user panel.</a> </div>
        </div>
       </div>
      </div>
     <?php include("footer.php");?>
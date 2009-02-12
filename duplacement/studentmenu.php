<?php
session_start();
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}
?>
<div class="navbardata">
<br /><a href="studenthome.php" class="link">Home</a><br />
<br /><a href="students_edit_profile.php" class="link">Edit Profile</a><br />
<br /><a href="students_personal_profile.php" class="link">Personal Profile</a><br />
<br /><a href="students_update_your_profile.php" class="link">Update your profile</a><br />
<br /><a href="students_resume_summary.php" class="link">Resume Summary</a><br />
<br /><a href="students_status.php" class="link">Subscription details</a><br />
<br /><a href="students_changepass.php" class="link">Change Password</a><br />
<br />:::::::::::::::::::::::<br />
<br />
<br />Login: <?php echo $_SESSION['stUser']; ?> </div>
</div>
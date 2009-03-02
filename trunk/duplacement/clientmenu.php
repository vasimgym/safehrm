 <?php
session_start();
if (empty($_SESSION['clUser'])) {
  	header('location:signin.php');	
}
?>
 <div class="navbardata"><br />
                  <a href="clients_login_home.php" class="link">Home</a><br />
                <!--<br />
                  <a href="clients_my_profile.php" class="link">My Profile</a><br />
                <br />
                  <a href="clients_my_postings.php" class="link">My Postings</a><br />
                <br />
                  <a href="#" class="link">Edit Contact Info</a><br />
                <br />
                  <a href="clients_changepass.php" class="link">Change Password</a><br />
                <br /> -->
                :::::::::::::::::::::::<br />
                <br />
                <a href="postjob.php" class="link">Post a job</a><br />
                <br />
                <a href="clients_edit_delete_jobs.php" class="link">Edit/ Delete jobs</a><br />
                <!--<br />
                <a href="clients_manage_response.php" class="link">Manage Responses</a><br />
                <br />
                <a href="client_status.php" class="link">Check your status</a><br />
                <br /> -->
                :::::::::::::::::::::::<br />
                <br />
                Login: <?php echo $_SESSION['stUser']; ?> </div>
            </div>
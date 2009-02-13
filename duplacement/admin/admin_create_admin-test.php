<?php
session_start();
include('../include/config.php');
include('../include/commonfunctions.php');

if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

if (!empty($_POST['edit'])) {
	$user_name  		= trim($_POST['user_name']); 
	$user_pass  		= trim($_POST['user_pass']);
	$user_class 		= trim($_POST['user_class']);
	$user_email         = trim($_POST['user_email']);
	$user_mobile		= trim($_POST['user_mobile']);
	$user_status		= trim($_POST['user_status']);

	$editid	= trim($_POST['editid']);
	
	$query	=  "update dup_admin  set
					user_name = '$user_name', user_pass = '$user_pass',
					user_email = '$user_email', user_class = '$user_class', user_mobile = '$user_mobile',
							user_status = '$user_status' where user_id = '$editid'";
	$eres = mysql_query($query);
	if (!empty($eres))
		triggerMessage("admin_create_admin", "Account edited successfully!");	
}


if (!empty($_POST['add'])) {
	$user_name  		= trim($_POST['user_name']); 
	$user_pass  		= trim($_POST['user_pass']);
	$user_class 		= trim($_POST['user_class']);
	$user_email         = trim($_POST['user_email']);
	$user_mobile		= trim($_POST['user_mobile']);
	$user_status		= trim($_POST['user_status']);
	
	$query	=  "INSERT INTO dup_admin ( user_id, user_name, user_pass, user_email,
	                        user_class, user_permission, user_created, user_mobile,
							user_status)							  
							VALUES 
							('','$user_name','$user_pass','$user_email','$user_class',
							'$user_permission', NOW(), '$user_mobile','$user_status')";
	$res = mysql_query($query);
	triggerMessage("admin_create_admin", "Admin Created Successfully!");	
}

if ($_GET['act'] == "edit")
{
	$editid = $_GET['id'];
	$esql = mysql_query("select * from dup_admin where user_id = '$editid' limit 1");
	$eresult = mysql_fetch_array($esql);
}
?>


<?php include("header.php");?>

	
	<div style="width:770px; float:left;">

	<?php include("menu.php");?>

	<div align="left" class="adminright">
    
    <div style="width:600px; padding-top:5px;">
    
    <div style="width:600px; float:left;">


</head>
<body>

<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});

$().ready(function() {
	
	
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			user_name: {
				required: true,
				minlength: 2
			},
			user_pass: {
				required: true,
				minlength: 5
			},
			
			user_email: {
				required: true,
				email: true
			}			
		},
		messages: {
			user_name: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			user_pass: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			user_email: "Please enter a valid email address"
			
		}
	});
		
});
</script>

<style type="text/css">
#signupForm { width: 670px; }
#signupForm label.error {
	margin-left: 10px;
	width: 150px;
	display: inline;
}
#newsletter_topics label.error {
	display: none;
	margin-left: 103px;
}
</style>


<div id="main">


<form class="cmxform" id="signupForm" method="get" action="">
	<fieldset>
		<legend>Validating a complete form</legend>
		<p>
			<label for="firstname">Firstname</label>
			<input id="firstname" name="firstname" />
		</p>
		<p>
			<label for="lastname">Lastname</label>
			<input id="lastname" name="lastname" />
		</p>
		<p>
			<label for="user_name">Username</label>
			<input id="user_name" name="user_name" />
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password" name="password" type="password" />
		</p>
		<p>
			<label for="confirm_password">Confirm password</label>
			<input id="confirm_password" name="confirm_password" type="password" />
		</p>
		<p>
			<label for="email">Email</label>
			<input id="email" name="email" />
		</p>
		<p>
			<label for="agree">Please agree to our policy</label>
			<input type="checkbox" id="agree" name="agree" />
		</p>
		<p>
			<label for="newsletter">I'd like to receive the newsletter</label>
			<input type="checkbox" id="newsletter" name="newsletter" />
		</p>
		
		<p>
			<input class="submit" type="submit" value="Submit"/>
		</p>
	</fieldset>
</form>



</div>
	  </div>
		</div>
    	  </div>
    		</div>
           <?php include("footer.php");?>
<?php
	session_start();
	if(empty($_SESSION["sess_teacher_id"])) {
		header("location:index.php");
		exit;
	}
	include("../include/config.php");
	
 
  	if($_SERVER['REQUEST_METHOD']=="POST"){
	$flag=0;
	$button = $_POST["button"];
	if($button=="Save"){
		$categoryname = trim(stripslashes($_POST["categoryname"]));
		$ok = mysql_query("INSERT INTO student_category (categoryname) VALUES('$categoryname')");	
		if($ok) $flag=1;
	}

	if($button=="Edit"){
		$editid = $_POST["editid"];
		$categoryname = trim(stripslashes($_POST["categoryname"]));
		$ok = mysql_query("UPDATE `student_category` SET categoryname='$categoryname'  WHERE id='$editid' ");
		
		if($ok) $flag=1;
	}
	
	if($flag==1){
      //now close the window (in case of success)
      echo "<script>\n";
      echo "window.opener.location.reload();\n";
      echo "window.close();\n";
      echo "</script>\n";
    }

  }

if($_GET["action"]=="edit"){
	$editid = $_GET["editid"];
	$edit_cat = "
			SELECT categoryname
			FROM `student_category`
			WHERE id=$editid;
			";
	$edit_res = mysql_query($edit_cat);
	$row_cat = mysql_fetch_array($edit_res);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/style.css" rel="stylesheet" type="text/css">

<title><?php echo $title;?></title>
<script src="../js/js.js"></script>
</head>
<body style=" background-image:url();background-color:#CCCCCC">
<p><?php echo $error;?></p>
<form action="add_categories.php" method="post" name="form1" onSubmit="return categoryform();">
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td>
    <h3><?php if($action=="edit") echo "Edit"; else echo "Add";?>
        Categories </h3>
    <table cellpadding="3" cellspacing="3" class="main-content-table">
	<tbody>
	<tr>
       <td class="head"><b>Category Name:</b></td>
       <td><input class="input-field" name="categoryname" value="<?php echo $row_cat['categoryname'];?>" type="text" size="35"></td>
	</tr>
	
	<tr>
       <td class="news-text" align="center" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php if($_GET["action"]=="edit"){ ?>
			<input type="hidden" name="editid" value="<?php echo $editid;?>">
			<input class="button" name="button" value="Edit" type="submit">
			<?php }else{ ?>
			<input class="button" name="button" value="Save" type="submit">			
			<?php } ?>
		</td>
	</tr>
	</tbody></table>
    </td>
  </tr>
</table>
</form>
</body>
</html>

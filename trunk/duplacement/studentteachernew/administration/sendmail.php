<?php
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");
$sql = "SELECT * FROM teacher_information WHERE id='".$_SESSION["sess_teacher_id"]."'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$loginemail	= $row['emailid'];

if($_GET['id']) {
	$sid	= $_GET['id'];
	$query	= mysql_query("SELECT s_id, s_email FROM student_information WHERE s_id='$sid'");
	$rs		= mysql_fetch_array($query);
	$toemail= $rs['s_email'];
}
if (!empty($_POST['sendmail'])) {	
	$headers  = "MIME-Version: 1.0;\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
	$headers .= "From: info@student-teacher.com;\n";
	$msg		= $_POST['messagebody'];
	$subject	= $_POST['subject'];
	$emailto	= $_POST['tomail'];
	@mail($emailto, $subject, $msg, $headers);
	$err	= "Your message has been sent successfully";
}
?>
<script language="javascript" src="../js/js.js"></script>
<form name="senfrm" method="post" action="" onsubmit="return frmsendmail();">
  <table width="95%" border="0" cellspacing="3" cellpadding="3">
<?php if(!empty($err)) {?>
	<tr>
		<td colspan="2" class="orange" align="center"><font color="#FF9900"><?php echo $err;?></font></td>
	</tr>
<?php }?>
    <tr>
      <td>Mail To</td>
      <td><label>
        <input name="tomail" type="text" size="30" value="<?php echo $toemail;?>" readonly="readonly">
      </label></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><input name="subject" type="text" size="30"></td>
    </tr>
    <tr>
      <td colspan="2">Enter Text Message</td>
    </tr>
    <tr>
      <td colspan="2"><textarea name="messagebody" cols="55" rows="10"></textarea></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input type="submit" name="sendmail" value="Send">
      <input type="button" value="Close" onClick="window.close();"></td>
    </tr>
  </table>
</form>

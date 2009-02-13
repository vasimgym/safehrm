<?php
	session_start();
	require("../include/config.php");

	/* Expire Assignments*/

	$sql_exp		= mysql_query("SELECT * FROM teacher_information");
	$rs_exp			= mysql_fetch_array($sql_exp);
	$expired_day	= $rs_exp['assignmentperiod'];
	$currentdate = date('Y-m-d');
	
	$select = mysql_query("SELECT com_id, datediff( '$currentdate', com_date ) AS expired_days
				FROM teacher_comments
				WHERE com_status !='EXPIRED'");
	while ($rs = mysql_fetch_array($select)) {
	
		if ($rs['expired_days'] >= $expired_day) {
			
			$sql= mysql_query("UPDATE teacher_comments SET com_status = 'EXPIRED' WHERE com_id='".$rs["com_id"]."' ");
		}
		
	}


	/* End */
	
	
	
	if($_SERVER['REQUEST_METHOD']=="POST") 
	{
		$emailid 		= trim(stripslashes($_POST["emailid"]));
		$password 		= trim(stripslashes($_POST["password"]));
		$sql = "SELECT * FROM teacher_information WHERE emailid='$emailid' AND password='$password'";
		$res = mysql_query($sql);
		if(mysql_num_rows($res) > 0) {
			$row = mysql_fetch_array($res);
			$_SESSION["sess_teacher_id"] = $row["id"];
			$_SESSION["sess_teacher_email"] = $row["emailid"];
			header("location:myaccount.php");
			exit;
		} else {
			$error = "Incorrect EmailID or Password!";
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>index.htm</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../js/js.js"></script>
</head>
<body topmargin="5" leftmargin="0">
<div align="center">

<table border="0" width="816" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top" >
    
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
         
          <tr>
            <td width="100%" height="480" valign="top">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="1%"><img border="0" src="../images/lo1.gif" width="16" height="14"></td>
                <td width="98%" background="../images/lo3.gif"><img border="0" src="../images/lo3.gif" width="16" height="14"></td>
                <td width="1%"><img border="0" src="../images/lo4.gif" width="16" height="14"></td>
              </tr>
              <tr>
                <td width="1%" background="../images/lo2.gif"><img border="0" src="../images/lo2.gif" width="16" height="14"></td>
                <td width="98%" bgcolor="#FAFAFA" >
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="50%" valign="top"><img border="0" src="../images/login_page.gif" width="408" height="286"></td>
                      <td width="50%" valign="top">
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="100" height="200" valign="bottom"><span class="orange"><?php echo $error; ?></span></td>
                          </tr>
                          <tr>
                            <td width="100%">
                              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="90%" valign="top">
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" height="50">
                                      <tr>
                                        <td width="100%" height="25" valign="bottom"><img border="0" src="../images/lo_top.gif" width="353" height="37"></td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="4" background="../images/lo_mid.gif">
                                          <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="100%" valign="top"><span class="orange-large">Teacher Login </span><span class="blue-large"></span></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top">
											   <form action="index.php" method="post" name="form1" onSubmit="return Validateloginform();">
                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                 
                                                  
                                                  <tr>
                                                    <td width="10%" height="0"></td>
                                                    <td width="30%">&nbsp;</td>
                                                    <td width="2%"></td>
                                                    <td width="58%"></td>
                                                  </tr>
                                                  
                                                  <tr>
                                                    <td width="10%" height="25"></td>
                                                    <td class="gray-login" height="25">
                                                      <p align="right">Email Id:</p>                                                    </td>
                                                    <td height="25"></td>
                                                    <td height="25"><input name="emailid" type="text" value=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="10%" height="25"></td>
                                                    <td class="gray-login" height="25">  
                                                      <p align="right">  Password:</p>                                                    </td>
                                                    <td height="25"></td>
                                                    <td height="25"><input name="password" type="password" value=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="10%" height="0"></td>
                                                    <td width="30%"></td>
                                                    <td width="2%"></td>
                                                    <td width="58%" height="30" valign="bottom"><input type="image" alt="" border="0" src="../images/login.gif" width="71" height="24" >													</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="0"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td height="15" valign="bottom">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td width="10%" height="0"></td>
                                                    <td width="30%"></td>
                                                    <td width="2%"></td>
                                                    <td width="58%" height="15" valign="bottom">&nbsp;</td>
                                                  </tr>
                                                </table>
												</form>                                              </td>
                                            </tr>
                                          </table>                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="21" valign="top"><img border="0" src="../images/lo_bot.gif" width="353" height="19"></td>
                                      </tr>
                                    </table>                                  </td>
                                  <td width="10%" valign="top" height="0"></td>
                                </tr>
                              </table>                            </td>
                          </tr>
                        </table>                      </td>
                    </tr>
                    <tr>
                      <td width="50%" valign="top"></td>
                      <td width="50%" valign="top">&nbsp;                      </td>
                    </tr>
                  </table>                </td>
                <td width="1%" valign="top" background="../images/lo5.gif"><img border="0" src="../images/lo5.gif" width="16" height="14"></td>
              </tr>
              <tr>
                <td width="1%"><img border="0" src="../images/lo8.gif" width="16" height="37"></td>
                <td width="98%" background="../images/lo7.gif"><img border="0" src="../images/lo7.gif" width="16" height="37"></td>
                <td width="1%"><img border="0" src="../images/lo6.gif" width="16" height="37"></td>
              </tr>
            </table>            </td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</div>
</body>
</html>

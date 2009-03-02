<?php 
session_start();
if (empty($_SESSION['clUserID']))
{
	header("location:signin.php");
}
include("header.php"); ?>
	<div align="left" style="text-align:justify; float:left; overflow:hidden;">
	  <div class="nav">
      <div class="navbar"> <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> 
      <img src="images/nav-img-clients.jpg" alt="clients" style="float:left; padding-left:4px; padding-top:8px;"/> 
      <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
	  <div class="navbarB">
      <?php include("clientmenu.php"); ?>
      </div>
    </div>

	<div class="navmain">
   	<div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-recent.jpg" alt="recentjobs" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />    </div>

	<div class="navmaindata">
	<table width="580" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg"><strong class="blue">| Job Title</strong></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg"><strong class="blue">Response</strong></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg"> | 
    <a href="clients_jobs_details.html" class="link">Part Time Trainers for a Banking Program, Delhi</a></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg">
    <a href="clients_jobs_response.html" class="link">0056</a></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg">| 
    <a href="clients_jobs_details.html" class="link">Part Time PHP coder, Delhi</a></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg">
    <a href="clients_jobs_response.html" class="link">0122</a></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg">| 
    <a href="clients_jobs_details.html" class="link">Part Time Placement Co-ordinator for a College in Janakpuri, Delhi</a></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg">
    <a href="clients_jobs_response.html" class="link">0060</a></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg">| 
    <a href="clients_jobs_details.html" class="link">Part Time PHP coder, Delhi</a></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg">
    <a href="clients_jobs_response.html" class="link">0456</a></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg">| 
    <a href="clients_jobs_details.html" class="link">Part Time Trainers for a Banking Program, Delhi</a></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg">
    <a href="clients_jobs_response.html" class="link">0007</a></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg">0021</td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg"></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg">0047</td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg"></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg"></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg"></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg"></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table2.jpg"></td>
    <td height="30" valign="middle" background="images/nav-bar-table2.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table2.jpg"></td>
	</tr>
	<tr>
	<td height="30" align="left" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="10" height="30" valign="middle" background="images/nav-bar-table1.jpg"></td>
	<td width="70" height="30" align="center" valign="middle" background="images/nav-bar-table1.jpg" class="blue">
    <a href="clients_manage_response_viewall.html" class="link">view all</a></td>
	</tr>      
	</table>

    </div>		
	</div>
	<div class="navmain">
   	  <div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-jobs.jpg" alt="job&amp;response" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-img-subsc.jpg" alt="" style="float:right; padding-right:52px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />
      </div>

	  <div class="navmaindata">
      <div style="width:380px; height:100px; float:left;">
      <br /><a href="clients_post_a_job.html" class="link">Post a job</a><br />
      <br /><a href="clients_edit_delete_jobs.html" class="link">Edit/ Delete jobs</a><br />
   	  <br /><a href="clients_manage_response.html" class="link">Manage Response</a><br />
      </div>

      <div style="width:200px; height:100px; float:left;">
      <br /><a href="client_status.html" class="link">Check you status</a><br />
      </div>
	  </div>		
	  </div>
      </div>
  	<?php include("footer.php"); ?>
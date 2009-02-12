<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

include('studentheader.php');
?>
	<div align="left" style="text-align:justify; float:left; overflow:hidden;">
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
      <img src="images/nav-img-welusr.jpg" alt="recentjobs" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" />    </div>

	<div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; 
      padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">

	<div style="width:300px; float:left; overflow:hidden;">
	<img src="images/nav-img-search.jpg" alt="searchjobs" style="padding-bottom:15px;" />
    <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td height="5" align="center" valign="top"></td>
      <td height="5" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top">Location</td>
      <td width="20" height="25" align="center" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top"><input type="text" name="job_title" id="job_title" style="width:196px;"/></td>
      </tr>
      <tr>
      <td width="70" height="22" align="left" valign="top">Job Type</td>
      <td width="20" height="22" align="center" valign="top">:</td>
      <td width="0" height="22" align="left" valign="top"><select name="Work_experience" class="form" id="workexp" style="width:200px;">
      <option value="0">-- Anything! --</option>
      <option value="1">Accounting, Auditing &amp; Finance</option>
      <option value="2">Administration &amp; Clerical</option>
      <option value="3">Advertising, Marketing &amp; Public Relations</option>
      <option value="4">Aerospace &amp; Defense</option>
      <option value="5">Arts, Entertainment &amp; Media</option>
      <option value="6">Banking &amp; Financial Services</option>
      <option value="7">Business &amp; Management</option>
      <option value="8">Business Intelligence &amp; Market Research</option>
      <option value="9">Community, Social Services &amp; Non profit</option>
      <option value="10">Construction, Property &amp; Surveying</option>
      <option value="11">Consultancy</option>
      <option value="12">Consumer Products &amp; FMCG</option>
      <option value="13">Creative &amp; Design</option>
      <option value="14">Education</option>
      <option value="15">Energy, Utilities &amp; Environmental Services</option>
      <option value="16">Engineering</option>
      <option value="17">Hospitality, Travel &amp; Tourism</option>
      <option value="18">Human Resources</option>
      <option value="20">Internet, eCommerce &amp; New Media</option>
      <option value="21">IT &amp; Telecommunications</option>
      <option value="22">Legal</option>
      <option value="23">Local Government &amp; Civil Service</option>
      <option value="24">Logistics, Transport, Purchasing &amp; Supply</option>
      <option value="25">Management Consultancy</option>
      <option value="26">Manufacturing</option>
      <option value="27">Medical &amp; Pharmaceutical</option>
      <option value="28">Publishing, Journalism &amp; Languages</option>
      <option value="30">Recruitment</option>
      <option value="31">Retail, Buying &amp; Merchandising</option>
      <option value="32">Sales</option>
      <option value="33">Science &amp; Research</option>
      <option value="34">Uniformed Services</option>
      </select></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="center" valign="top"></td>
      <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-search.jpg" name="submit" id="submit" value="Submit" /></td>
      </tr>
      <tr>
      <td width="70" height="25" align="left" valign="top"></td>
      <td height="25" align="center" valign="top"></td>
      <td width="0" height="25" align="left" valign="top"></td>
      </tr>
      </table>
      </div>
      
	<div style="width:240px; padding-left:35px; padding-top:5px; float:left; overflow:hidden; line-height:18px;">

	<img src="images/nav-img-job.jpg" alt="searchjobs" style="padding-bottom:15px;" /><br />

    <span class="blue"><strong>Orkash Management</strong></span> (Consulting)<br />
	Website: www.orkash.com<br />
	Designation: FMCG<br />
	<a href="#" class="linkz">..apply for job...</a>
    <br /><br />
    
    <span class="blue"><strong>Unifruiti</strong></span> (Sales)<br />
	Website: www.unifruiti.com<br />
	Designation: Sales manager<br />
	<a href="#" class="linkz">..apply for job...</a>
    <br /><br />

    <strong class="blue">9.9 Media</strong><br />
	Website: www.9dot9.in<br />
	Work Field: Event management.<br />
	<a href="#" class="linkz">..apply for job...</a>
    <br /><br />

    <strong class="blue">Factoring House</strong><br />
	Website: unavailable<br />
	Designation: Debt Recovery Agent<br />
	<a href="#" class="linkz">..apply for job...</a>
    <br /><br />

    </div>      
    </div>
	</div>

	<div class="navmain">
   	  <div class="navmainbar">
      <img src="images/nav-left-bar.jpg" style="float:left" />
      <img src="images/nav-img-myprofile.jpg" alt="job&amp;response" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-img-subsc.jpg" alt="" style="float:right; padding-right:94px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" /></div>

	  <div class="navmaindata">
      <div style="width:340px; height:100px; float:left;"><br />
      <a href="students_edit_profile.php" class="link">Resume Headline</a><br /><br />
      <a href="students_update_your_profile.php" class="link">I didn't upload my photograph.</a><br /><br />
   	  <a href="clients_manage_response.php" class="link">Last Updated CV: 12-Dec-2008</a><br />
      </div>

      <div style="width:200px; height:100px; float:left;"><br />
      You are not register yet.<br /><br />
      <a href="#" class="link">Go for Subscription.</a></div>
	  </div>		
	  </div>
      </div>
  	<?php include("footer.php"); ?>
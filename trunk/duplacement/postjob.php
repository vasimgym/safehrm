<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
include("clientheader.php"); ?>
	    <div align="left" style="text-align:justify; float:left;">
          <div class="nav">
            <div class="navbar"> <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> <img src="images/nav-img-clients.jpg" alt="clients" style="float:left; padding-left:4px; padding-top:8px;"/> <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
            <div class="navbarB">
             <?php include("clientmenu.php"); ?>
          </div>
	      <div class="navmain">
            <div class="navmainbar"> <img src="images/nav-left-bar.jpg" style="float:left" alt="navleft"/> <img src="images/nav-img-postajob.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/> <img src="images/nav-right-bar.jpg" style="float:right" alt="navright"/> </div>
	        <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	        <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:10px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:580px; float:left;">
              <table width="580" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="140" height="25" align="left" valign="top">Job Title</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><input name="job_title" type="text" class="form" id="job_title" size="27" /></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Job Profile</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><textarea name="job_description" cols="25" rows="3" class="form" id="job_description" style="width:168px;"></textarea></td>
                </tr>
                <tr>
                  <td height="3" align="left" valign="top"></td>
                  <td width="25" height="3" align="left" valign="top"></td>
                  <td width="0" height="3" align="left" valign="top"></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Candidate Profile</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><textarea name="job_st_requirement" cols="25" rows="3" class="form" id="job_st_requirement" style="width:168px;"></textarea></td>
                </tr>
                <tr>
                  <td height="3" align="left" valign="top"></td>
                  <td width="25" height="3" align="left" valign="top"></td>
                  <td width="0" height="3" align="left" valign="top"></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Education</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_highest_education" class="form" id="job_highest_education" style="width:174px;">
                      <option value="" selected="selected" >-- Highest Education Held --</option>
                     <?php coursetypes("2", $jobresult['job_highest_education']); ?>
                  </select></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Experience</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_experience" class="form" id="job_experience" style="width:174px;">
                      <option value="">-- Years of Experience --</option>
                      <option value="1" ><< 2 years</option>
                      <option value="2" >2 - 5 years</option>
                      <option value="3" >6 - 10 years</option>
                      <option value="4" >>> 10 years</option>
                  </select></td>
                </tr>
                <tr>
                  <td width="140" height="25" align="left" valign="top">Industry</td>
                  <td width="25" height="25" align="left" valign="top">:</td>
                  <td width="0" height="25" align="left" valign="top"><select name="job_industry" class="form" id="job_industry" style="width:174px;">
                      <option value="0" selected="selected" >-- Select Industry --</option>
                      <option value="Accounting/Taxation" >Accounting/ Taxation</option>
                      <option value="Advertising/PR/Events Management" >Advertising/ PR/ Events Management</option>
                      <option value="Architecture/Interior Design" >Architecture/ Interior Design</option>
                      <option value="Auto" >Auto</option>
                      <option value="Banking/Broking/Financial Services" >Banking/ Broking/ Financial Services</option>
                      <option value="BPO/ ITeS/KPO/Transcription" >BPO/ ITeS/KPO/ Transcription</option>
                      <option value="Consumer Durables" >Consumer Durables</option>
                      <option value="Consulting" >Consulting</option>
                      <option value="Defense/Government" >Defense/ Government</option>
                      <option value="Education/Teaching/Training" >Education/ Teaching/ Training</option>
                      <option value="Export/Import" >Export/ Import</option>
                      <option value="Fashion/Garments/Merchandising" >Fashion/ Garments/ Merchandising</option>
                      <option value="FMCG/Foods/Beverage" >FMCG/ Foods/ Beverage</option>
                      <option value="Hotels/Restaurants/Travel/Airlines" >Hotels/ Restaurants/ Travel/Airlines</option>
                      <option value="Healthcare/Medical/Hospital" >Healthcare/ Medical/Hospital</option>
                      <option value="Industrial Products/Machinery" >Industrial Products/ Machinery</option>
                      <option value="Insurance" >Insurance</option>
                      <option value="IT-Hardware" >IT-Hardware</option>
                      <option value="IT-Software" >IT-Software</option>
                      <option value="Legal" >Legal</option>
                      <option value="Media/Entertainment" >Media/ Entertainment</option>
                      <option value="NGO/Social Service" >NGO/Social Service</option>
                      <option value="Pharma/Biotech/Clinical Research" >Pharma/ Biotech/ Clinical Research</option>
                      <option value="Real Estate/Property" >Real Estate/ Property</option>
                      <option value="Recruitment/Employment" >Recruitment/ Employment</option>
                      <option value="Retail" >Retail</option>
                      <option value="Telecom/ISP" >Telecom/ ISP</option>
                      <option value="other" >Others</option>
                  </select></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Function</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><select name="job_function" class="required form" id="job_function" style="width:175px;">
                  <option value="" selected="selected" >-- Select Function --</option>
                  <?php echo $options = ListOptions("dup_functions", "functionid", "functionname", $jobresult['ex_function']); ?>
                </select></td>
                </tr>
                <td width="140" height="25" align="left" valign="top">Location (City)</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_location" type="text" class="form" id="job_location" size="27" /></td>
                <tr>
                <td width="140" height="25" align="left" valign="top">Salary</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_salary" type="text" class="form" id="job_salary" size="27" /></td>
                </tr>
                <tr>
                <td height="10" align="left" valign="top"></td>
                <td width="25" height="10" align="left" valign="top"></td>
                <td width="0" height="10" align="left" valign="top"></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Client name</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_clientname" type="text" class="form" id="job_clientname" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Contact Person</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_contact_person" type="text" class="form" id="job_contact_person" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Reference Id</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_reference_id" type="text" class="form" id="job_reference_id" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Address</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_address" type="text" class="form" id="job_address" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Location (City)</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="location" type="text" class="form" id="loc" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Contact No.</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_phone1" type="text" class="form" id="job_phone1" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top">Email Id</td>
                <td width="25" height="25" align="left" valign="top">:</td>
                <td width="0" height="25" align="left" valign="top"><input name="job_email" type="text" class="form" id="job_email" size="27" /></td>
                </tr>
                <tr>
                <td width="140" height="25" align="left" valign="top"></td>
                <td width="25" height="25" align="left" valign="top"></td>
                <td width="0" height="25" align="left" valign="top"><input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
	    <?php include("footer.php"); ?>
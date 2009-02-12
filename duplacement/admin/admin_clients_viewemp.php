<?php include("header.php");?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>

	<div align="left" class="adminright">

    <div style="width:600px; padding-top:5px;">

    <div style="width:600px;">
      
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td width="150" height="20" align="left" valign="middle"><span class="blue"><strong> VIEW EMPLOYER</strong></span></td>
    <td width="175" height="20" align="left" valign="middle"></td>
    <td width="105" height="20" align="left" valign="middle"></td>
    <td width="60" height="20" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"></td>
    <td width="45" height="20" align="left" valign="middle"><a href="admin_clients.php" class="link">..back</a></td>
	</tr>
  	<tr>
    <td width="30" height="15" align="left" valign="middle"></td>
    <td width="150" height="15" align="left" valign="middle"></td>
    <td width="175" height="15" align="left" valign="middle"></td>
    <td width="105" height="15" align="left" valign="middle"></td>
    <td width="60" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
    <td width="45" height="15" align="left" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">Industry</td>
    <td height="30" align="left" valign="middle"><select name="industry" class="form" id="ind" style="width:174px;">
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
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle">Location</td>
    <td height="30" align="left" valign="middle"><input name="inst" type="text" class="form" id="inst" size="27" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"><input type="image" src="../images/du-btn-search.jpg" name="submit2" id="submit2" value="Submit" /></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="left" valign="middle"></td>
    <td height="30" align="center" valign="middle"></td>
    <td width="45" height="30" align="center" valign="middle"></td>
  	</tr>
	</table>
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td height="15" align="left" valign="top"></td>
    <td height="15" align="left" valign="top"></td>
    <td height="15" align="left" valign="top"></td>
    <td height="15" align="left" valign="top"></td>
    <td height="15" align="left" valign="top"></td>
    <td height="15" align="right" valign="top"></td>
  	</tr>
  	<tr>
    <td width="100" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-addasagroup.jpg" name="submit3" id="submit3" value="Submit" /></td>
    <td width="110" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-send.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="75" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-send2.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="120" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-save.jpg" name="submit" id="submit" value="Submit" /></td>
    <td width="50" height="40" align="left" valign="top"><input type="image" src="../images/du-btn-delete.jpg" name="submit" id="submit" value="Submit" /></td>
    <td height="40" align="right" valign="top">
    <select name="pages" class="formc" id="pages">
    <option selected="selected">View 10</option>
    <option>20</option>
    <option>30</option>
    <option>40</option>
    <option>50</option>
    </select></td>
  	</tr>
	</table>

	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle">
    <input type="checkbox" name="all_select" id="all_select" />    </td>
    <td width="150" align="left" valign="middle"><strong>User name</strong></td>
    <td width="40" align="left" valign="middle"><strong>Post</strong></td>
    <td width="80" align="left" valign="middle"><strong>Company</strong></td>
    <td width="160" align="left" valign="middle"><strong>Email Id</strong></td>
    <td width="90" align="left" valign="middle"><strong>Mobile</strong></td>
    <td width="50" align="left" valign="middle"><strong>Status</strong></td>
    </tr>
  	<tr>
    <td width="30" height="10" align="left" valign="middle"></td>
    <td width="150" height="10" align="left" valign="middle"></td>
    <td width="40" align="left" valign="middle"></td>
    <td width="80" align="left" valign="middle"></td>
    <td width="160" height="10" align="left" valign="middle"></td>
    <td width="90" height="10" align="left" valign="middle"></td>
    <td width="50" height="10" align="left" valign="middle"></td>
    </tr>
 	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="150" height="30" align="left" valign="middle">Abhinav Saraswat</td>
    <td width="40" align="left" valign="middle">02</td>
    <td width="80" align="left" valign="middle">AVSARR</td>
    <td width="160" height="30" align="left" valign="middle">abhinav@avsarr.com</td>
    <td width="90" height="30" align="left" valign="middle">9999999999</td>
    <td width="50" height="30" align="left" valign="middle">Active</td>
    </tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select3" id="all_select3" /></td>
    <td width="150" height="30" align="left" valign="middle">Soma Chakroborty</td>
    <td width="40" align="left" valign="middle">12</td>
    <td width="80" align="left" valign="middle">EMPOWER</td>
    <td width="160" height="30" align="left" valign="middle">soma@avsarr.com</td>
    <td width="90" height="30" align="left" valign="middle">9898989898</td>
    <td width="50" height="30" align="left" valign="middle">Inactive</td>
	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select4" id="all_select4" /></td>
    <td width="150" height="30" align="left" valign="middle">Birendra kumar </td>
    <td width="40" align="left" valign="middle">15</td>
    <td width="80" align="left" valign="middle">AIRTEL</td>
    <td width="160" height="30" align="left" valign="middle">billoo@gmail.com</td>
    <td width="90" height="30" align="left" valign="middle">9875899875</td>
    <td width="50" height="30" align="left" valign="middle">Active</td>
	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select5" id="all_select5" /></td>
    <td width="150" height="30" align="left" valign="middle">Antul kumar rawat</td>
    <td width="40" align="left" valign="middle">10</td>
    <td width="80" align="left" valign="middle">VODAFONE</td>
    <td width="160" height="30" align="left" valign="middle">abhinav@rediffmail.com</td>
    <td width="90" height="30" align="left" valign="middle">9858985898</td>
    <td width="50" height="30" align="left" valign="middle">Active</td>
	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="150" height="30" align="left" valign="middle">Abhinav Saraswat</td>
    <td width="40" align="left" valign="middle">08</td>
    <td width="80" align="left" valign="middle">05</td>
    <td width="160" height="30" align="left" valign="middle">abhinav@avsarr.com</td>
    <td width="90" height="30" align="left" valign="middle">9999999999</td>
    <td width="50" height="30" align="left" valign="middle">Active</td>
    </tr>
	</table>
	  </div>
		</div>
    	  </div>
    		</div>
           <?php include("footer.php");?>
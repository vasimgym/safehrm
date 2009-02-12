<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

include('studentheader.php');
?>
  	<div style="width:770px; float:left;" align="left">
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
      <img src="images/nav-left-bar.jpg" style="float:left" alt="navleft"/>
      <img src="images/nav-img-updres.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/>
      <img src="images/nav-right-bar.jpg" style="float:right" alt="navright"/>      
      </div>
	  <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
	  <div style="height:500px;  background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
	  <table width="580" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="25" align="left" valign="top">Last updated profile</td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top">12-Dec-2008</td>
      <td width="60" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top">Upload  Resume</td>
      <td width="40" height="25" align="left" valign="top">: </td>
      <td height="0" align="left" valign="top"><a href="#" class="linkz">abhinav_cv.doc </a><strong>[word format]</strong></td>
      <td width="60" align="left" valign="top"><input name="submit" type="image" id="submit" value="Submit" src="images/du-btn-upload.jpg" alt="upload" /></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top">Copy or paste resume</td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top"><textarea name="description" cols="20" rows="8" class="form" id="description" style="width:220px;">OBJECTIVE:

Brief out your knowledge and experience in the field of accountancy.
E.g.: Record information about financial status of customers, keeping records of collection and status of accounts, identifying the underlying principles, reasons, or facts of information
And as an accounting manager, have a rich experience with ten years of work experience in accounting. Strong accounting and management skills with extensive knowledge in processes and accounting standards
PROFESSIONAL SYNOPSIS

Give a detailed explanation about your responsibilities in accounting, so as to make the reader feel you are the best person for the job
Mention the duties you did in accounting, and the results you received on the basis of your work.
Mention down the rewards you attained on the basis of your work result

Responsibilities

Mention your major responsibilities in your current company as per your work experience. E.g.: A highly experienced manager with ten years of wok experience in accounting. Strong accounting & management skills with extensive knowledge in processes and accounting standards.
Give a glimpse of your previous work-related experience, skill and knowledge.
ACADEMIC QUALIFICATION

This section should have minimum of three educational details. Always try to give full details regarding your education including degrees and awards received. You can write details as below:
General studies, XYZ High School Major, year
Graduation, XYZ College, year
Masters, XYZ College, Year
PROFESSIONAL QUALIFICATION

If you have done any relevant courses for previous jobs, include them to beef up your credentials Mention any certifications done related to your degree, certifications related to accounting software like Tally.
ORGANISATIONAL EXPERIENCE

Start with your most recent work experience at the top. Include all relevant or related experience, no matter how old. Avoid long gaps when you write your work history. If you have large gaps, try to cover up with a brief description of any kind of related job or experience during that time you did. If you’ve had many job changes in short span, be sure to explain why, e.g. it was a contract job, relocation Etc. Never blame your previous employer or previous job as you could be viewed as someone who is difficult to please, even if your arguments are legitimate.
You can use the below template to describe your work experience.
Tenure Company Name Designation
CORE COMPETENCIES

Accounting Skills
Mention all your accounting skills which will make the reader feel that your resume is outstanding. These include knowledge of specific computer skills, business software and specific tasks that you did.
Accounting Experience
Emphasize on your accounting related accomplishments and contributions you made in the organization.
Use as many key words and skill headings as possible. For example:
Ledger, Accounting standards
Management of A/R & A/P Accounts
Billing, Cost and Collections
Supervision of Accounting and Administrative Staff
Balance Sheet and Management Status Reports
Activities
List all your significant activities you did as a student and communal activities including organizations, student government, sports, and professional affiliations. Use action items to describe your responsibilities and accomplishments you did.
Use Keywords: Use extensively accounting related keywords and action items to describe your skills and accomplishments. Few Action Items as below can be used when constructing your statements:
Accruals | Advertising | Asset | Bad Debts | Balance Sheet | Bank & Cash | Bank Interest | Capital | Closing Stock | Cost of Sales | Creditors | Current Assets | Current Liabilities | Debtors | Accumulated Depreciation | Depreciation | Doubtful Debts charge | Doubtful Debts Provision | Drawings | Expenses | Fixed Assets | Fixtures & Fittings | Gross Profit | Land & Buildings | Light & Heat | Loan | Long Term Liabilities | Miscellaneous | Motor Vehicles | Net Assets | Net Book Value | Net Current Assets | Net Profit | Office Expenses | Opening Stock | Overdraft | Plant & Machinery | Prepayments | Profit | Profit & Loss | Purchases | Rent & Rates | Sales | Stock | Trading Account | Trading Profit & Loss | Travel Expenses | Wages & Salaries
</textarea></td>
      <td width="60" align="left" valign="bottom"><input name="submit3" type="image" id="submit3" value="Submit" src="images/du-btn-upload.jpg" alt="upload" /></td>
      </tr>
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td width="40" height="5" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"></td>
      <td width="60" align="left" valign="bottom"></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top"><strong>Upload Photograph </strong></td>
      <td width="40" height="25" align="left" valign="top">:</td>
      <td height="0" align="left" valign="top">
        <img src="images/img-snap.jpg" alt="upload" border="0"/> passport size (2 x 2 in) </td>
      <td width="60" align="left" valign="bottom"><input name="submit2" type="image" id="submit2" value="Submit" src="images/du-btn-upload.jpg" alt="upload" /></td>
      </tr>
      <tr>
      <td width="180" align="left" valign="top"></td>
      <td width="40" align="left" valign="top">&nbsp;</td>
      <td height="0" align="left" valign="top">&nbsp;</td>
      <td width="60" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
      <td height="5" align="left" valign="top"></td>
      <td width="40" height="5" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"></td>
      <td width="60" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="180" height="25" align="left" valign="top"></td>
      <td width="40" height="25" align="left" valign="top"></td>
      <td height="0" align="left" valign="top"></td>
      <td width="60" align="left" valign="top"></td>
      </tr>
      </table>

	  </div>
      </div>
	  </div> 	  
  	<?php include('footer.php');?>
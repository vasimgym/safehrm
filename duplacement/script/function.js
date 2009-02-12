function checkUncheckAll(form1)
	{
		var SelectAll = form1.selectAll;
		for ( var i=0; i < form1.elements.length; i++ )
		{
			var e = form1.elements[i];
			
			if (SelectAll.checked)
			{
				e.checked = true;
			}
			else
			{
				e.checked = false;
			}
		}
	}	


function registerform()
	{
		var valfrm = document.frmregister;		
		if(valfrm.username.value=="") {
			alert("Enter the username you want to login with.");
			valfrm.username.focus();
			return false;
		}
		if(valfrm.jspassword.value=="") {
			alert("Enter the password");
			valfrm.jspassword.focus();
			return false;
		}
		if(valfrm.jspassword.value.length < 6) {
			alert("Enter the password at least six characters length.");
			valfrm.jspassword.focus();
			return false;
		}
		if(valfrm.confirmpassword.value=="") {
			alert("Enter the confirmpassword");
			valfrm.confirmpassword.focus();
			return false;
		}
		if(valfrm.jspassword.value!=valfrm.confirmpassword.value) {
			alert("Confirm password does not match");
			valfrm.confirmpassword.focus();
			return false;
		}
		if(valfrm.name.value=="") {
			alert("Enter your name");
			valfrm.name.focus();
			return false;
		}
		if(valfrm.email.value=="") {
			alert("Enter your email");
			valfrm.email.focus();
			return false;
		}
		if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valfrm.email.value)) == false) {	
			alert("Invalid E-mail Address!!");
			valfrm.email.focus();
			return false;
		}
		/*if(valfrm.country.value==0) {
			alert("Select country name");
			valfrm.country.focus();
			return false;
		}*/
		if(valfrm.currentlocation.value==0) {
			alert("Select Your District.");
			valfrm.currentlocation.focus();
			return false;
		}
		if(valfrm.phonenumber.value=="") {
			alert("Enter your phone number");
			valfrm.phonenumber.focus();
			return false;
		}
		if(valfrm.year.value==0) {
			alert("Select your total experience in year");
			valfrm.year.focus();
			return false;
		}
		if(valfrm.month.value==0) {
			alert("Select your total experience in month after selected year or years");
			valfrm.month.focus();
			return false;
		}				
		if(valfrm.keyskills.value=="") {
			alert("Enter your key skill");
			valfrm.keyskills.focus();
			return false;
		}
		if(valfrm.resumeheadline.value=="") {
			alert("Enter the resume headline");
			valfrm.resumeheadline.focus();
			return false;
		}
		if(valfrm.functionarea.value==0) {
			alert("Select functional area");
			valfrm.functionarea.focus();
			return false;
		}
		if(valfrm.qualification.value==0) {
			alert("Select qualification");
			valfrm.qualification.focus();
			return false;
		}
	/*	if(valfrm.resume.value=="" && valfrm.copypasteresume.value=="") {
			alert("Please upload your resume or copy and paste resume");
			valfrm.resume.focus();
			return false;
		}
	*/	

		if(valfrm.resume.value=="") {
			alert("Please upload your resume.");
			valfrm.resume.focus();
			return false;
		}

		if(valfrm.resume.value!="") { 						
			var fileTypes=["doc","rtf"];// valid file types
			var source = valfrm.resume.value;			
			var ext=source.substring(source.lastIndexOf(".")+1,source.length).toLowerCase();			
			var c=0;
			for (var i=0; i<fileTypes.length; i++) {

				if (fileTypes[i]==ext) { c=1; break; }
			}
			if(c==0) {
				alert("Please upload your resume with file format of :\n\n"+fileTypes.join(", "));
				valfrm.resume.focus();
				return false;
			}
		}
		if(valfrm.js_code.value=="") {
			alert("Enter the Security Code.");
			valfrm.js_code.focus();
			return false;
		}
		if(valfrm.js_code.value!=valfrm.hid_code.value) {
					alert("Enter Correct Security Code. Code is Case Sensitive.");
					valfrm.js_code.focus();
					return false;
		}
	}
	
	// Recruiters register validation
	
	
	function recruiterform()
		{
				var valrec = document.frmrecruiter;
				if (valrec.username.value=="") {
					alert("Please Enter the username you want to login with");
					valrec.username.focus();
					return false;
				}
				if (valrec.password.value=="") {
					alert("Enter the password");
					valrec.password.focus();
					return false;
				}
				if (valrec.password.value.length < 6) {
					alert("Password length should be six characters minimum");
					valrec.password.focus();
					return false;
				}
				if (valrec.confirmpassword.value=="") {
					alert("Enter the confirm password");
					valrec.confirmpassword.focus();
					return false;
				}
				if (valrec.confirmpassword.value!=valrec.password.value) {
					alert("Confirm password does not match !!!");
					valrec.confirmpassword.focus();
					return false;
				}
				if (valrec.companyname.value=="") {
					alert("Enter company name");
					valrec.companyname.focus();
					return false;
				}
				if (valrec.masteremail.value=="") {
					alert("Enter the master/primerary email");
					valrec.masteremail.focus();
					return false;
				}
				if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valrec.masteremail.value)) == false) {	
					alert("Invalid E-mail Address!!");
					valrec.masteremail.focus();
					return false;
				}				
				
				var btn = valButton(valrec.rec_type);
				if (btn == null){
				alert('No recruiter type selected');
				return false ;
				}
				/*
				if (valrec.industrytype.value=="") {
					alert("Select industry type");
					valrec.industrytype.focus();
					return false;
				}*/

				if (valrec.labeladdress.value=="") {
					alert("Enter your organisation location or address");
					valrec.labeladdress.focus();
					return false;
				}
			/*	if (valrec.streetname.value=="") {
					alert("Enter street");
					valrec.streetname.focus();
					return false;
				}
			*/
				if (valrec.city.value=="") {
					alert("Enter city");
					valrec.city.focus();
					return false;
				}
				if (valrec.state.value=="") {
					alert("Enter state name");
					valrec.state.focus();
					return false;
				}
				if (valrec.country.value=="") {
					alert("Select country name");
					valrec.country.focus();
					return false;
				}
				
				/*
				if (valrec.pinno.value=="") {
					alert("Enter pin number");
					valrec.pinno.focus();
					return false;
				}
				if (valrec.isdcode.value=="") {
					alert("Enter the ISD-Code");
					valrec.isdcode.focus();
					return false;
				}
				if (valrec.stdcode.value=="") {
					alert("Enter the STD-Code");
					valrec.stdcode.focus();
					return false;
				}

				*/

				if (valrec.phoneno.value=="") {
					alert("Enter phone number");
					valrec.phoneno.focus();
					return false;
				}
				if (valrec.security_code.value=="") {
					alert("Security Code has not Entered!!.");
					valrec.security_code.focus();
					return false;
				}
				if(valrec.security_code.value!=valrec.hid_code.value) {
					alert("Enter the correct security code");
					valrec.security_code.focus();
					return false;
				}
		}
		
	// Login Section
	
	function frmlogin()
		{
			var frmstring = document.frm;
			if (frmstring.username.value=="") {
				alert("Enter the username");
				frmstring.username.focus();
				return false;
			}
			if (frmstring.password.value=="") {
				alert("Enter the password");
				frmstring.password.focus();
				return false;
			}
		}
		
//Forgot password

function popitup(url) {
	newwindow=window.open(url,null,
    "height=200,width=250,top=100, left=150,status=yes,toolbar=no,menubar=no,location=no");
	//if (window.focus) {newwindow.focus()}
	return false;
}
//filter by status

function filterfun()
{
	if (document.frmfilter.filterstatus.value=="") {
		alert("Select status");
		document.frmfilter.filterstatus.focus();
		return false;
	}
	document.frmfilter.submit();
	return true;
}

// Search jobs

function searchsubmit()
{
	document.frmsearch.submit();
	return true;
}

// confirmation
function confirmation(url) {
	var answer = confirm("Are you sure.\n You want to delete?")
	if (answer){		
		location.href = "url";
	}
}

function ChangePassword()
{
	
	var str = document.frm;
	if (str.oldpassword.value=="") {
		alert("Enter the old password");
		str.oldpassword.focus();
		return false;
	}
	if (str.newpassword.value=="") {
		alert("Enter the new password");
		str.newpassword.focus();
		return false;
	}
	if (str.confirmpassword.value=="") {
		alert("Enter the new confirm password");
		str.confirmpassword.focus();
		return false;
	}
	if (str.confirmpassword.value != str.newpassword.value) {
		alert("Confirm password did not match from new password");
		str.confirmpassword.focus();
		return false;
	}
}
// to job send friend
function funsubmit()
{
	var f = document.frmsendjob;
	if (f.email.value=="") {
		alert("Enter the email address");
		f.email.focus();
		return false;
	} 
	if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f.email.value)) == false) {	
		alert("Invalid E-mail Address!!");
		f.email.focus();
		return false;
	}
}
/*
	Search JObs
*/
function ListPostJobs()
{
	
	var frmname = document.forms[0];
	if (frmname.title.value =="") {
		alert("Enter the keywords");
		return false;
	}
}
/*
Cover letter
*/
function Cover_Letter()
{
	var strfrm = document.frmletter;
	if (strfrm.covl_subject.value=="")
	{
		alert("Enter the coverletter heading.");
		strfrm.covl_subject.focus();
		return false;
	}

	if (strfrm.covl_text.value=="")
	{
		alert("Write  the coverletter.");
		strfrm.covl_text.focus();
		return false;
	}
}
/*
End letter
*/

/*
 Load builder history jobs 
*/
function do_ResumeWH_cb(z) {
	var div_id = document.getElementById("job_history");
	div_id.innerHTML=z;
		
}

function do_JobHistory(y)
{	
	var x;
	x = 5;	
	var loadingDiv = document.getElementById("job_history");	
	loadingDiv.innerHTML = '';	
	var animation  = document.createElement('div');
    animation.innerHTML = '<img src="images/ajax-loader.gif" alt=""> Loading...';
    animation.style.display = 'block';
	loadingDiv.appendChild( animation );
	x_WorkHistory(x,y,do_ResumeWH_cb);
	
}

/*
End sajax
*/
function ShowMailbox(obj,obj1,obj2)
{
	document.getElementById(obj).style.display='block';
	document.getElementById(obj1).style.display='none';
	document.getElementById(obj2).style.display='block';
}
function HideMailbox(obj,obj1,obj2)
{
	document.getElementById(obj).style.display='none';
	document.getElementById(obj1).style.display='block';
	document.getElementById(obj2).style.display='none';
}

function ResumeProfile()
{
	var str_pro = document.profile;
	if (str_pro.pr_name.value=="")
	{
		alert("Enter the your full name");
		str_pro.pr_name.focus();
		return false;
	}
	if (str_pro.pr_address.value=="")
	{
		alert("Enter the address");
		str_pro.pr_address.focus();
		return false;
	}
	if (str_pro.pr_phone.value=="")
	{
		alert("Enter the phone number");
		str_pro.pr_phone.focus();
		return false;
	}
	if (isNaN(str_pro.pr_phone.value))
	{
		alert("Invalid phone number");
		str_pro.pr_phone.focus();
		return false;
	}
	if (str_pro.pr_mobile.value=="")
	{
		alert("Enter the mobile number");
		str_pro.pr_mobile.focus();
		return false;
	}
	if (isNaN(str_pro.pr_mobile.value))
	{
		alert("Invalid mobile number");
		str_pro.pr_mobile.focus();
		return false;
	}
	if (str_pro.pr_email.value=="")
	{
		alert("Enter the email");
		str_pro.pr_email.focus();
		return false;
	}
	if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(str_pro.pr_email.value)) == false) {	
			alert("Invalid E-mail Address!!");
			str_pro.pr_email.focus();
			return false;
	}
	if (str_pro.pr_profile.value=="")
	{
		alert("Enter the profile description");
		str_pro.pr_profile.focus();
		return false;
	}
}

function WorkJobHistory()
{
	var str_job = document.jobhistory;
	if (str_job.jh_title.value=="")
	{
		alert("Enter the job title");
		str_job.jh_title.focus();
		return false;
	}

	if (str_job.jh_company.value=="")
	{
		alert("Enter the company name");
		str_job.jh_company.focus();
		return false;
	}
	if (str_job.jh_comp_addr.value=="")
	{
		alert("Enter the company address");
		str_job.jh_comp_addr.focus();
		return false;
	}
	if (str_job.sday.value=="")
	{
		alert("Select start day");
		str_job.sday.focus();
		return false;
	}
	if (str_job.smon.value=="")
	{
		alert("Select start month");
		str_job.smon.focus();
		return false;
	}
	if (str_job.syear.value=="")
	{
		alert("Select start year");
		str_job.syear.focus();
		return false;
	}	

	if (str_job.eday.value=="")
	{
		alert("Select leave day");
		str_job.eday.focus();
		return false;
	}
	if (str_job.emon.value=="")
	{
		alert("Select leave month");
		str_job.emon.focus();
		return false;
	}
	if (str_job.eyear.value=="")
	{
		alert("Select leave year");
		str_job.eyear.focus();
		return false;
	}
	
	if (str_job.syear.value > str_job.eyear.value)
	{
		alert("Select correct leave year");
		str_job.eyear.focus();
		return false;
	}

	if (str_job.jh_job_descr.value=="")
	{
		alert("Enter the job description");
		str_job.jh_job_descr.focus();
		return false;
	}
	
}

function ValQualification()
{
	var str_edu = document.frmeducation;
	if (str_edu.edu_degree.value=="")
	{
		alert("Enter the degree");
		str_edu.edu_degree.focus();
		return false;
	}
	if (str_edu.edu_unv.value=="")
	{
		alert("Enter the School/Institute name");
		str_edu.edu_unv.focus();
		return false;
	}
	if (str_edu.edu_location_unv.value=="")
	{
		alert("Enter the location of School/Institute");
		str_edu.edu_location_unv.focus();
		return false;
	}
	if (str_edu.sday.value=="")
	{
		alert("Select start day");
		str_edu.sday.focus();
		return false;
	}
	if (str_edu.smon.value=="")
	{
		alert("Select start month");
		str_edu.smon.focus();
		return false;
	}
	if (str_edu.syear.value=="")
	{
		alert("Select start year");
		str_edu.syear.focus();
		return false;
	}	

	if (str_edu.eday.value=="")
	{
		alert("Select leave day");
		str_edu.eday.focus();
		return false;
	}
	if (str_edu.emon.value=="")
	{
		alert("Select leave month");
		str_edu.emon.focus();
		return false;
	}
	if (str_edu.eyear.value=="")
	{
		alert("Select leave year");
		str_edu.eyear.focus();
		return false;
	}
	
	if (str_edu.syear.value > str_edu.eyear.value)
	{
		alert("Select correct leave year");
		str_edu.eyear.focus();
		return false;
	}
	if (str_edu.edu_qualification_grades.value=="")
	{
		alert("Enter the qualification and grades");
		str_edu.edu_qualification_grades.focus();
		return false;
	}	
}

function ValSkills()
{
	var str_skill = document.frmskills;
	if (str_skill.skill_txt.value=="")
	{
		alert("Enter the Skills");
		str_skill.skill_txt.focus();
		return  false;
	}
}

function ValAchieve()
{
	var str_achieve = document.frmachieve;
	if (str_achieve.achieve_txt.value=="")
	{
		alert("Enter the achievement");
		str_achieve.achieve_txt.focus();
		return  false;
	}
}


function valButton(btn) {
var cnt = -1;
for (var i=btn.length-1; i > -1; i--) {
   if (btn[i].checked) {cnt = i; i = -1;}
   }
if (cnt > -1) return btn[cnt].value;
else return null;
}

function packageBuy()
{
	
	var btn = valButton(document.frmpackage.packageid);
				if (btn == null){
				alert('No Package Selected');
				return false ;
			}
}


function valid_Logo()
{
	
	if(document.getElementById('c_logo').value=="") {
			alert("Please upload your logo");
			document.getElementById('c_logo').focus();
			return false;
		}
		if(document.getElementById('c_logo').value!="") { 						
			var fileTypes=["jpg","jpeg","gif","png"];// valid file types
			var source = document.getElementById('c_logo').value;			
			var ext=source.substring(source.lastIndexOf(".")+1,source.length).toLowerCase();			
			var c=0;
			for (var i=0; i<fileTypes.length; i++) {

				if (fileTypes[i]==ext) { c=1; break; }
			}
			if(c==0) {
				alert("THAT IS NOT A VALID IMAGE\nPlease load an image with an extention of one of the following:\n\n"+fileTypes.join(", "));
				document.getElementById('c_logo').focus();
				return false;
			}
		}
}



// 

// function for redirect on the next page
function redirecturl(str)
{
	window.location=str;
}


function ValidateStSignup()
{
	var strfrm = document.frm;
	if (strfrm.st_username.value=="")
	{
		alert("Please Enter Username.");
		strfrm.st_username.focus();
		return false;
	}else if (strfrm.st_pass.value=="") {
		alert("Enter the password");
		strfrm.st_email.focus();
		return false;
	}else if (strfrm.st_name.value=="") {
		alert("Name field can not be empty");
		strfrm.st_name.focus();
		return false;
	}else if (strfrm.st_location.value=="") {
		alert("location can not be empty");
		strfrm.st_location.focus();
		return false;
	}else if (strfrm.st_mobile.value=="") {
		alert("mobile can not be empty");
		strfrm.st_mobile.focus();
		return false;
	} else if (strfrm.st_email.value=="") {
		alert("Enter the email");
		strfrm.st_email.focus();
		return false;
	} else if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(strfrm.st_email.value)) == false) {	
		alert("Invalid E-mail Address!!");
		strfrm.st_email.focus();
		return false;
	} else {
		strfrm.submit();
	}
	
}
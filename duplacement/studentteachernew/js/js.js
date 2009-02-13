// JavaScript Document
function student_assign()
{
	var frmname	= document.studentassign;
	
	if(frmname.s_email.value=="") {
			alert("Enter the email");
			frmname.s_email.focus();
			return false;
	}
	if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(frmname.s_email.value)) == false) {	
			alert("Invalid E-mail Address!!");
			frmname.s_email.focus();
			return false;
	}
	if(frmname.s_firstname.value=="") {
			alert("Enter the first name");
			frmname.s_firstname.focus();
			return false;
	}
	if(frmname.s_lastname.value=="") {
			alert("Enter the last name");
			frmname.s_lastname.focus();
			return false;
	}
	if(frmname.city_name.value=="") {
			alert("Select city");
			frmname.city_name.focus();
			return false;
	}
	if(frmname.state_name.value=="") {
			alert("Select state");
			frmname.state_name.focus();
			return false;
	}
	/*if(frmname.categoryname.value=="") {
			alert("Select category");
			frmname.s_lastname.focus();
			return false;
	}*/
	
	
isChecked=false;
for(var i=0;i<document.forms["studentassign"]["subject[]"].length;i++){
if(document.forms["studentassign"]["subject[]"][i].checked){
isChecked=true;
}
}

if(isChecked==false){
alert('Please select the subjects');
return false;
}


	if(frmname.s_filepath.value =="") {
		alert("Please, Select the files");
		frmname.s_filepath.focus();
		return false;
	}
	
	if(frmname.s_filepath.value!="") { 						
			var fileTypes=["doc","txt"];// valid file types
			var source = frmname.s_filepath.value;			
			var ext=source.substring(source.lastIndexOf(".")+1,source.length).toLowerCase();			
			var c=0;
			for (var i=0; i<fileTypes.length; i++) {

				if (fileTypes[i]==ext) { c=1; break; }
			}
			if(c==0) {
				alert("THAT IS NOT A VALID IMAGE\nPlease load an resume with an extention of one of the following:\n\n"+fileTypes.join(", "));
				frmname.s_filepath.focus();
				return false;
			}
		}
}

function Validateloginform()
{
	if(document.form1.emailid.value=='') {
		alert("Enter the emailid");
		document.form1.emailid.focus();
		return false;
	}
	if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.emailid.value)) == false) {	
		alert("Invalid E-mail Address!!");
		document.form1.emailid.focus();
		return false;
	}
	if(document.form1.password.value=='') {
		alert('Plese enter the Old password!');
		document.form1.password.focus();
		return false;
	}
	
}

function changepassform()
{
	if(document.form1.password.value=='') {
		alert('Plese enter the Old password!');
		document.form1.password.focus();
		return false;
	}
	if(document.form1.new_password.value=='') {
		alert('Plese enter the New password!');
		document.form1.new_password.focus();
		return false;
	}
}

function categoryform()
{
	if(document.form1.categoryname.value=='') {
		alert('Plese enter the categoryname!');
		document.form1.categoryname.focus();
		return false;
	}
}

function subjectform()
{
	if(document.form1.subject_name.value=='') {
		alert('Plese enter the subject name!');
		document.form1.subject_name.focus();
		return false;
	}
}

function cityform()
{
	if(document.form1.city_name.value=='') {
		alert('Plese enter the city name!');
		document.form1.city_name.focus();
		return false;
	}
}

function stateform()
{
	if(document.form1.state_name.value=='') {
		alert('Plese enter the state name!');
		document.form1.state_name.focus();
		return false;
	}
}



function popitup(url) {		
	newwindow=window.open(url,null,
    "height=350,width=500,top=100, left=150,status=yes,toolbar=no,menubar=no,location=no");	
	return false;
}

function frmsendmail()
{
	var str	= document.senfrm;
	if (str.subject.value=="") {
		alert("Enter the subject");
		str.subject.focus();
		return false;
		
	}
	if (str.messagebody.value=="") {
		alert("Enter the message");
		str.messagebody.focus();
		return false;
		
	}
}

function mailtoall()
{
	var frmstr	= document.form1;	
	if (frmstr.tomsg.value=="one") {
		if (frmstr.mailto.value=="") {
			alert("Choose one mail address !")
			frmstr.mailto.focus();
			return false;
		}
	}
	if (frmstr.subject.value=="") {
			alert("Enter the subject")
			frmstr.subject.focus();
			return false;
		}
	if (frmstr.messagebody.value=="") {
		alert("Enter the message");
		frmstr.messagebody.focus();
		return false;	
	}
}
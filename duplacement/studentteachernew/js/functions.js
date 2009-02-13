var xmlHttp

function showForm(pagename, str, conditioncheck, terms)
{
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url= pagename
if (str==0) {
	url=url+"?q="+str	
} else {
	url=url+"?page="+str
	url=url+"&check_id="+conditioncheck
	url=url+"&term_id="+terms
}
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChangedmodel 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)	
document.getElementById("hidetr").style.display = 'none';

}

function stateChangedmodel() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {  
 document.getElementById("cpanel").innerHTML=xmlHttp.responseText 
 } 
}



function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DU INTERNS :: Better way to get jobs!</title>

<link href="include/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
  <body onload="MM_preloadImages('images/btn-home-img-hover.jpg','images/btn-findjobs-img-hover.jpg','images/btn-aboutus-img-hover.jpg','images/btn-students-img-hover.jpg','images/btn-employers-img-hover.jpg','images/btn-signin-img-hover.jpg')">
  <center>
	<div class="mainbox">
	  <div style="width:770px; height:250px;">
	  <div class="logo"><a href="index.php"><img src="images/du-logo.jpg" alt="du-placements" border="0" /></a></div>
        </div>
	  <div style="width:770px; height:240px;"><img src="images/mainimage.jpg" alt="DU_Placements" border="0" usemap="#Map" />
	<map name="Map" id="Map">
	  <area shape="rect" coords="17,7,187,137" href="#" alt="findinternships" />
	  <area shape="rect" coords="216,89,359,216" href="how_it_works.php" alt="howitworks" />
	  <area shape="rect" coords="414,3,546,117" href="studenthome.php" alt="students" />
	  <area shape="rect" coords="615,84,793,213" href="clienthome.php" alt="clients" />
	</map></div>
	<div style="width:770px; height:102px; background-image:url(images/bg-main-mid.jpg); background-repeat:repeat-x;">
   	  <div style="float:left; width:8px; height:102px; background-image:url(images/bg-main-left.jpg); background-repeat:repeat-x;"></div>
   	  <div style="float:right; width:8px; height:102px; background-image:url(images/bg-main-right.jpg); background-repeat:repeat-x;"></div>
    </div>

	<div style="width:770px; height:500px; margin-top:10px; background-image:url(images/bg1-main-mid.jpg); background-repeat:repeat-x;" align="left">
   	  <div style="float:left; width:8px; height:102px; background-image:url(images/bg1-main-left.jpg); background-repeat:repeat-x;"></div>
		<?php include("joblisting.php"); ?>
	  <div style="width:4px; height:500px; float:left; background-image:url(images/bg1-main-midbar.jpg); background-repeat:no-repeat;"></div>
	  	<?php include("internslisting.php"); ?>

   	<div style="float:right; width:8px; height:102px; background-image:url(images/bg1-main-right.jpg); background-repeat:repeat-x;"></div>
    </div>
        
  <div style="width:770px;" ><span class="ebar">
  <img src="images/bar.jpg" alt="bar"/><br /><br />
  <a href="#" class="linkz">Home</a> | <a href="#" class="linkz">Find Internships</a> | <a href="#" class="linkz">How it works</a> | 
  <a href="#" class="linkz">About Us</a> | <a href="#" class="linkz">Blog</a>  <br />
  <br /><br /><br /><br /><br /><br /><br />
  wrkondreamz.studio .....:: Best viewed in 1024x768 Resolution | Above IE 6.0, Mozilla, Google Chrome, Opera ::.....<br />
  <br /><br /></span></div>
    </div>
    </center>
  </body>
</html>

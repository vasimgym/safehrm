<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');
if (empty($_SESSION['stUser'])) {
  	header('location:signin.php');	
}

include('studentheader.php');
?>

        <div align="left" style="text-align:justify; float:left;">
        <div class="nav">
        <div class="navbar"> 
          <img src="images/nav-left-bar.jpg" alt="leftbar" style="float:left;" /> 
          <img src="images/nav-img-studs.jpg" alt="" style="float:left; padding-left:4px; padding-top:8px;"/> 
          <img src="images/nav-right-bar.jpg" alt="rightbar" style="float:right;" /></div>
          <div class="navbarB">
          <?php include("studentmenu.php"); ?>
          </div>
          <div class="navmain">
            <div class="navmainbar"> <img src="images/nav-left-bar.jpg" style="float:left" /> 
            <img src="images/nav-img-editpro.jpg" alt="my_profile" style="float:left; padding-left:4px; padding-top:8px;"/> 
            <img src="images/nav-right-bar.jpg" style="float:right" /> </div>
            <div class="blue" style="height:30px; background-image:url(images/nav-bar-table1.jpg); padding-left:10px; padding-right:10px; width:580px; float:left;"></div>
            <div style="background-image:url(images/nav-grads-bar.jpg); background-repeat:repeat-x; 
            padding-left:15px; padding-bottom:5px; padding-right:10px; padding-top:10px; width:575px; float:left;">
            <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="150" height="25" align="left" valign="top">User Name</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top">
            <input name="name" type="text" class="form" id="user_name" value="saraswat-abhinav" readonly="readonly"/></td>
            </tr>
            <tr>
            <td width="150" height="10" align="left" valign="top"></td>
            <td width="20" height="10" align="left" valign="top"></td>
            <td width="0" height="10" align="left" valign="top"></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>First Name</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><input name="fname" type="text" class="form" id="fname" value="Abhinav Saraswat"/></td>
            </tr>
            <tr>
            <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Date of Birth</td>
            <td width="20" height="25" align="center" valign="top">:</td>
            <td width="0" height="25" align="left" valign="top"><select name="dbdate" class="formi" id="dbdate">
              <option value="0" selected>Date</option>
                      <option value="1" >1</option>
                      <option value="2" >2</option>
                      <option value="3" >3</option>
                      <option value="4" >4</option>
                      <option value="5" >5</option>
                      <option value="6" >6</option>
                      <option value="7" >7</option>
                      <option value="8" >8</option>
                      <option value="9" >9</option>
                      <option value="10" >10</option>
                      <option value="11" >11</option>
                      <option value="12" >12</option>
                      <option value="13" >13</option>
                      <option value="14" >14</option>
                      <option value="15" >15</option>
                      <option value="16" >16</option>
                      <option value="17" >17</option>
                      <option value="18" >18</option>
                      <option value="19" >19</option>
                      <option value="20" >20</option>
                      <option value="21" >21</option>
                      <option value="22" >22</option>
                      <option value="24" >24</option>
                      <option value="25" >25</option>
                      <option value="26" >26</option>
                      <option value="27" >27</option>
                      <option value="28" >28</option>
                      <option value="29" >29</option>
                      <option value="30" >30</option>
                      <option value="31" >31</option>
                </select>
                    <select name="dbmonth" class="formi" id="select18">
                      <option value="0" selected>Month</option>
                      <option value="1" >Jan</option>
                      <option value="2" >Feb</option>
                      <option value="3" >mar</option>
                      <option value="4" >Apr</option>
                      <option value="5" >May</option>
                      <option value="6" >June</option>
                      <option value="7" >July</option>
                      <option value="8" >Aug</option>
                      <option value="9" >Sep</option>
                      <option value="10" >Oct</option>
                      <option value="11" >Nov</option>
                      <option value="12" >Dec</option>
                </select>
                    <select name="dbyear" class="formi" id="select19">
                      <option value="0" selected>Year</option>
                      <option value="1950" >1950</option>
                      <option value="1951" >1951</option>
                      <option value="1952" >1952</option>
                      <option value="1953" >1953</option>
                      <option value="1954" >1954</option>
                      <option value="1955" >1955</option>
                      <option value="1956" >1956</option>
                      <option value="1957" >1957</option>
                      <option value="1958" >1958</option>
                      <option value="1959" >1959</option>
                      <option value="1960" >1960</option>
                      <option value="1961" >1961</option>
                      <option value="1962" >1962</option>
                      <option value="1963" >1963</option>
                      <option value="1964" >1964</option>
                      <option value="1965" >1965</option>
                      <option value="1966" >1966</option>
                      <option value="1967" >1967</option>
                      <option value="1968" >1968</option>
                      <option value="1969" >1969</option>
                      <option value="1970" >1970</option>
                      <option value="1971" >1971</option>
                      <option value="1972" >1972</option>
                      <option value="1973" >1973</option>
                      <option value="1974" >1974</option>
                      <option value="1975" >1975</option>
                      <option value="1976" >1976</option>
                      <option value="1977" >1977</option>
                      <option value="1978" >1978</option>
                      <option value="1979" >1979</option>
                      <option value="1980" >1980</option>
                      <option value="1981" >1981</option>
                      <option value="1982" >1982</option>
                      <option value="1983" >1983</option>
                      <option value="1984" >1984</option>
                      <option value="1985" >1985</option>
                      <option value="1986" >1986</option>
                      <option value="1987" >1987</option>
                      <option value="1988" >1988</option>
                      <option value="1989" >1989</option>
                      <option value="1990" >1990</option>
                      <option value="1991" >1991</option>
              </select></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Location (City)</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top">
              <select name="dbmonth" class="formi" id="select18" style="width:172px;">
              <option value="0" selected>-- Location --</option>
              <option value="1" >Delhi</option>
              <option value="2" >Gurgaon</option>
              <option value="3" >Noida</option>
              <option value="4" >Banglore</option>
              <option value="5" >Ahemdabad</option>
              <option value="6" >Hyderabad</option>
              <option value="7" >Chennai</option>
              <option value="8" >Chandigarh</option>
              <option value="9" >Sep</option>
              <option value="10" >Oct</option>
              <option value="11" >Nov</option>
              <option value="12" >Dec</option>
              </select></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>E-Mail Id</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input name="location" type="text" class="form" id="location" value="abhinav@live.com"/></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Mobile No.</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top"><input name="name" type="text" class="form" id="user_name" value="09898989898"/></td>
              </tr>
              <tr>
              <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Contact No.</td>
              <td width="20" height="25" align="center" valign="top">:</td>
              <td width="0" height="25" align="left" valign="top">
              <input name="name" type="text" class="formi" id="user_name" value="+91" maxlength="3" style="width:25px;"/>
              <input name="name" type="text" class="formi" id="user_name" value="5738" maxlength="4" style="width:32px;"/>
              <input name="name" type="text" class="formi" id="user_name" value="26263030" maxlength="5" style="width:96px;"/></td>
              </tr>
              <tr>
              <td width="150" height="15" align="left" valign="top"></td>
              <td width="20" height="15" align="center" valign="top"></td>
              <td width="0" height="15" align="left" valign="top"></td>
              </tr>
	          <tr>
        	  <td width="150" height="25" align="left" valign="top"><strong>UG Qualification</strong></td>
        	  <td height="25" align="center" valign="top">:</td>
        	  <td width="0" height="25" align="left" valign="top">
              <select name="Work_experience" class="formi" id="workexp" style="width:172px;">
	          <option value="" selected="selected" >-- UG Qualification --</option>
    	      <option value="1"  >Not Pursuing Graduation</option>
	          <option value="2"  >B.A</option>
	          <option value="3"  >B.Arch</option>
		      <option value="4"  >BCA</option>
              <option value="5"  >B.B.A</option>
		      <option value="6"  >B.Com</option>
	          <option value="7"  >B.Ed</option>
	          <option value="8"  >BDS</option>
	          <option value="9"  >BHM</option>
	          <option value="10"  >B.Pharma</option>
    	      <option value="11"  >B.Sc</option>
	          <option value="12"  >B.Tech/B.E.</option>
		      <option value="13"  >LLB</option>
	          <option value="14"  >MBBS</option>
              <option value="15"  >Diploma</option>
			  <option value="16"  >BVSC</option>
	          <option value="9999"  >Other</option>
		      </select></td>
	          </tr>
	          <tr>
    	      <td width="150" height="25" align="left" valign="top">Specialization</td>
	          <td height="25" align="center" valign="top">:</td>
	          <td width="0" height="25" align="left" valign="top">
              <select name="Work_experience2" class="formi" id="Work_experience" style="width:172px;">
              <option value="" selected="selected" >-- Specialization --</option>
              <option value="1"  >No any specialization</option>
              <option value="1"  >Arts & Humanities</option>
              <option value="2"  >Communication</option>
              <option value="3"  >Economics</option>
              <option value="4"  >English</option>
              <option value="5"  >Film</option>
              <option value="6"  >Fine Arts</option>
              <option value="7"  >Hindi</option>
              <option value="8"  >History</option>
              <option value="9"  >Journalism</option>
              <option value="10"  >Maths</option>
              <option value="11"  >Pass Course</option>
              <option value="12"  >Political Science</option>
              <option value="13"  >PR/Advertising</option>
              <option value="14"  >Psychology</option>
              <option value="15"  >Sanskrit</option>
              <option value="16"  >Sociology</option>
              <option value="17"  >Statistics</option>
              <option value="18"  >Vocational Course</option>
              <option value="9999"  >Other</option>
              </select></td>
			  </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">University </td>
	          <td height="25" align="center" valign="top"> :</td>
	          <td width="0" height="25" align="left" valign="top"><input name="univ" type="text" class="form" id="univ" /></td>
	          </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">College </td>
    	      <td height="25" align="center" valign="top"> :</td>
	          <td width="0" height="25" align="left" valign="top"><input name="coll" type="text" class="form" id="coll" /></td>
	          </tr>
	          <tr>
	          <td width="150" height="25" align="left" valign="top">Year of passing</td>
	          <td height="25" align="center" valign="top">:</td>
  	          <td width="0" height="25" align="left" valign="top">
    	      <select name="Work_experience" class="formi" id="workexp">
			  <option value="2012" >2012</option> 
			  <option value="2011" >2011</option> 
			  <option value="2010" >2010</option> 
			  <option value="2009" >2009</option> 
			  <option value="2008" >2008</option> 
			  <option value="2007" >2007</option> 
			  <option value="2006" >2006</option> 
			  <option value="2005" >2005</option> 
			  <option value="2004" >2004</option> 
			  <option value="2003" >2003</option> 
			  <option value="2002" >2002</option> 
			  <option value="2001" >2001</option> 
			  <option value="2000" >2000</option> 
			  <option value="1999" >1999</option> 
			  <option value="1998" >1998</option> 
			  <option value="1997" >1997</option> 
			  <option value="1996" >1996</option> 
			  <option value="1995" >1995</option> 
			  <option value="1994" >1994</option> 
			  <option value="1993" >1993</option> 
			  <option value="1992" >1992</option> 
			  <option value="1991" >1991</option> 
			  <option value="1990" >1990</option> 
			  <option value="1989" >1989</option> 
			  <option value="1988" SELECTED>1988</option> 
			  <option value="1987" >1987</option> 
			  <option value="1986" >1986</option> 
			  <option value="1985" >1985</option> 
			  <option value="1984" >1984</option> 
			  <option value="1983" >1983</option> 
			  <option value="1982" >1982</option> 
			  <option value="1981" >1981</option> 
			  <option value="1980" >1980</option> 
			  <option value="1979" >1979</option> 
			  <option value="1978" >1978</option> 
			  <option value="1977" >1977</option> 
			  <option value="1976" >1976</option> 
			  <option value="1975" >1975</option> 
			  <option value="1974" >1974</option> 
			  <option value="1973" >1973</option> 
			  <option value="1972" >1972</option> 
			  <option value="1971" >1971</option> 
			  <option value="1970" >1970</option> 
			  <option value="1969" >1969</option> 
			  <option value="1968" >1968</option> 
			  <option value="1967" >1967</option> 
			  <option value="1966" >1966</option> 
			  <option value="1965" >1965</option> 
			  <option value="1964" >1964</option> 
			  <option value="1963" >1963</option> 
			  <option value="1962" >1962</option> 
			  <option value="1961" >1961</option> 
			  <option value="1960" >1960</option> 
			  <option value="1959" >1959</option> 
			  <option value="1958" >1958</option> 
			  <option value="1957" >1957</option> 
			  <option value="1956" >1956</option> 
			  <option value="1955" >1955</option> 
			  <option value="1954" >1954</option> 
			  <option value="1953" >1953</option> 
			  <option value="1952" >1952</option> 
			  <option value="1951" >1951</option> 
			  <option value="1950" >1950</option> 
			  <option value="1949" >1949</option> 
			  <option value="1948" >1948</option> 
			  <option value="1947" >1947</option> 
			  <option value="1946" >1946</option> 
			  <option value="1945" >1945</option> 
			  <option value="1944" >1944</option> 
			  <option value="1943" >1943</option> 
			  <option value="1942" >1942</option> 
			  <option value="1941" >1941</option> 
			  <option value="1940" >1940</option> 
			  </select></td>
        </tr>
        <tr>
        <td width="150" height="5" align="left" valign="top"></td>
        <td height="5" align="center" valign="top"></td>
        <td width="0" height="5" align="left" valign="top"></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top"><strong>PG Qualification</strong></td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top">
        <select name="Work_experience" class="formi" id="workexp" style="width:172px;">
              <option value="" selected="selected" >-- PG Qualification --</option>
              <option value="0"  >Not Pursuing Graduation</option>
              <option value="1"  >CA</option> 
              <option value="2"  >CS</option> 
              <option value="3"  >ICWA</option> 
              <option value="4"  >Integrated PG</option> 
              <option value="5"  >LLM</option> 
              <option value="6"  >M.A</option> 
              <option value="7"  >M.Arch</option> 
              <option value="8"  >M.Com</option> 
              <option value="9"  >M.Ed</option> 
              <option value="10"  >M.Pharma</option> 
              <option value="11"  >M.Sc</option> 
              <option value="12"  >M.Tech</option> 
              <option value="13"  >MBA/PGDM</option> 
              <option value="14"  >MCA</option> 
              <option value="15"  >MS</option> 
              <option value="16"  >PG Diploma</option> 
              <option value="17"  >MVSC</option> 
              <option value="18"  >MCM</option> 
              <option value="9999"  >Other</option>
            </select>        </td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">Specialization</td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top">
        <select name="Work_experience" class="formi" id="workexp" style="width:172px;">
              <option value="" selected="selected" >-- Specialization --</option>
			  <option value="1"  >No any specialization</option> 
			  <option value="1"  >Arts & Humanities</option> 
			  <option value="2"  >Communication</option> 
			  <option value="3"  >Economics</option> 
			  <option value="4"  >English</option> 
			  <option value="5"  >Film</option> 
			  <option value="6"  >Fine Arts</option> 
			  <option value="7"  >Hindi</option> 
			  <option value="8"  >History</option> 
			  <option value="9"  >Journalism</option> 
			  <option value="10"  >Maths</option> 
			  <option value="11"  >Pass Course</option> 
			  <option value="12"  >Political Science</option> 
			  <option value="13"  >PR/Advertising</option> 
			  <option value="14"  >Psychology</option> 
			  <option value="15"  >Sanskrit</option> 
			  <option value="16"  >Sociology</option> 
			  <option value="17"  >Statistics</option> 
			  <option value="18"  >Vocational Course</option> 
			  <option value="9999"  >Other</option>
            </select></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">University </td>
        <td height="25" align="center" valign="top"> :</td>
        <td width="0" height="25" align="left" valign="top"><input name="univ1" type="text" class="form" id="univ1" /></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">College </td>
        <td height="25" align="center" valign="top"> :</td>
        <td width="0" height="25" align="left" valign="top"><input name="coll1" type="text" class="form" id="coll1" /></td>
        </tr>
        <tr>
        <td width="150" height="25" align="left" valign="top">Year of passing</td>
        <td height="25" align="center" valign="top">:</td>
        <td width="0" height="25" align="left" valign="top"><select name="Work_experience" class="formi" id="workexp">
			  <option value="2012" >2012</option> 
			  <option value="2011" >2011</option> 
			  <option value="2010" >2010</option> 
			  <option value="2009" >2009</option> 
			  <option value="2008" >2008</option> 
			  <option value="2007" >2007</option> 
			  <option value="2006" >2006</option> 
			  <option value="2005" >2005</option> 
			  <option value="2004" >2004</option> 
			  <option value="2003" >2003</option> 
			  <option value="2002" >2002</option> 
			  <option value="2001" >2001</option> 
			  <option value="2000" >2000</option> 
			  <option value="1999" >1999</option> 
			  <option value="1998" >1998</option> 
			  <option value="1997" >1997</option> 
			  <option value="1996" >1996</option> 
			  <option value="1995" >1995</option> 
			  <option value="1994" >1994</option> 
			  <option value="1993" >1993</option> 
			  <option value="1992" >1992</option> 
			  <option value="1991" >1991</option> 
			  <option value="1990" >1990</option> 
			  <option value="1989" >1989</option> 
			  <option value="1988" SELECTED>1988</option> 
			  <option value="1987" >1987</option> 
			  <option value="1986" >1986</option> 
			  <option value="1985" >1985</option> 
			  <option value="1984" >1984</option> 
			  <option value="1983" >1983</option> 
			  <option value="1982" >1982</option> 
			  <option value="1981" >1981</option> 
			  <option value="1980" >1980</option> 
			  <option value="1979" >1979</option> 
			  <option value="1978" >1978</option> 
			  <option value="1977" >1977</option> 
			  <option value="1976" >1976</option> 
			  <option value="1975" >1975</option> 
			  <option value="1974" >1974</option> 
			  <option value="1973" >1973</option> 
			  <option value="1972" >1972</option> 
			  <option value="1971" >1971</option> 
			  <option value="1970" >1970</option> 
			  <option value="1969" >1969</option> 
			  <option value="1968" >1968</option> 
			  <option value="1967" >1967</option> 
			  <option value="1966" >1966</option> 
			  <option value="1965" >1965</option> 
			  <option value="1964" >1964</option> 
			  <option value="1963" >1963</option> 
			  <option value="1962" >1962</option> 
			  <option value="1961" >1961</option> 
			  <option value="1960" >1960</option> 
			  <option value="1959" >1959</option> 
			  <option value="1958" >1958</option> 
			  <option value="1957" >1957</option> 
			  <option value="1956" >1956</option> 
			  <option value="1955" >1955</option> 
			  <option value="1954" >1954</option> 
			  <option value="1953" >1953</option> 
			  <option value="1952" >1952</option> 
			  <option value="1951" >1951</option> 
			  <option value="1950" >1950</option> 
			  <option value="1949" >1949</option> 
			  <option value="1948" >1948</option> 
			  <option value="1947" >1947</option> 
			  <option value="1946" >1946</option> 
			  <option value="1945" >1945</option> 
			  <option value="1944" >1944</option> 
			  <option value="1943" >1943</option> 
			  <option value="1942" >1942</option> 
			  <option value="1941" >1941</option> 
			  <option value="1940" >1940</option> 
			  </select>        </td>
        </tr>
        <tr>
        <td width="150" align="left" valign="top"></td>
        <td align="center" valign="top"></td>
        <td width="0" align="left" valign="top"></td>
        </tr>
        <tr>
        <td width="150" height="35" align="left" valign="top"></td>
        <td width="20" height="35" align="center" valign="top"></td>
        <td width="0" height="35" align="left" valign="top"><input type="image" src="images/du-btn-submit.jpg" name="submit" id="submit" value="Submit" /></td>
        </tr>
        </table>
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
            </div>
          </div>
        </div>
  	<?php include("footer.php"); ?>
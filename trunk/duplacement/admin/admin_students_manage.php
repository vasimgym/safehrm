<?php include("header.php");?>
      <div style="width:770px; float:left;">
        <?php include("menu.php");?>


	<div align="left" class="adminright">
    
    <div style="width:600px; padding-top:5px;">
    
    <div style="width:600px;">
      
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  	<tr>
    <td width="30" align="left" valign="middle"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td width="150" height="20" align="left" valign="middle"><span class="blue"><strong> MANAGE STUDENTS</strong></span></td>
    <td width="175" height="20" align="left" valign="middle"></td>
    <td width="105" height="20" align="left" valign="middle"></td>
    <td width="60" height="20" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"></td>
    <td width="10" align="left" valign="middle"></td>
    <td width="35" height="20" align="left" valign="middle"><a href="admin_students.php" class="link">..back</a></td>
  	</tr>
  	<tr>
    <td width="30" height="15" align="left" valign="middle"></td>
    <td width="150" height="15" align="left" valign="middle"></td>
    <td width="175" height="15" align="left" valign="middle"></td>
    <td width="105" height="15" align="left" valign="middle"></td>
    <td width="60" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
    <td width="10" height="15" align="left" valign="middle"></td>
    <td width="35" height="15" align="left" valign="middle"></td>
  	</tr>
	</table>
	<table width="600" border="0" cellspacing="0" cellpadding="0">
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
    <input name="all_select" type="checkbox" class="style1" id="all_select" />    </td>
    <td width="150" align="left" valign="middle"><strong>User name</strong></td>
    <td width="175" align="left" valign="middle"><strong>Email Id</strong></td>
    <td width="105" align="left" valign="middle"><strong>Mobile</strong></td>
    <td width="60" align="left" valign="middle"><strong>Status</strong></td>
    <td width="35" align="center" valign="middle"><strong>Edit</strong></td>
    <td width="10" align="center" valign="middle"><strong>|</strong></td>
    <td width="35" align="center" valign="middle"><strong>Del</strong></td>
  	</tr>
  	<tr>
    <td width="30" height="10" align="left" valign="middle"></td>
    <td width="150" height="10" align="left" valign="middle"></td>
    <td width="175" height="10" align="left" valign="middle"></td>
    <td width="105" height="10" align="left" valign="middle"></td>
    <td width="60" height="10" align="left" valign="middle"></td>
    <td width="35" height="10" align="center" valign="middle"></td>
    <td width="10" height="10" align="center" valign="middle"></td>
    <td width="35" height="10" align="center" valign="middle"></td>
  	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="150" height="30" align="left" valign="middle">Abhinav Saraswat</td>
    <td width="175" height="30" align="left" valign="middle">abhinav@avsarr.com</td>
    <td width="105" height="30" align="left" valign="middle">9999999999</td>
    <td width="60" height="30" align="left" valign="middle">Active</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16" border="0" /></a></td>
  	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select3" id="all_select3" /></td>
    <td width="150" height="30" align="left" valign="middle">Soma Chakroborty</td>
    <td width="175" height="30" align="left" valign="middle">soma@avsarr.com</td>
    <td width="105" height="30" align="left" valign="middle">9898989898</td>
    <td width="60" height="30" align="left" valign="middle">Inactive</td>
	<td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16" border="0" /></a></td>
  	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select4" id="all_select4" /></td>
    <td width="150" height="30" align="left" valign="middle">Birendra kumar </td>
    <td width="175" height="30" align="left" valign="middle">billoo@gmail.com</td>
    <td width="105" height="30" align="left" valign="middle">9875899875</td>
    <td width="60" height="30" align="left" valign="middle">Active</td>
	<td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16" border="0" /></a></td>
  	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select5" id="all_select5" /></td>
    <td width="150" height="30" align="left" valign="middle">Antul kumar rawat</td>
    <td width="175" height="30" align="left" valign="middle">abhinav@rediffmail.com</td>
    <td width="105" height="30" align="left" valign="middle">9858985898</td>
    <td width="60" height="30" align="left" valign="middle">Active</td>
	<td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16" border="0" /></a></td>
  	</tr>
  	<tr>
    <td width="30" height="30" align="left" valign="middle"><input type="checkbox" name="all_select2" id="all_select2" /></td>
    <td width="150" height="30" align="left" valign="middle">Abhinav Saraswat</td>
    <td width="175" height="30" align="left" valign="middle">abhinav@avsarr.com</td>
    <td width="105" height="30" align="left" valign="middle">9999999999</td>
    <td width="60" height="30" align="left" valign="middle">Active</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-edit.jpg" alt="edit" width="15" height="14" border="0" /></a></td>
    <td width="10" height="30" align="center" valign="middle">|</td>
    <td width="35" height="30" align="center" valign="middle"><a href="#"><img src="../images/admin-del.jpg" alt="delete" width="15" height="16" border="0" /></a></td>
  	</tr>
	</table>
  	  </div>
		</div>
    	  </div>
	    	</div>			
               <?php include("footer.php");?>

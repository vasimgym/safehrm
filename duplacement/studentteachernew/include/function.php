<?php
function get_states($select)
	{
		$res= mysql_query("SELECT id , state_name FROM student_state ORDER BY state_name ");
		while($row=mysql_fetch_array($res))
		{
		$row['id']==$select ? $select1="selected" : $select1="";
		echo '<option value="'.$row['id'].'" '.$select1.'>'.$row['state_name'].'</option>'; 
		}
	}
	
function get_category($select)
	{
		$res= mysql_query("SELECT id, categoryname from student_category WHERE parent_node=0");
		while($row=mysql_fetch_array($res))
		{
		$row['id']==$select ? $select1="selected" : $select1="";
		echo '<option value="'.$row['id'].'" '.$select1.'>'.$row['categoryname'].'</option>'; 
		}
	}
	
function get_city($select)
	{
		$res= mysql_query("SELECT id, city_name FROM student_city");
		while($row=mysql_fetch_array($res))
		{
		$row['id']==$select ? $select1="selected" : $select1="";
		echo '<option value="'.$row['id'].'" '.$select1.'>'.$row['city_name'].'</option>'; 
		}
	}
	
function get_subject($select)
	{
		$res= mysql_query("SELECT id, subject_name FROM student_subject");
		while($row=mysql_fetch_array($res))
		{
		$row['id']==$select ? $select1="selected" : $select1="";
		echo '<option value="'.$row['id'].'" '.$select1.'>'.$row['subject_name'].'</option>'; 
		}
	}
	
function get_status($select)
	{
		$res= mysql_query("SELECT id, status_name, status_color FROM student_status");
		while($row=mysql_fetch_array($res))
		{
		$row['status_name']==$select ? $select1="selected" : $select1="";
		echo '<option value="'.$row['status_name'].'" '.$select1.'><font color="'.$row['status_color'].'">'.$row['status_name'].'</font></option>'; 
		}
	}
	
/*Today data*/
function funToday()
{
	$today = date('Y-m-d');
	$query = mysql_query ("SELECT count( * ) AS s_today
							FROM student_information
							WHERE s_posted_date='$today'");
	$record	= mysql_fetch_array($query);
	$todayrecord	= $record['s_today'];
	return $todayrecord;
}


/*end*/

/*Week data*/
function funWeek()
{
	$today 	= date('Y-m-d');
	$time 	= time();
	$ctime 	= $time-7*24*60*60;
	$sevenday = date('Y-m-d',$ctime);
	$query = mysql_query ("SELECT count( * ) AS s_week
							FROM student_information
							WHERE s_posted_date <='$today' AND s_posted_date >='$ctime'");
	$record	= mysql_fetch_array($query);
	$s_week	= $record['s_week'];
	return $s_week;
}


/*end*/

/*Month data*/
function funMonth()
{
	$today 	= date('Y-m');		
	$query = mysql_query ("SELECT count(*) as s_month
						FROM student_information
						WHERE s_posted_date LIKE '%$today%'");
	$record	= mysql_fetch_array($query);
	$s_month	= $record['s_month'];
	return $s_month;
}


/*end*/

/*Year data*/
function funYear()
{
	$today 	= date('Y');		
	$query = mysql_query ("SELECT count(*) as s_year
						FROM student_information
						WHERE s_posted_date LIKE '%$today%'");
	$record	= mysql_fetch_array($query);
	$s_year	= $record['s_year'];
	return $s_year;
}


/*end*/

?>
<?php
include('classes/students.class.php');

$case=$_GET['case'];

switch($case)
{
	case 'List':
	$student=new Students();
	$all_students_list=array();
	//$k=1;
	
	$all_students_list=$student->list_students();
	if(count($all_students_list)!=0)
	{
		echo "<p><center><h3>List of Students</h3></p><table id=\"attendance_table_id\"><thead><tr><th>SNo</th><th>Roll No</th><th>Name</th><th>Attendance</th></tr>";
		
		foreach($all_students_list as $student)
		{
			echo "<tr><td>".$student['id']."</td><td>".$student['rollno']."</td><td>".$student['name']."</td><td>
			<input type=\"radio\" name=\"".$student['id']."\" value=\"P\" id=\"".$student['id']."_present\"><label for=\"".$student['id']."_present\">Present</label>
			<input type=\"radio\" name=\"".$student['id']."\" value=\"A\" id=\"".$student['id']."_absent\" checked=\"checked\"><label for=\"".$student['id']."_absent\">Absent</label></tr>";		
		}
		echo "</table></center>";
		echo "<input type=\"submit\" value=\"Submit\" id=\"submit_button_id\">";
		echo "</form>";
	}
	
	else
	{
		echo "<div class=\"error_messages\">No entries for students Found!</div>";
	}
	break;
	
	/*case 'submitRecord':
	$date=$_POST['selected_date'];
	$attendance=$_POST['attend'];
	
	$student=new Students();
	$student->submit_record_details($date,);
	break;*/

	case 'All':
	
	$date=$_POST['selected_date'];

	$student=new Students();
	$students_list=array();
	$i=1;

	$students_list=$student->show_students($date);
	//print_r($studentsList);

	if(count($students_list)!=0)
	{
		echo "<p><center><h3>Attendance of Students</h3></p><table id=\"attendance_table_id\"><thead><tr><th>SNo</th><th>Name</th><th>Attendance</th></tr></center>";
		//var_dump($students_list);
		foreach($students_list as $student)
		{
				if(($student['is_present'])=='1')
				{
					$student['is_present']='P';
				}
				else
				{
					$student['is_present']='A';
				}
				echo "<tr><td>".$i."</td><td>".$student['name']."</td><td>".$student['is_present']."</td></tr>";
				$i++;		
		}
		echo "</table></center>";
	}

	else
	{
		echo "<div class=\"error_messages\">No entries for students Found!</div>";
	}
	break;
	
	case 'Absent':
	$date=$_POST['selected_date'];
	
	$student=new Students();
	$absent_students_list=array();
	$j=1;
	
	$absent_students_list=$student->show_absent_students($date);
	
	if(count($absent_students_list)!=0)
	{
		echo "<p><center><h3>List of Absent Students</h3></p><div id=\"mail_link\"><a href=\"send_absent_mail.php?date=".$date."\">Send Mail</a></div><table id=\"attendance_table_id\"><thead><tr><th>SNo</th><th>Name</th></tr>";
		foreach($absent_students_list as $student)
		{
			echo "<tr><td>".$j."</td><td>".$student['name']."</td></tr>";
			$j++;
		}
		echo "</table></center>";
	}
	else
	{
		echo "<div class=\"error_messages\">No entries for Absent students Found!</div>";
	}
	break;
}
?>

<link rel="stylesheet" href="styles.css">
<?php
include('classes/students.class.php');
var_dump($_POST);
$date=$_POST['date'];

$student=new Students();
$student->clear($date);
foreach($_POST as $key=>$value)
{
	if($key=="date")
	{
		continue;
	}
	else if($value=='P')
	{
		$student=new Students();
		$student->present($date,$key);	
	}
	else
	{
		$student=new Students();
		$student->absent($date,$key);		
	}
}
header('Location:show_attendance_form.php');
//echo "<h1>Attendance Record Added Successfully</h1>";
//echo "<div id=\"attendance_record_link\"><a href=\"interface.php\">Attendance Record</a></div>";
?>

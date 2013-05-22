<link rel="stylesheet" href="styles.css">
<?php
include('classes/students.class.php');

$date=$_GET['date'];
	
$student=new Students();
$absent_students_list=array();
$i=0;

	
$absent_students_list=$student->show_absent_students($date);
echo "<div id=\"title\"><h1>Mail Record Submission</h1></div>";	
if(count($absent_students_list)!=0)
{
	foreach($absent_students_list as $student)
	{
		$i++;
		$name=$student['name'];
		$to=$student['email'];
		send_mail($i,$to,$name,$date);
	}
}


function send_mail($i,$recipient,$student_name,$date)
{
	$to=$recipient;
	$subject="Absent Student";
	$message="You were absent in the class";
	$from="mehta.barkha1991@gmail.com";
	$headers="From:".$from."";
	$sent=mail($to,$subject,$message,$headers);
	echo "<div id=\"mail_response\"><h5>".$i ." Mail has been sent Successfully to ".$student_name." for being absent on ".$date."<br></h5></div>";
}
?>

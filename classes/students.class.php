<?php
include('classes/connection.class.php');

class Students
{
	public $conn;
	
	public function __construct()
	{
		$conn=new Connection();
		$this->conn=$conn->getConnection();	
	}
	
	function list_students()
	{
		$sql="select id,name,rollno from student";
		$list_students_query=mysql_query($sql,$this->conn)or die(mysql_error());
		$all_students_list=array();
		while($row=mysql_fetch_assoc($list_students_query))
		{
			$all_students_list[]=$row;
		}
		return $all_students_list;
	}
	
	function clear($date)
	{
		$sql="delete from attendance where date='".$date."'";
		$delete_students_query=mysql_query($sql,$this->conn)or die(mysql_error());
	}
	
	function present($date,$key)
	{
		echo "P";		
		$sql="insert into attendance(date,student_id,is_present)values('".$date."','".$key."','1')";
		$present_students_query=mysql_query($sql,$this->conn)or die(mysql_error());		
	
	}
	
	function absent($date,$key)
	{
		echo "A";
		$sql="insert into attendance(date,student_id,is_present)values('".$date."','".$key."','0')";
		$absent_students_query=mysql_query($sql,$this->conn)or die(mysql_error());	
	}
	
	function show_students($date)
	{
		$sql="select name,is_present from student join attendance on student.id=student_id where date='".$date."'";
		$show_students_query=mysql_query($sql,$this->conn)or die(mysql_error());
		$students_list=array();
		while($row=mysql_fetch_assoc($show_students_query))
		{
			$students_list[]=$row;
		}
		//var_dump($students_list);
		return $students_list;	
	}
	
	function show_absent_students($date)
	{
		$sql="select name,email from student join attendance on student.id=student_id where date='".$date."' and is_present='0'";
		$show_absent_students_query=mysql_query($sql,$this->conn)or die(mysql_error());
		$absent_students_list=array();
		while($row=mysql_fetch_assoc($show_absent_students_query))
		{
			$absent_students_list[]=$row;
		}
		return $absent_students_list;	
	}
}

?>

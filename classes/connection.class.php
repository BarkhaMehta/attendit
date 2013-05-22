<?php
class Connection
{
	public $conn;	
	
	public function __construct()
	{
		$this->conn=mysql_connect("localhost","root","barkha");
		mysql_select_db("attendance_portal");	
	}
	
	public function getConnection()
	{
		return $this->conn;
	}
}
?>

function getXMLHTTPRequest()
{
	var request=false;
	try
	{
		request=new XMLHttpRequest();
	}
	
	catch(err1)
	{
		try
		{
			request=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(err2)
		{
			try
			{	
				request=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(err3)
			{
				request=false;
			}
		}	
	}
	return request;	
}

function bootstrapPage()
{
	var x=new Date();
	
	m=x.getMonth()+1;
	d=x.getDate();
	y=x.getFullYear();
	
	document.getElementById('date_id').value=y+"-"+(m<10?"0"+m:m)+"-"+(d<10?"0"+d:d);
}

function validateForm()
{
	console.log("coming");
	var d=document.getElementById('date_id').value;
	console.log(d);
	if(d=='')
	{
		document.getElementById('validation_checks').innerHTML="Please enter a valid date";
		return false;
	}
}


function fillColorTable(table)
{
	var table_length = document.getElementById(table).rows.length;
		
	for(i=0;i<table_length;i++)
	{
		if(i%2==0)
		{
			document.getElementById(table).rows[i].style.backgroundColor='#f0f8ff';	
		}
		else
		{
			document.getElementById(table).rows[i].style.backgroundColor='f8f8ff';
		}	
	}
}

function allStudentsList()
{
	var date=document.getElementById('date_id').value;
	var request=getXMLHTTPRequest();
	request.open("POST","show_students_attendance.php?case=List",true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send();
	request.onreadystatechange=function()
	{
		if(request.readyState==4)
		{
			var response=request.responseText;
			document.getElementById('students_list').innerHTML=response;
			fillColorTable('attendance_table_id');
		}
	}
	
}

/*function AddRecordDetails()
{
	
	var date=document.getElementById('date_id').value;
	var record=document.getElementById('
	var request=getXMLHTTPRequest();
	request.open("POST","show_students.php?case=SubmitRecord",true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send("selected_date="+date);
	request.onreadystatechange=function()
	{
		if(request.readyState==4)
		{
			var response=request.responseText;
			//document.getElementById('students_list').innerHTML=response;
		}
	}
}*/

function listStudents()
{
	document.getElementById('validation_checks').innerHTML='';
	document.getElementById('display_list').innerHTML='';
	document.getElementById('error_messages').innerHTML='';
	var date=document.getElementById('date_id').value;
	
	var request=getXMLHTTPRequest();
	request.open("POST","show_students_attendance.php?case=All",true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	if(date=='')
	{
		document.getElementById('validation_checks').innerHTML="Please enter a valid date";
	}
	else
	{
		request.send("selected_date="+date);
		request.onreadystatechange=function()
		{
			if(request.readyState==4)
			{
				var response=request.responseText;
				document.getElementById('display_list').innerHTML=response;
				fillColorTable('attendance_table_id');			
			}
		}
		
	}
}

function listAbsentStudents()
{
	document.getElementById('validation_checks').innerHTML='';
	document.getElementById('display_list').innerHTML='';
	document.getElementById('error_messages').innerHTML='';
	var date=document.getElementById('date_id').value;
	
	var request=getXMLHTTPRequest();
	request.open("POST","show_students_attendance.php?case=Absent",true);
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	if(date=='')
	{
		document.getElementById('validation_checks').innerHTML="Please enter a valid date";
	}
	else
	{
		request.send("selected_date="+date);
		request.onreadystatechange=function()
		{
			if(request.readyState==4)
			{
				var response=request.responseText;
				document.getElementById('display_list').innerHTML=response;				
				fillColorTable('attendance_table_id');
			}	
		}
	}
}
















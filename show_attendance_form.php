<html>
	<head>
		<title>Student Attendance Record</title>
		<script src="js/jquery/jquery.min.js"></script>
		<script src="js/jqueryui/jquery-ui.custom.min.js"></script>
		<script type="text/javascript" src="student.js"></script>
		<link rel="stylesheet" href="css/redmond/jquery-ui.custom.min.css">
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body onload="bootstrapPage();">
		<div id="wrapper">
			<div id="inner">
				
				<div id="title">
					<h1>Student Attendance Record</h1>
				</div>
				<h4>Select any Date</h4>
				<div id="select_date">
					<form name="attendance_record">
					<input type="text" name="date" class="datepicker" id="date_id">
					<a href="#" onClick="listAbsentStudents();">Absent Students</a>
					</form>
				</div>
				<div id="validation_checks">
				</div>
				
				<div id="show_button">
					<input type="button" name="show" value="Show" id="show_button_id" onClick="listStudents();">
				</div>
				<div id="error_messages">
				</div>
				
				<div id="display_list">
				</div>
				
			
			</div>
		</div>
		
		<script>
			(function($){
				$('.datepicker').datepicker({
					dateFormat: 'yy-mm-dd',
					changeYear: true,
					changeMonth: true
				});
				
			})( jQuery );		
		</script>
	</body>
</html>
					


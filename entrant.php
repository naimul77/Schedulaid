<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="custom.css">
	<title></title>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Schedulaid</a>
		<a class="nav-link" href="entrant.php">Home</a>
		<a class="nav-link" href="#" data-toggle="modal" data-target = "#adminPanelModal">Appointments</a>
		<a class="nav-link" href="#" data-toggle="modal" data-target = "#studentRecordsModal">Schedule</a>
		<form class="form-inline ml-auto" method = "POST" action = "processor.php" >
		    <input class="form-control mr-sm-2" id = "rummage"  type="text" placeholder="Search by customerID, appointmentID, or customerName" style = "color: orange; width: 390px">
			<button class="btn btn-primary my-2 my-sm-0" type="submit" name = "searchandrescue">Search</button>
		</form>
	</nav>
	<!-- div class = container -->
	<div class = "jumbotron">
		<div class = "card">
			Dashboard Design
		</div>
	</div>
	<!--Student Records Modal -->
	<div class="modal fade" id = "studentRecordsModal" tabindex="-1" aria-labelledby = "studentRecordsModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-scrollable modal-xl">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" style = "text-align: center;">Schedules for Organization X:</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
				<div class = "modal-body" style = "background-color: rgb(192, 192, 192);">
					<button type="button" name="addstudent" data-toggle="modal" data-target="#addStudentModal" class="btn btn-success ml-auto" style = "width: 200px; margin-bottom: 20px; margin-top: 6px; font-weight: bold" data-dismiss = "modal">
						+ Create Time Slot
					</button>
				<?php 
					$conn = mysqli_connect("localhost", "root", "", "enrollment");
					$sql = "SELECT * FROM students";
			
					$sql_query = mysqli_query($conn, $sql);
				 ?>
				 	<table class = "table table-bordered table-dark">
				 		<thead>
				 			<tr>
				 				<th scope = "col">Date</th>
				 				<th scope = "col">Professional</th>
				 				<th scope = "col">Hours commence</th>
				 				<th scope = "col">Hours terminate</th>
				 				<th scope = "col">Services offered</th>
				 				<th scope = "col"></th>
				 			</tr>
				 		</thead>
					 </table>
				</div>
		      	<div class="modal-footer">
			       	<button type="submit" name = "editStudentRecords" class="btn btn-danger">Exit</button>	
		     	</div>
	    	</div>
	  	</div>
	</div>
		<!--Add Student Modal -->
	<div class="modal fade" id = "addStudentModal" tabindex="-1" aria-labelledby = "addStudentModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-xl">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title">Create New Appointment:</h5>
	        		<button type="button" class="close" data-toggle = "modal" data-target = "#studentRecordsModal" aria-label="Close"  data-dismiss="modal">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
					<form class="form-inline" method = "POST" action = "processor.php" >
					    <div class = "form-group">
							<input class="form-control mr-sm-2" id="student_id" name="student_id" type="text" placeholder="ID#" size = "7">
						</div>
						<div class = "form-group">
							<input class="form-control mr-sm-2" id="fullname" name="fullname" type="text" placeholder="Firstname Lastname" size = "35">
						</div>

						<div class = "form-group">
							<input class="form-control mr-sm-2" id = "dept" name="dept" type="text" placeholder="e.g.: CSE, BBA, etc." size = "15">
						</div>

						<div class = "form-group">
							<input class="form-control mr-sm-2" id = "major" name="major"type="text" placeholder="e.g.: Marketing, Computer Science" size = "46">	
						</div>
						<div class = "form-group">
							<button type="submit" name = "addstudentToo" class="btn btn-success" style = "width: 64px; margin-left:50px; font-weight: bold">
								Add
							</button>
						</div>	
					</form>
				</div>
	    	</div>
	  	</div>
	</div>
	<!--Admin Panel Modal -->
	<div class="modal fade" id = "adminPanelModal" tabindex="-1" aria-labelledby = "adminPanelModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-scrollable modal-xl">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<center><h5 class="modal-title">Schedulaid </h5></center>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
				<div class = "modal-body" style = "background-color: rgb(192, 192, 192);">
					<button type="button" name="administer" data-toggle="modal" data-target="#administerModal" class="btn btn-success ml-auto" style = "width: 225px; margin-bottom: 20px; margin-top: 6px; font-weight: bold" data-dismiss = "modal">
						+ Create New Appointment
					</button>
				<?php 
					$conn = mysqli_connect("localhost", "root", "", "enrollment");
					$sql = "SELECT * FROM accounts";
			
					$sql_query = mysqli_query($conn, $sql);
				 ?>
				 	<table class = "table table-bordered table-dark">
				 		<thead>
				 			<tr>
				 				<th scope = "col">AppointmentID</th>
				 				<th scope = "col">CustomerID</th>
				 				<th scope = "col">Customer Name</th>
				 				<th scope = "col">Appointment Date-Time</th>
				 				<th scope = "col">Service Professional</th>
				 				<th scope = "col"></th>
				 			</tr>
				 		</thead>
				<?php 
					if($sql_query)
					{
						foreach($sql_query as $row)
						{
				 ?>
				 			<tbody>
				 				<tr>
				 					<td> <?php echo "" ?> </td>
				 					<td> <?php echo "" ?> </td>
				 					<td> <?php echo "" ?> </td>
				 					<td> <?php echo "" ?> </td>
				 					<td> <?php echo "" ?> </td>
				 					<td style = "width: 320px;">
						 				<center>
						 					<button name="changePass" class="btn btn-primary" style="width:160px; padding: 2.0px; margin-right:10px; font-weight: bold;">
						 					Change
							 				</button>
							 				<button name="deleteAdmin" class="btn btn-danger" style="width:75px; padding: 2.5px; margin-left:10px; font-weight: bold;">
							 				Delete
							 				</button>
							 			</center>
				 					</td>
					 			</tr>
					 		</tbody>
				<?php 
					 	}		
					}
					else 
					{
						echo "There are no records in the admin panel. ";
					}
					mysqli_close($conn);
				 ?>
					 </table>
				</div>
		      	<div class="modal-footer">
			       	<button type="submit" name = "editPanel" class="btn btn-secondary">Save Changes</button>	
		     	</div>
	    	</div>
	  	</div>
	</div>
	<!--Administer Modal -->
	<div class="modal fade" id = "administerModal" tabindex="-1" aria-labelledby = "administerModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-xl">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" style = "text-align: center;">Enter Administrator Details::</h5>
	        		<button type="button" class="close" data-toggle = "modal" data-target = "#adminPanelModal" aria-label="Close"  data-dismiss="modal">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
					<form class="form-inline" method = "POST" action = "processor.php" >
					    <div class = "form-group">
							<input class="form-control mr-sm-2"id="fname"name="fname"type="text"placeholder="First name"size="18">
						</div>
						<div class = "form-group">
							<input class="form-control mr-sm-2" id="lname"name="lname"type="text"placeholder="Last name"size="18">
						</div>
						<div class = "form-group">
							<input class="form-control mr-sm-2" id="user" name="user"type="text" placeholder="Username:"size="20">
						</div>
						<div class = "form-group">
							<input class="form-control mr-sm-2"id="pass"name="pass"type="password"placeholder="Password"size="22">
						</div>
						<div class = "form-group">
							<input class="form-control mr-sm-2"id="contact"name="contact"type="text"placeholder="contact"size="13">
						</div>
						<div class = "form-group">
							<button type="submit" name = "administer" class="btn btn-success" style = "width: 100px; margin-left:36.5px; font-weight: bold">
								Create New Appointment
							</button>
						</div>	
					</form>
				</div>
	    	</div>
	  	</div>
	</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
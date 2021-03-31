<?php 
//Connect to database
$conn = mysqli_connect("localhost", "root", "", "enrollment");
//If login form is submitted
if( isset($_POST["login"]) )		
{
	//Retrieve data from html form
	$user = $_POST["user"];
	$pass = $_POST["pass"];

	if($user == '' || $pass == '')
	{
		mysqli_close($conn);
		echo "<script>alert('All fields are required.');
		window.location='index.html';
		</script>";
	}
	//Prepare SQL statement query
	$sql = "SELECT user, pass FROM accounts WHERE user = \"$user\" ";

	//Execute SQL statement query into connected database or fail
	$result = mysqli_query($conn, $sql);

	//Disconnect from database
	mysqli_close($conn);

	if(mysqli_num_rows($result))
	{
		//Fetch Data from database query result
		$row = mysqli_fetch_assoc($result);

		//If username doesn't exist
		if($pass == $row["pass"])
			echo "<script>window.location='entrant.php'</script>";
		else
			echo "<script>alert('Sorry! The password you have entered is incorrect.');
			window.location='index.html'</script>";
	}
	else
	{	
		echo "<script>alert('Sorry! The username you have entered does not exist.');
		window.location='index.html';
		</script>";
	}
}
else if( isset($_POST["addstudent"])  || isset($_POST["addstudentToo"]) )			//If student entry is submitted
{
	//Retrieve data from html form
	$id = $_POST["student_id"];
	$fullname = $_POST["fullname"];
	$dept = $_POST["dept"];
	$major = $_POST["major"];

	if($id == '' || $fullname == '' || $dept == '' || $major == '')
	{
		//Disconnecte from database
		mysqli_close($conn);

		//Show alert for empty fields
		echo "<script>alert('All information must be filled.');
		window.location='";
		
		if(isset($_POST["addstudent"]) )
			echo "index.html";
		else
			echo "entrant.php";

		echo "';</script>";
	}
	//Calculate current date and time
	date_default_timezone_set('Asia/Dhaka');
	$currentTime = date('Y-m-d H:i:s');
	//Prepare SQL statement query
	$sql = "INSERT INTO students (`student_id`, `name`, `dept`, `major`, `date_created`) VALUES (\"$id\", \"$fullname\", \"$dept\", \"$major\", \"$currentTime\")";

	if(mysqli_query($conn, $sql))
	{
		//Disconnect from database
		mysqli_close($conn);

		echo "<script>alert('Records added successfully.');
		window.location='";
		
		if(isset($_POST["addstudent"]) )
			echo "index.html";
		else
			echo "entrant.php";

		echo "';</script>";
	}
	else
	{
		//Disconnect from database
		mysqli_close($conn);

		echo "<script>alert('Sorry! Something went wrong! Please try again later.');
		window.location='index.html';
		</script>";	
	}
}
else if(isset($_POST["editstudent"]) )
{

}
else if(isset($_POST["administer"]) )
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$contact = $_POST["contact"];

	if($fname == '' || $lname == '' || $user == '' || $pass == '' || $contact == '')
	{
		mysqli_close($conn);
		echo "<script>alert('All fields are required.');window.location='entrant.php';</script>";
	}
	else if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM accounts WHERE fname = \"$fname\" AND lname = \"$lname\"") ) )
	{
		mysqli_close($conn);

		echo "<script>alert('There is an already an account under that name. Please try logging into the account from a different session. ');window.location='entrant.php';</script>";	
	}
	else
	{
		$result = mysqli_query($conn, "SELECT * FROM accounts WHERE user = \"$user\"");
		if(mysqli_num_rows($result) )
		{
			mysqli_close($conn);

			echo "<script>alert('Sorry! The username already exists. Please try a different one. ');window.location='entrant.php';
			</script>";	
		}
	}
	//Calculate current date and time
	date_default_timezone_set('Asia/Dhaka');
	$currentTime = date('Y-m-d H:i:s');

	if(mysqli_query($conn, "INSERT INTO accounts (`fname`, `lname`, `user`, `pass`, `contact`, `date_created`) VALUES (\"$fname\", \"$lname\", \"$user\", \"$pass\", \"$contact\", \"$currentTime\")"))
	{
		//Disconnect from database
		mysqli_close($conn);

		echo "<script>alert('Administrative account created successfully.');
		window.location='entrant.php';</script>";
	}
	else
	{
		//Disconnect from database
		mysqli_close($conn);

		echo "<script>alert('Sorry! Something went wrong! Please try again later.');
		window.location='entrant.php';
		</script>";	
	}
}
else if(isset($_POST["searchandrescue"]))
{
	$rummage = $_POST["rummage"];

	
}
//Disconnect from database
mysqli_close($conn);
?>

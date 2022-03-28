<?php
/** Aaron McEwen
*	
*	
*/
session_start();
include 'db.php';

// Validation adapted from tutorial: https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_escapechar
// define variables and set to empty values
$fname = $sname = $hno = $street = $city = $pcode = $country = $dob = $email = $phone = $job = $salary = $chours = $dept = $super = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["firstname"]);
  $sname = test_input($_POST["surname"]);
  $hno = test_input($_POST["houseno"]);
  $street = test_input($_POST["street"]);
  $city = test_input($_POST["city"]);
  $pcode = test_input($_POST["postcode"]);
  $country = test_input($_POST["country"]);
  $dob = test_input($_POST["dob"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $job = test_input($_POST["job_title"]);
  $salary = test_input($_POST["salary"]);
  $chours = test_input($_POST["contract_hours"]);
  $dept = test_input($_POST["dept_id"]);
  $super = test_input($_POST["super_id"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// end of validation

	//create the prepared statement IMPORTANT - $mypdo is a PDO HANDLER from db.php
	$prepstmt = $mypdo->prepare('INSERT INTO Staff (Firstname, Surname, HouseNo, Street, City, Postcode, Country, DateOfBirth, Email, PhoneNumber, JobTitle, Salary, ContractHours, vPassword, DepartmentID, SupervisorID)	VALUE (:Firstname, :Surname, :HouseNo, :Street, :City, :Postcode, :Country, :DateOfBirth, :Email, :PhoneNumber, :JobTitle, :Salary, :ContractHours, :vPassword, :DepartmentID, :SupervisorID)');
	
if (isset($_POST['submit'])) { 
	// $_POST['submit'] is equal to the value of the submit button, where the key is the name attribute in the form
	// and the contents of the variable are the value attribute or whatever the user has typed in.

	$prepstmt->bindParam(':Firstname', $_POST['firstname']);
	$prepstmt->bindParam(':Surname', $_POST['surname']);
	$prepstmt->bindParam(':HouseNo', $_POST['houseno']);
	$prepstmt->bindParam(':Street', $_POST['street']);
	$prepstmt->bindParam(':City', $_POST['city']);
	$prepstmt->bindParam(':Postcode', $_POST['postcode']);
	$prepstmt->bindParam(':Country', $_POST['country']);
	$prepstmt->bindParam(':DateOfBirth', $_POST['dob']);
	$prepstmt->bindParam(':Email', $_POST['email']);
	$prepstmt->bindParam(':PhoneNumber', $_POST['phone']);
	$prepstmt->bindParam(':JobTitle', $_POST['job_title']);
	$prepstmt->bindParam(':Salary', $_POST['salary']);
	$prepstmt->bindParam(':ContractHours', $_POST['contract_hours']);
	$prepstmt->bindParam(':vPassword', $_POST['password']);
	$prepstmt->bindParam(':DepartmentID', $_POST['dept_id']); 
	$prepstmt->bindParam(':SupervisorID', $_POST['super_id']);
	//execute the prepared statement
	$prepstmt->execute();

}

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="bg.png">
<div style="width: 100%;margin: 0" class="row">
	<?php include 'header.php'; ?>
	<div style="max-width: 100%;margin: 0;margin-top: 5vh" class="row">
		<div style="text-align:center;margin-bottom:3vh;" class="container">
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
		<table style="background-color: white;border-radius:15px;box-shadow: 5px 5px 5px 5px #000000" align="center">
			<tr><td><h2>Add Employee</h2></tr></td>	
			
			<tr><td><input type="text" name="firstname" placeholder="Firstname"></td></tr>
		
			<tr><td><input type="text" name="surname" placeholder="Surname"></td></tr>
		
			<tr><td><input type="text" name="houseno" placeholder="House Number"></td></tr>
			
			<tr><td><input type="text" name="street" placeholder="Street"></td></tr>
			
			<tr><td><input type="text" name="city" placeholder="City"></td></tr>
			
			<tr><td><input type="text" name="postcode" placeholder="Postcode"></td></tr>
			
			<tr><td><input type="text" name="country" placeholder="Country"></td></tr>
		
			<tr><td><input type="date" name="dob" placeholder="DD/MM/YYYY"></td></tr>
		
			<tr><td><input type="email" name="email" placeholder="Email"></td></tr>
			
			<tr><td><input type="text" name="phone" placeholder="Phone Number"></td></tr>
		
			<tr><td><input type="text" name="job_title" placeholder="Job Title"></td></tr>
		
			<tr><td><input type="text" name="salary" placeholder="Salary"></td></tr>
		
			<tr><td><input type="number" name="contract_hours" placeholder="Contract Hours"></td></tr>
			
			<tr><td><input type="password" name="password" placeholder="Password"></td></tr>
			
			<tr><td><input type="number" name="dept_id" placeholder="Department ID"></td></tr>
		
			<tr><td><input type="number" name="super_id" placeholder="Supervisor ID"></td></tr>
		
			<tr><td align="center" colspan = 2>
			<button type='submit' name='submit' value='Add Employee' style="margin-bottom:10px" class="btn btn-primary pull-center">
			<span style="margin-right:20px;" class="glyphicon glyphicon-ok" aria-hidden="true">
			</span> Add Employee
			</button> 
		</table>
	</form>

	<?php include 'footer.php'; ?>
</body>


</html>
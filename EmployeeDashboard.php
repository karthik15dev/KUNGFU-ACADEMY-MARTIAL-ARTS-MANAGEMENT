<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'header.php' ?>

<div class="container">
	<?php
	//Check if the user is logged in before showing anything using login_user from session
	if (isset($_SESSION['login_user'])){
		echo '
		<h2>Employee Dashboard</h2>
		<table class="table">
			<tbody>
			
				<tr>
					<th>My Employee Details</th>
						<td><a href="EmployeeDetails.php" class="btn btn-primary" role="button">EmployeeDetails</a></td>
				</tr>
				
				<tr>
					<th>Add a Product</th>	
						<td><a href="AddProduct.php" class="btn btn-primary" role="button">Add a Product</a></td>
				</tr>
				<tr>
					<th>Adjust Stock Quantities</th>
						<td><a href="#" class="btn btn-primary" role="button">Adjust Stock Quantities</a></td>
				</tr>
				
				<tr>
					<th>View Orders</th>
						<td><a href="#" class="btn btn-primary" role="button">View Orders</a></td>
				</tr>
				
				<tr>
					<th>Supply Order</th>
					<td><a href="#" class="btn btn-primary" role="button">New Supply Order</a></td>
				</tr>
				
				<tr>
					<th>Add an Employee</th>
						<td><a href="AddEmployee.php" class="btn btn-primary" role="button">Add an Employee</a></td>
				</tr>
				<tr>
					<th>View All Employees</th>
						<td><a href="AllEmployeeDetails.php" class="btn btn-primary" role="button">View Employees</a></td>
				</tr>
				<tr>
					<th>Remove Employee / Remove Customer</th>
						<td><a href="remove.php" class="btn btn-danger" role="button">Remove</a></td>
				</tr>
				
				
				
			</tbody>
	
		</table>';
	} else
	{
		echo "You are not logged in";
	}
	?>
	
		
</div>

<?php include 'footer.php' ?>
</body>
</html>
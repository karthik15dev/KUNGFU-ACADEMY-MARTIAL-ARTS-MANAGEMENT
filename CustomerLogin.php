<?php
/*
* https://www.formget.com/login-form-in-php/
*
*
*/

include('logincustomer.php');	//login script

if(isset($_SESSION['login_user']))
{
	header("location: CustomerDetails.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<Title> Login Form </title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<body background="bg.png">
<div style="width: 100%;margin: 0" class="row">
		<?php include 'header.php'; ?>
		<div style="max-width: 100%;margin: 0;margin-top: 5vh" class="row">
			<div style="text-align:center;margin-bottom:3vh;" class="container">
				<div class="col-md-4"></div>
				<div style="background-color: white;border-radius:15px;box-shadow: 5px 5px 5px 5px #000000" class="col-md-4">
					<h2>Customer Login </h2>
					<p>Please enter your username and password:</p>
					<form action="" method="post">
						<div class="form-group">
							<label for="usr">Username:</label>
							<input type="text" class="form-control" id="usr" name="username">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="pwd" name ="password">
						</div>
							<div class="alert alert-danger"><?php echo $error; ?></div>
						<div class="form-group">
							<button type='submit' name='submit' value='Login' style="margin-bottom:10px" class="btn btn-primary pull-center">
							<span style="margin-right:20px;" class="glyphicon glyphicon-log-in" aria-hidden="true">
							</span> Log In
							</button> 
						</div>
						<p> Not a Customer? register <a href="Register.php">here</a>.</p>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<?php include 'footer.php' ?>	
</div>
</body>
</html>	
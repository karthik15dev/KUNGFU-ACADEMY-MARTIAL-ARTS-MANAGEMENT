
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
	<?php include 'header.php';
		  include 'db.php';
		if (isset($_POST['submit'])){
			$temp = $_POST['staffid'];
			$query = "DELETE FROM Staff Where StaffID = :sid";
			$stmt = $mypdo->prepare($query);
			//bind parameter to POST variable
			$stmt->bindParam(':sid', $temp);
			$stmt->execute();
		}
		if (isset($_POST['submit2'])){
			$temp = $_POST['customername'];
			$query = "DELETE FROM Customer Where vUsername = :checkusername";
			$stmt = $mypdo->prepare($query);
			//bind parameter to POST variable
			$stmt->bindParam(':checkusername', $temp);
			$stmt->execute();
		}
	?>
	<div style="max-width: 100%;margin: 0;margin-top: 5vh" class="row">
		<div style="text-align:center;margin-bottom:3vh;" class="container">
			<div class="col-md-4"></div>
			<div style="background-color: white;border-radius:15px;box-shadow: 5px 5px 5px 5px #000000" class="col-md-4">
				<div class="row">
				<h2> Customer / Staff Removal </h2>
				<p> Please enter Staff ID or Customer Username </p>
				<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="form-group">
						<label for "StaffID">Staff ID</label>
						<input type="text" class="form-control" name="staffid" maxlength="50"/>
					</div>
					<div class="form-group">
						<button type='submit' name='submit' value='remove' style="margin-bottom:10px" class="btn btn-danger pull-center">
						<span style="margin-right:20px;" class="glyphicon glyphicon-ok" aria-hidden="true">
						</span> Remove Staff
						</button> 
					</div>
				</form>
				</div>
				<div class="row">
				<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="form-group">
						<label for "CustomerUsername">Customer Username</label>
						<input type="text" class="form-control" name="customername" maxlength="50"/>
					</div>
					<div class="form-group">
						<button type='submit2' name='submit2' value='remove2' style="margin-bottom:10px" class="btn btn-danger pull-center">
						<span style="margin-right:20px;" class="glyphicon glyphicon-ok" aria-hidden="true">
						</span> Remove Customer
						</button> 
					</div>
				</form>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>	
<?php include 'footer.php' ?>			
</body>
</html>	
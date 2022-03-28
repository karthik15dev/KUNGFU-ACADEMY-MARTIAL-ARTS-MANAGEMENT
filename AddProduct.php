<!-- http://php.net/manual/en/pdo.lobs.php -->
<?php session_start(); ?>
<?php
	if (isset($_POST['Submit'])){
		try {
			include('db.php');
			//build a query
			$query = "INSERT INTO product(ProductName, Description, SalePrice, Stock, Image, MartialArt, ClothingCategory, DepartmentID, ImageURL) VALUES(:ProductName, :Description, :SalePrice, :Stock, :Image, :MartialArt, :ClothingCategory, :DepartmentID, :ImageURL)";
			
			//prepare the statement
			$stmt = $mypdo->prepare($query);
			
			//echo $_FILES['image'];
			//file upload prep
			
			//open the image file
			$tmp_name = "imageToUpload";
			$fp = fopen($_FILES['image']['tmp_name'], 'rb');
			
			//bind parameters e.g. $prepstmt->bindParam(':Firstname', $_POST['firstname']); OR 
			//$stmt->bindParam(':ProductName', $POST['productname']);
			$stmt->bindParam(':ProductName', $_POST['productname']);
			$stmt->bindParam(':Description', $_POST['description']);
			$stmt->bindParam(':SalePrice', $_POST['saleprice']);
			$stmt->bindParam(':Stock', $_POST['stock']);
			//$stmt->bindParam(':Image', $_FILES['image']['type']); //DOES NOT WORK?
			$stmt->bindParam(':Image', $fp);
			$stmt->bindParam(':MartialArt', $_POST['martialart']);
			$stmt->bindParam(':ClothingCategory', $_POST['clothingcategory']);
			$stmt->bindParam(':DepartmentID', $_POST['departmentid']);
			$stmt->bindParam(':ImageURL', $_POST['imageurl']);
							
			//optional?
			$mypdo->beginTransaction();
			//execute the statement
			$stmt->execute();
			//optional?
			$mypdo->commit();
			
			} catch(PDOException $e) {
				echo $e->getMessage();
		}
	}

?>

<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="bg.png">
<div style="width: 100%;margin: 0;" class="row">
	<?php include 'header.php'; ?>
	<div style="max-width: 100%;margin: 0;margin-top: 2vh;margin-bottom: 10vh" class="row">

	
	<?php
	//Check for authorised log in
	if (isset($_SESSION['login_user'])){
		
		$phpself = htmlspecialchars ($_SERVER['PHP_SELF']);
		
		echo '
		
		
		<div style="text-align:center;margin-bottom:3vh;" class="container">
		
				<div class="col-md-4"></div>
				<div style="background-color: white;border-radius:15px;box-shadow: 5px 5px 5px 5px #000000" class="col-md-4">
					<h2>Add Product </h2>
					<p>Enter product details:</p>
					<form action="'. $phpself . '" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="pdt">ProductName :</label>
							<input type="text" class="form-control" id="pdt" name="productname" maxlength="20">
						</div>
						<div class="form-group">
							<label for="dsc">Decription :</label>
							<input type="text" class="form-control" id="dsc" name="description" maxlength="255">
						</div>
						<div class="form-group">
							<label for="spr">Sale Price :</label>
							<input type="text" class="form-control" id="spr" name="saleprice" maxlength="5">
						</div>
						<div class="form-group">
							<label for="stk">Stock :</label>
							<input type="text" class="form-control" id="stk" name="stock" maxlength="10">
						</div>
						<div class="form-group">
							<label for="img">Image :</label>
							<input type="file" class="form-control" id="img" name="image" maxlength="20">
						</div>
						<div class="form-group">
							<label for="mrt">Martial Art :</label>
							<input type="text" class="form-control" id="mrt" name="martialart" maxlength="10">
						</div>
						
						<div class="form-group">
							<label for="clc">Clothing Category :</label>
							<input type="text" class="form-control" id="pdt" name="clothingcategory" maxlength="10">
						</div>
						<div class="form-group">
							<label for="did">Department ID :</label>
							<input type="text" class="form-control" id="pdt" name="departmentid" maxlength="10">
						</div>
						<div class="form-group">
							<label for="url">Image URL :</label>
							<input type="text" class="form-control" id="pdt" name="imageurl" maxlength="255">
						</div>
						<button type="submit" name="Submit" value="Submit" style="margin-bottom:10px" class="btn btn-primary pull-center">
							<span style="margin-right:20px;" class="glyphicon glyphicon-log-in" aria-hidden="true">
							</span> Add Product
						</button> 
					</form>
				</div>
				<div class="col-md-4"></div>
		</div>
		
		';
		
	} else {
		echo '<h1>You are not authorised to view this page!</h1>';
	}
?>
	</div>	
<?php include 'footer.php' ?>
</div>			
</body>
</html>

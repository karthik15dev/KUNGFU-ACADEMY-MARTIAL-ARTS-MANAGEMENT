<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="cart.js"></script>
	
</head>

<body background="bg.png" onload="populateCart()">
	<div style="width: 100%;margin: 0" class="row">
		<?php include 'header.php';include 'db.php'; ?>
		<div style="max-width: 100%;margin: 0;margin-top: 5vh" class="row">
			<div class="col-md-1"></div>
			<div style="background-color: white;border-radius: 10px;border:1px solid black;margin-bottom:5vh;" class="col-md-7">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10" style="text-align:center;">
						<div style="border-bottom:2px solid silver" class="col-md-12">
							<div style="text-align:left;" class="row">
								<h2 style="float:left;">SHOPPING BASKET</h2>
								<h3 style="float:left;margin-left:2.5vw;color: gray">Product name</h3>
								<h3 style="float:right;margin-right:4vw;color: gray">Subtotal</h3>
								<h3 style="float:right;margin-right:7vw;color: gray">Quantity</h3>
								
							</div>
						</div>
						<div style="margin-bottom:1vh;border-bottom:2px solid silver;border-left:2px solid silver;border-right:2px solid silver"class="col-md-12 cartdata">
						
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div style="background-color: white;border-radius: 10px;border:1px solid black" class="col-md-3">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="text-align:center;">
					<div style="text-align:left;" class="row">
						<h2 style="border-bottom:2px solid silver">CHECKOUT</h2>
					</div>
					<div style="margin-top:2vh;margin-bottom:0;padding-bottom:10px;" class="row">
						<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">
						<button style="height:100%,width:100%" name="submit" id="submit" class="btn btn-warning">
						<span style="margin-right:20px" class="glyphicon glyphicon-check" aria-hidden="true">
						</span> Proceed with the order
						</button> 
						</form>
					</div>
					<div style="margin-bottom:2vh;" class="row">
						<h4 class="totalcheckout"></h4>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<?php include 'footer.php' ?>
	</div>
</body>


</html>

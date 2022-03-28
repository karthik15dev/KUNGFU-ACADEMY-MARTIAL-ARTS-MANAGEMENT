<?php session_start(); ?>
<html>
<head>
	<link rel="stylesheet" href="main.css">
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
			<div style="max-width: 100%;margin: 0;" class="row">
				<div style="height:70vh;padding:0" class="col-xs-12">
					<div style="height:100%" id="myCarousel" class="carousel slide" data-ride="carousel">
					  <div style="height:100%" class="carousel-inner">
						<div class="item active">
						  <img style="height:100%;cursor:pointer" id="Venum" class="smalladd" src="https://www.playwell.co.uk/includes/templates/magnus/images/slideshow/GORILLABANNER.jpg">
						</div>
						<div class="item">
						  <img style="height:100%;cursor:pointer" id="Tatami" class="smalladd" src="https://www.playwell.co.uk/includes/templates/magnus/images/slideshow/tatamibanner.jpg">
						</div>
						<div class="item">
						  <img style="height:100%;cursor:pointer" id="Venum" class="smalladd" src="https://www.playwell.co.uk/includes/templates/magnus/images/slideshow/GLADBANNER.jpg">
						</div>
					  </div>
					  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
			<div style="max-width: 100%" class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="secondlayer" id="Belt" style="border-bottom-left-radius: 4em;width:100%;height:35vh;" src="https://images.blitzsport.com/home/default-2.jpg?auto=compress">
					</div>
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="secondlayer" id="Protection" style="width:100%;height:35vh;" src="https://images.blitzsport.com/home/default-3.jpg?auto=compress">
					</div>
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="secondlayer" id="Sword" style="border-bottom-right-radius: 4em;width:100%;height:35vh;" src="https://images.blitzsport.com/home/default-4.jpg?auto=compress">
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div style="max-width: 100%;margin-top:2px;margin-bottom:10vh;" class="row">
				<div class="col-md-2"></div>
				<div style="margin-bottom:5vh" class="col-md-8">
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="thirdlayer" id="Karate" style="border-bottom-left-radius: 2em;width:100%;height:35vh;" src="https://smhttp-ssl-64741.nexcesscdn.net/media/responsivebannerslider/KarateSuppliesUK_1510076129.jpg">
					</div>
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="thirdlayer" id="Boxing" style="width:100%;height:35vh;" src="https://smhttp-ssl-64741.nexcesscdn.net/media/responsivebannerslider/BoxingAquaBags_1510076135.jpg">
					</div>
					<div style="padding:0;text-align:center;cursor:pointer" class='col-md-4'>
						<img class="thirdlayer" id="Jiujitsu" style="border-bottom-right-radius: 2em;width:100%;height:35vh;" src="https://smhttp-ssl-64741.nexcesscdn.net/media/responsivebannerslider/JiuJitsuBJJHyperFly_1510076142.jpg">
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<?php include 'footer.php'; ?>
		</div>
	</div>
<script src="productsearch.js"></script>
</body>


</html>

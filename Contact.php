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
	<div class="row">
		<div class="col-md-12" id="googlemap" style="margin:0;padding:0;width:100%;height:40vh">
		</div>
	</div>
	<script>
		function myMap() {
		var myCenter = new google.maps.LatLng(56.462503, -2.986376);
			var mapOptions = {
				center: new google.maps.LatLng(56.462503, -2.986376),
				zoom: 18,
				mapTypeId: google.maps.MapTypeId.HYBRID
			}
		var map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);
		var marker = new google.maps.Marker({position: myCenter,animation: google.maps.Animation.BOUNCE});

		marker.setMap(map);
		}
	</script>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div style="text-align:center" class="col-md-6">
		<h1 style="font-size:72;color:white;text-decoration: underline;">Contact us at:</h1>
		<h1 style="font-size:24;color:white;">Landline: 02902499550</h1>
		<h1 style="font-size:24;color:white;">Mobile: 07992488567</h1>
		<h1 style="font-size:24;color:white;">Email: scottisharts@gmail.com</h1>
		<h1 style="font-size:24;color:white;">Address: 93 Douglas St, Dundee DD1 5AZ</h1>
		
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<?php include 'footer.php'; ?>	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEeeF997T2vvqTMf55IZbbvhMqIkr1Lk8&callback=myMap"></script>
</div>
</body>

</html>
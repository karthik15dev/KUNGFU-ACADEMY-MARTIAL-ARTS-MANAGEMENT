<html>
<head>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<nav style="width:100%;float: none;margin-bottom:0" class="navbar navbar-inverse navbar-fixed-bottom">
	  <div style="margin-left: 45%" class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a class="navbar-brand" href="https://www.facebook.com/MartialArtWorld/"><i class="fa fa-facebook"></i></a></li>
			<li><a class="navbar-brand" href="https://twitter.com/hashtag/martialarts"><i class="fa fa-twitter"></i></a></li>
			<li><a class="navbar-brand" href="https://plus.google.com/+GiantMartialArtsNSW"><i class="fa fa-google-plus"></i></a></li>
			<li><a class="navbar-brand" href="https://www.instagram.com/explore/tags/martialarts/"><i class="fa fa-instagram"></i></a></li>
		</ul>
		<ul style="margin-right:1vw;" class="nav navbar-nav navbar-right">
		
		<?php 
		if (isset($_SESSION['isstaff'])){
			if($_SESSION['isstaff'] == "1"){
				echo '<li><a href="EmployeeDashboard.php"><span class="glyphicon glyphicon-pencil"></span> Employee Dashboard</a></li> ';
			}
			else{
				echo '<li><a href="EmployeeLogin.php"><span class="glyphicon glyphicon-pencil"></span> Employee Login</a></li>';
			}
		}
		else{
			echo '<li><a href="EmployeeLogin.php"><span class="glyphicon glyphicon-pencil"></span> Employee Login</a></li>';
		}
		
		?>
			
			
		</ul>
	  </div>
	</nav>
</body>
</html>
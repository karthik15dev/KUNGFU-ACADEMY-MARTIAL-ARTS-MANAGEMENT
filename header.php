
<html>
<head>
	<link rel="stylesheet" href="main.css">
	<script src="dropmenu2.js"></script>
</head>
<body>
<a href="index.php"><h1  style="position:absolute;left:42vw;top:0;z-index:101;color: #ffffff;text-decoration: underline;cursor: pointer;font-size:5vh;margin-top:1vh">Martial Law</h1></a>
<nav style="width:100%;padding-top: 7vh" class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" href="ProductPage.php">Martial Arts
        <span class="caret"></span></a>
        <ul class="dropdown-menu martial">
          <li><a id="Judo" href="#">Judo</a></li>
          <li><a id="Karate" href="#">Karate</a></li>
          <li><a id="Taekwondo" href="#">Taekwondo</a></li>
		  <li><a id="Aikido" href="#">Aikido</a></li>
		  <li><a id="Jiujitsu" href="#">Jiujitsu</a></li>
		  <li><a id="Kendo" href="#">Kendo</a></li>
		  <li><a id="Boxing" href="#">Boxing</a></li>
        </ul>
      </li>
	  <li class="dropdown">
        <a class="dropdown-toggle" href="ProductPage.php">Equipment
        <span class="caret"></span></a>
        <ul class="dropdown-menu martial">
          <li><a id="Sword" href="#">Swords</a></li>
          <li><a id="Belt" href="#">Belts</a></li>
          <li><a id="Glove" href="#">Gloves</a></li>
        </ul>
      </li>
	  <li class="dropdown">
        <a class="dropdown-toggle" href="ProductPage.php">Brands
        <span class="caret"></span></a>
        <ul class="dropdown-menu martial">
          <li><a id="Venum" href="#">Venum</a></li>
          <li><a id="Tatami" href="#">Tatami</a></li>
        </ul>
      </li>
      <li><a href="ProductPage.php">All Products</a></li>
	  
      </ul>
      <form method="post" id="mainform" action="ProductPage.php" class="navbar-form navbar-left">
        <div style="margin-left:12vw;width:23vw;" class="input-group">
          <input type="text" class="form-control" id="Searchbar" name="Searchbar" value="">
          <div style="height:3vh;width:5vw" class="input-group-btn">
            <button style="width:100%;height:100%;" class="btn btn-default searchmartial" name="submission" value="submission" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      <ul style="margin-right:1vw;" class="nav navbar-nav navbar-right">
		<li><a href="Contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
		<li><a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket</a></li>
		
        <!-- <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
		
		<!-- Show a username/CustomerDetails.php combo if the user is logged in -->
		<?php
		if (isset($_SESSION['login_user'])){
			echo '<li><a href="CustomerDetails.php"><span class="glyphicon glyphicon-user"></span>' . $_SESSION['login_user'] . '</a></li>';
			
		} else {
			echo '<li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
		}
		
		if (isset($_SESSION['login_user'])){
			echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>';
			
		} else {
			echo '<li><a href="CustomerLogin.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>';
		}
		?>
		
        <!-- <li><a href="CustomerLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
		
      </ul>
  </div>
</nav>
<script src="productsearch.js"></script>
</body>
</html>
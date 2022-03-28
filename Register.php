<?php
// define variables and set to empty values
$unerror = $pwerror = $cpwerror = $fnerror = $snerror = $eaerror = $hnerror = $cerror = $cterror = $pcerror = $pnerror = $dberror = "";
$username = $password = $conpassword = $firstname = $surname = $email = $houseno = $street = $city = $country = $postcode = $phoneno = $dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 //test each for empty fields	
  if (empty($_POST["Username"])) {
    $unerror = "Field is required";
  } else {
    $username = test_input($_POST["Username"]);
  }
  
  if (empty($_POST["FirstName"])) {
    $fnerror = "Field is required";
  } else {
    $firstname = test_input($_POST["FirstName"]);
  }
  
  if (empty($_POST["Surname"])) {
    $snerror = "Field is required";
  } else {
    $surname = test_input($_POST["Surname"]);
  }
  
  if (empty($_POST["HouseNO"])) {
    $hnerror = "Field is required";
  } else {
    $houseno = test_input($_POST["HouseNO"]);
  }
  
  if (empty($_POST["Street"])) {
    $snerror = "Field is required";
  } else {
    $street = test_input($_POST["Street"]);
  }
  
  if (empty($_POST["City"])) {
    $cerror = "Field is required";
  } else {
    $city = test_input($_POST["City"]);
  }
  
  if (empty($_POST["Country"])) {
    $cterror = "Field is required";
  } else {
    $country = test_input($_POST["Country"]);
  }
  
  if (empty($_POST["Postcode"])) {
    $pcerror = "Field is required";
  } else {
    $postcode = test_input($_POST["Postcode"]);
  }
  
  if (empty($_POST["Password"])) {
    $pwerror = "Field is required";
  } else {
    $password = test_input($_POST["Password"]);
  }
  
  if (empty($_POST["confirmpassword"])) {
    $cpwerror = "Field is required";
  } else {
    $conpassword = test_input($_POST["confirmpassword"]);
  }
  
  if (empty($_POST["Phonenumber"])) {
    $pnerror = "Field is required";
  } else {
    $phonenumber = test_input($_POST["Phonenumber"]);
  }
  
    if (empty($_POST["Email"])) {
    $eaerror = "Field is required";
  } else {
    $email = test_input($_POST["Email"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
<?php include 'header.php'; ?>
	<?php
	
	include('db.php');
	if (isset($_POST['Submit'])){
		//check for user name in the database
		try {
			$query = "SELECT * FROM Customer Where vUsername = :checkusername";
			
			$stmt = $mypdo->prepare($query);
			//bind parameter to POST variable
			$stmt->bindParam(':checkusername', $_POST['Username']);
			
			$stmt->execute();
			//check whether there is a result in the query
			if ($stmt->rowCount() > 0)
			{
				//do not enter details, display username error
				$unerror = "Sorry, this username already exists.";
			}else{
				//enter details into the db
				try {
				$regname = $_POST['Username'];
				$regpass = $_POST['Password'];
				$regfirst = $_POST['FirstName'];
				$regsur = $_POST['Surname'];
				$regemail = $_POST['Email'];
				$reghouseno = $_POST['HouseNO'];
				$regstreet = $_POST['Street'];
				$regcity = $_POST['City'];
				$regcountry = $_POST['Country'];
				$regpostcode = str_replace(' ', '', $_POST['Postcode']);
				$regphone = $_POST['Phonenumber'];
				$regdob = $_POST['DateOfBirth'];
				//$query = "INSERT INTO customer('Firstname', 'Surname', 'HouseNo', 'Street', 'City', 'Country', 'Postcode', 'DoB', 'vUsername', 'vPassword', 'Email', 'Phonenumber') 
				//VALUES($regfirst,$regsur,$reghouseno,$regstreet,$regcity,$regcountry,$regpostcode,$regdob,$regname,$regpass,$regemail,$regphone)";
				$query = "INSERT INTO customer(Firstname, Surname, HouseNo, Street, City, Country, Postcode, DoB, vUsername, vPassword, Email, Phonenumber) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
				$arow = $mypdo->prepare($query);
				$arow->execute(array($regfirst,$regsur,$reghouseno,$regstreet,$regcity,$regcountry,$regpostcode,$regdob,$regname,$regpass,$regemail,$regphone));
				//$arow = $mypdo->exec($query);
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
				
			}	
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
    ?>
<form style="margin-bottom:10vh" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">
		<table style="border-radius:15px;box-shadow: 5px 5px 5px 5px #000000" cellspacing="0" align="center" class='trhandler' bgcolor="white">
			<tr>
				<td style="margin-top:0;padding:0" class='regfield' colspan=2>
					<h2 style="text-align:center;">Registration form</h2>
					<p style="text-align:center;">Please enter your registration details</p>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Username' class='regtext'>Username:</label>
				</td>
					
				<td class='regfield'>
					<input type='text' name='Username' id='Username' maxlength="50" />
					<span class="error"> <?php echo $unerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Password' class='regtext'>Password:</label>
				</td>
				<td class='regfield'>
					<input type='password' name='Password' id='Password' maxlength="50" />
					<span class="error"> <?php echo $pwerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='confirmpassword' class='regtext'>Confirm Password:</label>
					
				</td>
				<td class='regfield'>
					<input type='password' name='confirmpassword' id='confirmpassword' maxlength="50" />
					<span class="error"> <?php echo $cpwerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='FirstName' class='regtext'>First Name: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='FirstName' id='FirstName' maxlength="50" />
					<span class="error"> <?php echo $fnerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Surname' class='regtext'>Surname: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='Surname' id='Surname' maxlength="50" />
					<span class="error"> <?php echo $snerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Email' class='regtext'>Email Address:</label>
				</td>
				<td class='regfield'>
					<input type='text' name='Email' id='Email' maxlength="50" />
					<span class="error"> <?php echo $eaerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='HouseNO' class='regtext'>House Number: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='HouseNO' id='HouseNO' maxlength="50" />
					<span class="error"> <?php echo $hnerror;?></span
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Street' class='regtext'>Street Name: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='Street' id='Street' maxlength="50" />
					<span class="error"> <?php echo $snerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='City' class='regtext'>City: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='City' id='City' maxlength="50" />
					<span class="error"> <?php echo $cerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Country' class='regtext'>Country: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='Country' id='Country' maxlength="50" />
					<span class="error"> <?php echo $cterror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Postcode' class='regtext'>Postcode: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='Postcode' id='Postcode' maxlength="50" />
					<span class="error"> <?php echo $pcerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='Phonenumber' class='regtext'>Phone Number: </label>
				</td>
				<td class='regfield'>
					<input type='text' name='Phonenumber' id='Phonenumber' maxlength="50" />
					<span class="error"> <?php echo $pnerror;?></span>
				</td>
			</tr>
			<tr>
				<td class='regfield'>
					<label for='DateOfBirth' class='regtext'>Date of Birth: </label>
				</td>
				<td class='regfield'>
					<input type='date' name='DateOfBirth' id='DateOfBirth' maxlength="50" />
					<span class="error"> <?php echo $dberror;?></span>
				</td>
			</tr>

			<tr>
				<td align="center" colspan=2>
                        <button type='submit' name='Submit' value='Submit' style="margin-bottom:10px" class="btn btn-primary pull-center">
						<span style="margin-right:20px;" class="glyphicon glyphicon-ok" aria-hidden="true">
						
						
						</span> Register
						</button> 
				</td>
			</tr>
		</table>
</form>
<?php include 'footer.php'; ?>
</body>
</html>

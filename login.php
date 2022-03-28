

<?php
/*
* https://www.formget.com/login-form-in-php/
*
*	This is an experiment
*/

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['staffid']) || empty($_POST['password'])) {
$error = "StaffID or Password is invalid";
}
else
{
// Define $username and $password
$staffid=$_POST['staffid'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("silva", "17ac3u20", "222aaa");
// To protect MySQL injection for Security purpose
//$username = stripslashes($staffid);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($staffid);
//$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("17ac3d20", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from staff where vPassword='$password' AND StaffID='$staffid'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$staffid; // Initializing Session
$_SESSION['isstaff']="1";
header("location: EmployeeDashboard.php"); // Redirecting To Other Page
} else {
$error = "Staff ID or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>
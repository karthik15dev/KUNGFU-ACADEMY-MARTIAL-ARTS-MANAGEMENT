
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("silva", "17ac3u20", "222aaa");
// Selecting Database
$db = mysql_select_db("17ac3d20", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select StaffID from staff where StaffID='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['StaffID'];

/*EXPERIMENT */
$ses_sql2=mysql_query("select Firstname from staff where StaffID='$user_check'", $connection);
$row2 = mysql_fetch_assoc($ses_sql2);
$session_user=$row2['Firstname'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
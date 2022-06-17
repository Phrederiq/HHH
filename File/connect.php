<?php


// // if(!$con = mysqli_connect("localhost", "root", "", "gwcl"))
// // {
// //     die("failed to connect");
// // }

// // $DATABASE_HOST = 'localhost';
// // $DATABASE_USER = 'root';
// // $DATABASE_PASS = '';
// // $DATABASE_NAME = 'gwcl';
// // Try and connect using the info above.
//$con = mysqli_connect("localhost", "root", "", "gwcl"); 


// //get the post records

// $username = $_POST['name'];
// $password = $_POST['password'];
// $email= $_POST['email'];
// $user_id= $_POST['userID'];

// // database insert SQL code
// $sql = "INSERT INTO `users_records`(`User_ID`, `User_Name`, `Password`, `Email`) VALUES ('$user_id','$username','$password', '$email')";

// // insert in database 

// $result = mysqli_query($con, $sql);



//$conn = new mysqli("localhost", "root", "", "gwcl");

$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="student";  //database name which you created
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}

mysql_select_db($database,$con);

?>
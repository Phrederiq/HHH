<?php



 
 //session_start();

 $errors = array(); 
 $username = $_POST['name'];
 $mail = $_POST['mail'];
 $userid = $_POST['userID'];
 $password = $_POST['password'];
 $password2 = $_POST['password2'];

$con = mysqli_connect("localhost", "root", "", "gwcl");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Connection failed " . mysqli_connect_error();
  }
  if (isset($_POST['signup'])) {
    
  
    if (empty($username)) {
      echo '<script type="text/javascript">';
      echo ' alert("Username is required")';  // show an alert box.
      echo '</script>';
       die();
    }
    if (empty($password)) {

      echo '<script type="text/javascript">';
      echo ' alert("Password is required")';  // show an alert box.
      echo '</script>';
        die();
    }
    if (empty($password)) {

      echo '<script type="text/javascript">';
      echo ' alert("Password is required")';  // show an alert box.
      echo '</script>';
        die();
  }
}

// Password confirmation
if ($password != $password2) {
	
       echo '<script type="text/javascript">';
      echo ' alert("The two passwords do not match")';  // show an alert box.
      echo '</script>';
    die ();
}

// first check the database to make sure a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user_records WHERE Username='$username' OR Email='$mail' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Username'] === $username) {

      echo '<script type="text/javascript">';
      echo ' alert("Username already exists")';  //show an alert box.
      
      echo '</script>';
      //header('location: page1.php');
      die ();
    }

    if ($user['Email'] === $mail) {
      
      echo '<script type="text/javascript">';
      echo ' alert("email already exists")';  //show an alert box.
      
      echo '</script>';
      //header('location: page1.php');
      die();
    }
  }

  // Finally, register user if there are no errors in the form
  else {
      //encrypt the password before saving in the database
  	//$password_encrypt= md5($password_1);

      $sql = "INSERT INTO `user_records`(`Username`, `Email`, `password`) VALUES ('$username','$mail','$password')";

      $result = mysqli_query($con, $sql);
      
  	header('location: page1.php');
  }

  



  



?>
<?php
$con = mysqli_connect("localhost", "root", "", "gwcl");
$errors = array(); 

// LOGIN USER
if (isset($_POST['signin'])) {
    $username  = $_POST['name'];
    $password =  $_POST['password'];
  
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
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $sql = "SELECT * FROM records WHERE Username='$username' AND Password ='$password'";
        $results = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
          
          header('location: profile.php');
        }else {
          echo '<script type="text/javascript">';
      echo ' alert("Wrong username/password combination")';  // show an alert box.
      echo '</script>';
        die();
          
        }
        
    }
  }


// session_start();

// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'gwcl';
// // Try and connect using the info above.
// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if ( mysqli_connect_errno() ) {
// 	// If there is an error with the connection, stop the script and display the error.
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());


//     // Now we check if the data from the login form was submitted, isset() will check if the data exists.
// if ( !isset($_POST['name'], $_POST['password']) ) {
// 	// Could not get the data that should have been sent.
// 	exit('Please fill both the username and password fields!');

//   // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
// if ($stmt = $con->prepare('SELECT User_ID, Password FROM user_records WHERE Username = ?')) {
// 	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
// 	$stmt->bind_param('s', $_POST['Username']);
// 	$stmt->execute();
// 	// Store the result so we can check if the account exists in the database.
// 	$stmt->store_result();
 
//       if ($stmt->num_rows > 0) {
//         $stmt->bind_result($id, $password);
//         $stmt->fetch();
//         // Account exists, now we verify the password.
//         // Note: remember to use password_hash in your registration file to store the hashed passwords.
//         if (password_verify($_POST['password'], $password)) {
//           // Verification success! User has logged-in!
//           // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
//           session_regenerate_id();
//           $_SESSION['loggedin'] = TRUE;
//           $_SESSION['name'] = $_POST['Username'];
//           $_SESSION['id'] = $id;
//           echo ( header('location: page1.php'));
          
  	
//         } else {
//           // Incorrect password
//           echo 'Incorrect username and/or password!';
//         }
//       } else {
//         // Incorrect username
//         echo 'Incorrect username and/or password!';
//       }

// 	$stmt->close();
// }
// }
//}
?>
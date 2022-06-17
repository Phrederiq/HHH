<?php 

session_start();
include("connect.php");
include("function.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">
 <!-- Sing in  Form -->
 <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <!-- <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div> -->

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="" name="passreset" id="passreset"  />
                                <label for="resetpass"  > <a href="#">Reset Password</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
  
        </div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>


<?php


if($_SERVER['REQUEST_METHOD']=="POST"); 

{
    $username= $_POST['name'];
    $password = $_POST['pass'];

    if (!empty($username)&& !empty($password) && !is_numeric($username))
    {
    // Read DATABASE
  
    $query = "SELECT * FROM `users` WHERE username = '$username' limit 1";
       $result = mysqli_query($con, $query);

       if($result && mysqli_num_rows($result)>0);  

       {
           $user_data = mysqli_fetch_assoc($result);
           
           if ($user_data['password'] == $password)
           {
            $_SESSION['user_id'] = $user_data['user_id'];
               header("location: page1.php");
               die;
           }
        
   
       

    //     header("Location:login.php");
    //     die;
    // }
    else
    {
        echo"ENTER SOME VALID INFORMATION!";
    }
}

}
}

?>
</body>
</html>
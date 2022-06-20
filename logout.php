
<?php
// clear all the session variables and redirect to sign in 
session_start();
session_unset();
session_write_close();

header("Location: signin.php");


?>
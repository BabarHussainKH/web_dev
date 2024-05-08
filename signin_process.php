<?php
include("DB_connection.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST["emails"];
    $password=$_POST["passwords"];
    $query ="select * from info where Email='$email' and Password='$password'";
    $result= mysqli_query($conn,$query);





if(mysqli_num_rows($result) > 0) {
    // user exists, login successful
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['emails'] = $email;
    header('Location: home.html');
    exit;
} else {
    // user does not exist or password is incorrect
   echo"Invalid email or password";
}
mysqli_close($conn);












}


?>